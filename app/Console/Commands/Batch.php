<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use LINE\LINEBot\HTTPClient\CurlHTTPClient;
use LINE\LINEBot;
use App\Models\User;
use LINE\LINEBot\MessageBuilder\TextMessageBuilder;

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

        $users = User::get();

        // LINEBOTSDKの設定
        $http_client = new CurlHTTPClient(config('services.line.channel_token'));
        $bot = new LINEBot($http_client, ['channelSecret' => config('services.line.messenger_secret')]);


        // LINEユーザーID指定

        // メッセージ設定
        $message = "本日発注締切日です。まだの方はお願いします。";

        // メッセージ送信
        $textMessageBuilder = new TextMessageBuilder($message);
        foreach ($users as $user) {
            $userId = $user->line_id;
            $response    = $bot->pushMessage($userId, $textMessageBuilder);
        }
        return Command::SUCCESS;
    }
}
