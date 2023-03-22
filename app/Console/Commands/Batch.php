<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use LINE\LINEBot\HTTPClient\CurlHTTPClient;
use LINE\LINEBot;
use App\Models\User;
use Carbon\Carbon;
use LINE\LINEBot\MessageBuilder\TextMessageBuilder;
use LINE\LINEBot\Constant\HTTPHeader;
use LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder;
use LINE\LINEBot\MessageBuilder\TemplateMessageBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\ButtonTemplateBuilder;
use LINE\LINEBot\TemplateActionBuilder;

use Illuminate\Http\Request;


class Batch extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:lineMessage';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '毎日ライン通知';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $today = Carbon::today();
        $checkSun = $today->isSunday();
        $checkThr = $today->isThursday();
        $checkTue = $today->isTuesday();

        // if ($checkSun || $checkThr || $checkTue) {

            $tomorrow = Carbon::tomorrow()->format('n月j日');

            // LINEユーザー取得
            $users = User::get();

            // LINEBOTSDKの設定
            $http_client = new CurlHTTPClient(config('services.line.channel_token'));
            $bot = new LINEBot($http_client, ['channelSecret' => config('services.line.messenger_secret')]);

            // メッセージ設定
            $title = $tomorrow . "の発注締切日です。";
            $message = $tomorrow . "の発注締切日です。まだの方は17:00までにお願いいたします。";

            // メッセージ作成
            $button = new ButtonTemplateBuilder($title, $message, null, [
                new TemplateActionBuilder\UriTemplateActionBuilder("発注する", route("linelogin"))
            ]);
            $button_message = new TemplateMessageBuilder('発注締切のお知らせ', $button);

            // LINEユーザーID指定-送信
            foreach ($users as $user) {
                $userId = $user->line_id;
                $response = $bot->pushMessage($userId, $button_message);
            }
        // }
        return Command::SUCCESS;
    }
}
