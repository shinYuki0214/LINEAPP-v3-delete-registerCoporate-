<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use App\Models\Product;

use Illuminate\Support\Facades\DB;


class OrderController extends Controller
{
    //
    public function index($order_id)
    {
        $products = Product::all();
        $ordered = Order::where('user_id', '=', Auth::id())->where('id', '=', $order_id)->first();
        return view('order.index', compact('ordered', 'products'));
    }
    public function register()
    {
        $products = Product::all();
        return view('order.register', compact('products'));
    }
    public function create(Request $request)
    {
        $products = Auth::user()->bookmark_products()->orderBy('created_at', 'desc')->get();
        $productsCount = Auth::user()->bookmark_products()->orderBy('created_at', 'desc')->count();
        // if(!isset($request['receive_date'])){
        //     $today = Carbon::today();
        //     $todayFormated = $today->format('Y-m-d');
        //     $orderdDatesCheck = Order::where('user_id', '=', Auth::id())->whereDate('receive_date', '>=', $todayFormated)->exists();
        //     $orderdDates = '';
        //     if ($orderdDatesCheck) {
        //         $orderdDates = Order::where('user_id', '=', Auth::id())->whereDate('receive_date', '>=', $todayFormated)->orderBy('receive_date', 'asc')->get();
        //     }
        //     return view('home', compact('orderdDates', 'orderdDatesCheck'));
        //     exit;
        // }

        if ($request['receive_date'] == '') {
            session()->flash('status', '日付を選択してください。');
            return to_route('home');
            exit;
        }

        $dateRecive = new Carbon($request['receive_date']);
        $today = Carbon::today();
        $tomorrow = Carbon::tomorrow();

        return view('order.create', compact('today', 'tomorrow', 'dateRecive', 'products','productsCount'));
    }
    public function check(Request $request)
    {
        $products = Auth::user()->bookmark_products()->orderBy('created_at', 'desc')->get();
        $today = Carbon::today();
        $tomorrow = Carbon::tomorrow();
        $orderdDatas = $request;
        $dateRecive = new Carbon($request['receive_date']);
        return view('order.check', compact('orderdDatas', 'dateRecive', 'products'));
    }
    public function store(Request $request)
    {
        $targetDate = new Carbon($request['receive_date']);
        $todaysOrder = Order::where('user_id', '=', Auth::id())->whereDate('receive_date', $targetDate)->exists();
        if (!$todaysOrder) {
            Order::create([
                'user_id' => Auth::id(),
                'order1' => $request['order1'],
                'order2' => $request['order2'],
                'order3' => $request['order3'],
                'order4' => $request['order4'],
                'order5' => $request['order5'],
                'order6' => $request['order6'],
                'order7' => $request['order7'],
                'order8' => $request['order8'],
                'order9' => $request['order9'],
                'order10' => $request['order10'],
                'order11' => $request['order11'],
                'order12' => $request['order12'],
                'order13' => $request['order13'],
                'order14' => $request['order14'],
                'order15' => $request['order15'],
                'order16' => $request['order16'],
                'order17' => $request['order17'],
                'order18' => $request['order18'],
                'order19' => $request['order19'],
                'order20' => $request['order20'],
                'receive_date' => $request['receive_date'],
            ]);
        } else {
            Order::where('user_id', '=', Auth::id())->whereDate('receive_date', $targetDate)->update(
                [
                    'order1' => $request['order1'],
                    'order2' => $request['order2'],
                    'order3' => $request['order3'],
                    'order4' => $request['order4'],
                    'order5' => $request['order5'],
                    'order6' => $request['order6'],
                    'order7' => $request['order7'],
                    'order8' => $request['order8'],
                    'order9' => $request['order9'],
                    'order10' => $request['order10'],
                    'order11' => $request['order11'],
                    'order12' => $request['order12'],
                    'order13' => $request['order13'],
                    'order14' => $request['order14'],
                    'order15' => $request['order15'],
                    'order16' => $request['order16'],
                    'order17' => $request['order17'],
                    'order18' => $request['order18'],
                    'order19' => $request['order19'],
                    'order20' => $request['order20'],
                ]
            );
        }

        session()->flash('status', '登録okです');
        return to_route('order.finish');
    }

    public function finish()
    {
        return view('order.finish');
    }
}
