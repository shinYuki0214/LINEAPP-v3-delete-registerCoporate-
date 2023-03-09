@extends('layouts.app2')
@section('sectiontitle', $dateRecive->format('Y年m月d日の発注'))

@section('content')
    <div class="container">
        <form action="{{ route('order.check') }}" method="post">
            @csrf
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th scope="col">商品名</th>
                            <th scope="col">金額</th>
                            <th scope="col">個数</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>バナナケーキ</td>
                            <td>740円</td>
                            <td>
                                <select name="order1" id="" class="form-select">
                                    <option value="0">注文なし</option>
                                    @for($i = 1; $i <200; $i++)
                                    <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>ミニバナナケーキ</td>
                            <td>200円</td>
                            <td>
                                <select name="order2" id="" class="form-select">
                                    <option value="0">注文なし</option>
                                    @for($i = 1; $i <200; $i++)
                                    <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>ミニバナナケーキ 6個入</td>
                            <td>1200円</td>
                            <td>
                                <select name="order3" id="" class="form-select">
                                    <option value="0">注文なし</option>
                                    @for($i = 1; $i <200; $i++)
                                    <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>バナナケーキ（ポケモン）</td>
                            <td>740円</td>
                            <td>
                                <select name="order4" id="" class="form-select">
                                    <option value="0">注文なし</option>
                                    @for($i = 1; $i <200; $i++)
                                    <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>ミニバナナケーキ 6個入（ポケモン）</td>
                            <td>1200円</td>
                            <td>
                                <select name="order5" id="" class="form-select">
                                    <option value="0">注文なし</option>
                                    @for($i = 1; $i <200; $i++)
                                    <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>美ら恋ガレット単品</td>
                            <td>183円</td>
                            <td>
                                <select name="order6" id="" class="form-select">
                                    <option value="0">注文なし</option>
                                    @for($i = 1; $i <200; $i++)
                                    <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>美ら恋ガレット4個入り</td>
                            <td>734円</td>
                            <td>
                                <select name="order7" id="" class="form-select">
                                    <option value="0">注文なし</option>
                                    @for($i = 1; $i <200; $i++)
                                    <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>美ら恋ガレット８個入り</td>
                            <td>1468円</td>
                            <td>
                                <select name="order8" id="" class="form-select">
                                    <option value="0">注文なし</option>
                                    @for($i = 1; $i <200; $i++)
                                    <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>宮古島スティック　バナナ</td>
                            <td>172円</td>
                            <td>
                                <select name="order9" id="" class="form-select">
                                    <option value="0">注文なし</option>
                                    @for($i = 1; $i <200; $i++)
                                    <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>宮古島スティック　紅芋黒糖</td>
                            <td>172円</td>
                            <td>
                                <select name="order10" id="" class="form-select">
                                    <option value="0">注文なし</option>
                                    @for($i = 1; $i <200; $i++)
                                    <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>宮古島スティック　黒糖</td>
                            <td>172円</td>
                            <td>
                                <select name="order11" id="" class="form-select">
                                    <option value="0">注文なし</option>
                                    @for($i = 1; $i <200; $i++)
                                    <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>下地島専用宮古島スティック　6本入</td>
                            <td>1036円</td>
                            <td>
                                <select name="order12" id="" class="form-select">
                                    <option value="0">注文なし</option>
                                    @for($i = 1; $i <200; $i++)
                                    <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>バナナラスク　25ｇ</td>
                            <td>230円</td>
                            <td>
                                <select name="order13" id="" class="form-select">
                                    <option value="0">注文なし</option>
                                    @for($i = 1; $i <200; $i++)
                                    <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>バナナラスク　3個入</td>
                            <td>690円</td>
                            <td>
                                <select name="order14" id="" class="form-select">
                                    <option value="0">注文なし</option>
                                    @for($i = 1; $i <200; $i++)
                                    <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <input type="hidden" name="receive_date" value="{{$dateRecive}}">
            <button class="btn btn-primary btn-lg">
                注文
            </button>
        </form>
    </div>
@endsection
