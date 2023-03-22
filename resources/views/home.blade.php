@extends('layouts.app2')
@section('sectiontitle', '発注システム')
@section('content')
    @can('manager-higher')
    @else
        <div class="col-md-5">
            <div class="frm__flow">
                <div class="frm__flow-item frm__flow-item-active">
                    配達日選択
                </div>
                <div class="frm__flow-item">
                    注文
                </div>
                <div class="frm__flow-item">
                    確認
                </div>
            </div>

            <div>
                <label for="orderDate">配達日</label>
                <form action="{{ route('order.create') }}" method="post">
                    @csrf
                    <input type="text" class="js__calendar form-control mb-4" name="receive_date" required>
                    {{-- <button class="btn btn-primary">発注</button> --}}

                    @if (session('status'))
                        <div class="text-center frm__error">
                            {{ session('status') }}
                        </div>
                    @endif
                    <button class="frm__btn-02">発注</button>
                </form>

            </div>
        </div>

        <div class="nav-sp__wrapper">
            <div class="nav-sp__inner">
                <a href="{{ route('pastDatas') }}" class="nav-sp__btn-01">
                    発注<br>履歴
                </a>
                <a href="{{ route('order.register') }}" class="nav-sp__btn-02">
                    商品<br>登録
                </a>
            </div>
        </div>
        {{-- <input type="hidden" name="nousedate" id="nousedate" value="@foreach ($nousedates as $nousedate){{$nousedate.','}}@endforeach"> --}}
    @endcan


@endsection
