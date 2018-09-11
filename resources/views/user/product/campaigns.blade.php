@extends('base') 

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/app-assets/css/core/colors/palette-callout.css"> 
@endsection

@section('app')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                <h3 class="content-header-title mb-0 d-inline-block">Campaign</h3>
                <div class="row breadcrumbs-top d-inline-block">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a>
                            </li>

                            <li class="breadcrumb-item active">Campaign
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-body">
			@if (session('status'))
            <section id="basic-callouts">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <div class="bs-callout-success callout-border-left mt-1 p-1">
                                        <strong>Thông báo !</strong>
                                        <p>{{ session('status') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            @endif

            <!-- Recent Transactions -->
            <div class="row">
                <div id="recent-transactions" class="col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="table-responsive">
                                <table id="recent-orders" class="table table-hover table-xl mb-0">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">STT</th>
                                            <th class="border-top-0">Tên Sản Phẩm</th>
                                            <th class="border-top-0">Ngày Bắt Đầu</th>
                                            <th class="border-top-0">Ngày Kết Thúc</th>
                                            <th class="border-top-0">Hành Động</th>
                                            <th class="border-top-0">Hành Động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($campaigns as $index => $campaign)
                                        <tr>
                                            <td class="text-truncate">{{ $index + 1 }}</td>
                                            <td>{{ $campaign->product()->first()->name }}</td>

                                            <td>{{ Carbon\Carbon::createFromFormat("Y-m-d H:i:s", $campaign->start_at)->format("d/m/Y") }}</td>

                                            <td>{{ Carbon\Carbon::createFromFormat("Y-m-d H:i:s", $campaign->expiry_at)->format("d/m/Y") }}</td>
											<td>
                                                <button type="button" class="btn btn-primary round btn-min-width mr-1 mb-1" onclick="window.location.href=''">Sửa</button>
                                            </td>

                                            <td>
                                                <button type="button" class="btn btn-danger round btn-min-width mr-1 mb-1" onclick="window.location.href='{{ route('user.campaign.delete', $campaign->id) }}'">Xóa</button>
                                            </td>
                                        </tr>
										@endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-9 col-md-12">

                            </div>
                            <div class="col-lg-3 col-md-12">
                                <nav aria-label="Page navigation">
                                    {{ $campaigns->links() }}
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Recent Transactions -->

        </div>
    </div>
</div>

@endsection