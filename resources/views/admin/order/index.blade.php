@extends('base')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/app-assets/vendors/css/tables/datatable/datatables.min.css">
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

                            <li class="breadcrumb-item active">Đơn Hàng
                            </li>
                        </ol>
                    </div>
                </div>
            </div>

        </div>

        <div class="content-body">
            <!-- Zero configuration table -->
            <section id="configuration">
                <div class="row">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard">

                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>#Order ID</th>
                                                <th>Ngày</th>
                                                <th>Trạng Thái</th>

                                            </tr>
                                        </thead>
										
										
                                        <tbody>
											@foreach($orders as $index => $order)
                                            <tr>
                                                <td>#{{ $order->id }}</td>
                                                <td>{{ $order->created_at }}</td>
                                                
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-outline-success round" onclick="window.location.href='{{ route('admin.order.detail', $order->id) }}'">{{ $order->currentStatus() }}</button>
                                                </td>
                                            </tr>
											@endforeach
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

@section('js')
<script src="{{ asset('assets') }}/app-assets/vendors/js/tables/datatable/datatables.min.js" type="text/javascript"></script>
<script src="{{ asset('assets') }}/app-assets/js/scripts/tables/datatables/datatable-basic.js" type="text/javascript"></script>
@endsection