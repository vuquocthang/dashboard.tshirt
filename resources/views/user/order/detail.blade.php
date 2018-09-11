@extends('base')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/app-assets/css/pages/invoice.css">
@endsection

@section('app')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                <h3 class="content-header-title mb-0 d-inline-block">Đơn Hàng</h3>
                <div class="row breadcrumbs-top d-inline-block">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('workshop.order.index') }}">Đơn Hàng</a>
                            </li>
                            <li class="breadcrumb-item active">Chi Tiết
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="content-header-right col-md-6 col-12">
                <div class="dropdown float-md-right">
                    <button class="btn btn-danger round btn-glow px-2" >{{ $order->currentStatus() }}</button>
                    
                </div>
            </div>
        </div>
        <div class="content-body">
            <section class="card">
                <div id="invoice-template" class="card-body">
                    <!-- Invoice Company Details -->
                    <div id="invoice-company-details" class="row">
                        <div class="col-md-6 col-sm-12 text-center text-md-left">
                            <h2>INVOICE</h2>
                            <p class="pb-3">#{{ $order->id }}</p>

                        </div>

                    </div>
                    <!--/ Invoice Company Details -->
                    <!-- Invoice Customer Details -->
                    <div id="invoice-customer-details" class="row pt-2">
                        <div class="col-sm-12 text-center text-md-left">
                            <p class="text-muted">Bill To</p>
                        </div>
                        <div class="col-md-6 col-sm-12 text-center text-md-left">
                            <ul class="px-0 list-unstyled">
                                <li class="text-bold-800">{{ $order->cus_name }}</li>
                                <li>{{ $order->cus_address }}</li>
                            </ul>
                        </div>
                        <div class="col-md-6 col-sm-12 text-center text-md-right">
                            <p>
                                <span class="text-muted">Ngày Tạo :</span> {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $order->created_at)->format('d/m/Y') }}</p>
                        </div>
                    </div>
                    <!--/ Invoice Customer Details -->
                    <!-- Invoice Items Details -->
                    <div id="invoice-items-details" class="pt-2">
                        <div class="row">
                            <div class="table-responsive col-sm-12">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tên Sản Phẩm</th>
                                            <th class="text-right">Size</th>
											<th class="text-right">Màu</th>
                                            <th class="text-right">Số Lượng</th>
                                            <th class="text-right">Đơn Vị Giá</th>
                                            <th class="text-right">Thành Tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										@foreach( $order->details()->get() as $index => $detail )
										<tr>
                                            <th scope="row">{{ $index + 1 }}</th>
                                            <td>
                                                <p>{{ $detail->product()->first()->name }}</p>
                                            </td>
                                            <td class="text-right">{{ $detail->product_size }}</td>
											<td class="text-right">{{ $detail->product_color }}</td>
                                            <td class="text-right">{{ $detail->product_quantity }}</td>
                                            <td class="text-right">{{ number_format($detail->campaign()->first()->price) }} đ</td>
                                            <td class="text-right">{{ number_format($detail->campaign()->first()->price * $detail->product_quantity)  }} đ</td>
                                        </tr>
										@endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-7 col-sm-12 text-center text-md-left">
                                <p class="lead">Thông Tin Khách Hàng:</p>
                                <div class="row">
                                    <div class="col-md-8">
                                        <table class="table table-borderless table-sm">
                                            <tbody>
                                                <tr>
                                                    <td>Họ Tên:</td>
                                                    <td class="text-right">{{ $order->cus_name }}</td>
                                                </tr>
                                                <tr>
                                                    <td>SĐT:</td>
                                                    <td class="text-right">{{ $order->cus_phone }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Email:</td>
                                                    <td class="text-right">{{ $order->cus_email }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Địa Chỉ:</td>
                                                    <td class="text-right">{{ $order->cus_address }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 col-sm-12">
                                <p class="lead">Tổng</p>
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td>Tổng 1</td>
                                                <td class="text-right">{{ number_format( $order->details()->join('product', 'order_detail.product_id', 'product.id')->selectRaw("SUM(product_quantity * product.price ) as total")->get()[0]->total ) }} đ</td>
                                            </tr>
                                            <tr>
                                                <td>VAT (10%)</td>
                                                <td class="text-right">{{ number_format( $order->details()->join('product', 'order_detail.product_id', 'product.id')->selectRaw("SUM(product_quantity * product.price ) as total")->get()[0]->total * 0.1 ) }} đ</td>
                                            </tr>
                                            <tr>
                                                <td class="text-bold-800">Tổng</td>
                                                <td class="text-bold-800 text-right">{{ number_format( $order->details()->join('product', 'order_detail.product_id', 'product.id')->selectRaw("SUM(product_quantity * product.price ) as total")->get()[0]->total * 1.1) }} đ</td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </section>
        </div>
    </div>
</div>
@endsection