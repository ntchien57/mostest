@extends($theme . '.shop_layout')
@push('style')
    <link href="{{ asset('css/guest/product/detail.css') }}" rel="stylesheet" type="text/css" />
    <link href='{{ asset('theme/200000292324/1001022916/14/slick.scss.css?v=11') }}' rel='stylesheet' type='text/css'
        media='all'>
    <link rel="stylesheet" href="{{ asset('user/css/bootstrap.min.css') }}">
    <style>
        .footer-primary {
            width: 100% !important;
        }

        .section-content {
            display: flex;
            justify-content: space-around;
        }

        .header-contact-wrapper {
            display: none !important;
        }
    </style>
@endpush

@section('content')
    <div class="container" style="margin-top: 1rem; margin-bottom: 2rem;">
        @if (count($orders) == 0)
            <div class="col-md-12" style="color: red">
                Bạn chưa có đơn hàng nào
            </div>
        @else
            <table class="table box  table-bordered table-responsive">
                <thead>
                    <tr>
                        <th style="width: 50px;">TT</th>
                        <th style="width: 100px;">{{ __('profile.order_code') }}</th>
                        <th>{{ __('profile.order_total') }}</th>
                        <th>{{ __('profile.order_status') }}</th>
                        <th>{{ __('profile.order_date') }}</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        @php
                            $n = isset($n) ? $n : 0;
                            $n++;
                            // $order = App\Models\ShopProduct::find($item->id);
                        @endphp
                        <tr>
                            <td><span class="item_21_id">{{ $n }}</span></td>
                            <td><span class="item_21_sku">#{{ $order->id }}</span></td>
                            <td align="right">
                                {{ number_format($order->total) }} VNĐ
                            </td>
                            <td>{{ $statusOrder[$order->status] }}</td>
                            <td>{{ $order->created_at }}</td>
                            <td style="text-align:center">
                                <a style="padding: 5px 10px" class="btn-primary" data-toggle="modal"
                                    data-target="#order-{{ $order->id }}" href="#">
                                    {{ __('profile.order_detail') }}</a>
                                @if ($order->status == 0)
                                    <a style="padding: 5px 10px" class="btn-danger" data-toggle="modal"
                                        data-target="#order-{{ $order->id }}" href="#"> Hủy </a>
                                @endif
                            </td>
                        </tr>


                        <!-- Modal -->
                        <div id="order-{{ $order->id }}" class="modal fade" role="dialog" style="z-index: 9999;">
                            <div class="modal-dialog modal-lg">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">{{ __('profile.order_detail') }} #{{ $order->id }}</h4>
                                    </div>
                                    <div class="modal-body" style="padding: 1rem;">
                                        @foreach ($order->details as $detail)
                                            <div class="row">
                                                <div class="col-md-4">{{ $detail->name }}</div>
                                                <div class="col-md-3" align="right">{{ number_format($detail->price) }}
                                                    VNĐ</div>
                                                <div class="col-md-2">{{ $detail->attribute }}</div>
                                                <div class="col-md-1">x {{ $detail->qty }}</div>
                                                <div class="col-md-2" align="right">
                                                    {{ number_format($detail->total_price) }} VNĐ</div>
                                            </div>
                                        @endforeach
                                        <hr>
                                        @foreach ($order->orderTotal as $total)
                                            @if ($total->value != 0)
                                                <div class="row">
                                                    <div class="col-md-8" align="right">
                                                        {!! $total->title !!}
                                                    </div>
                                                    <div class="col-md-4" align="right">{{ number_format($total->value) }}
                                                        VNĐ</div>
                                                </div>
                                            @endif
                                        @endforeach

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default"
                                            data-dismiss="modal">{{ __('guest.close') }}</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endforeach
                    <style>
                        .shipping_address td {
                            padding: 3px;
                        }

                        .shipping_address textarea,
                        .shipping_address input {
                            width: 100%;
                        }

                        .modal-header {

                            display: flex;
                            background: #1e4f11;
                            color: white;
                        }
                    </style>
                </tbody>
            </table>
        @endif

    </div>

    <script>
        document.body.classList.remove('home');
    </script>
    

@endsection
@push('scripts')
    <script src="{{ asset('user/js/bootstrap.min.js') }}"></script>
@endpush