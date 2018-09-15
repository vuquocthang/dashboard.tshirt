@extends('base') 

@section('css')
<style>
	.my-create-campaign{
		margin-bottom: 0px !important;
		margin-right: 0px !important;
		padding: 0.5rem !important;
	}
</style>

<style>
    .design-img{
        position: absolute;
        left: 0;
        top: 0;
        right: 0;
        bottom: 0;
        text-align: center;
    }

    .design-img img{
        user-select: none;
        width: 42.1687%;
        height: auto;
        margin: auto;
        margin-top: calc(20.2703% + 15px) !important;
    }
</style>

<link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/app-assets/css/core/colors/palette-callout.css"> 
@endsection

@section('app')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                <h3 class="content-header-title mb-0 d-inline-block">Sản Phẩm</h3>
                <div class="row breadcrumbs-top d-inline-block">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a>
                            </li>

                            <li class="breadcrumb-item active">Sản Phẩm
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
                                            <th class="border-top-0">Tên</th>
                                            <th class="border-top-0">Hành Động</th>
                                            <th class="border-top-0">Doanh Thu Bán Hàng</th>
											<th class="border-top-0">Doanh Thu Thiết Kế</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($products as $index => $product)
                                        <tr>
                                            <td class="text-truncate">{{ $index + 1 }}</td>
                                            <td>
                                                <a target="_blank" href="{{ $product->frontendUrl() }}">{{ $product->name }}</a>
                                                <br>
                                                <br>


                                                <div style="position: relative;" >
                                                    <a href="">
                                                        <img class="bgImg" style="background-color: #{{ $product->color_code }}" width="100" src="{{ $product->bgImgFront() }}"/>
                                                    </a>

                                                    <div class="design-img" >
                                                        <img src="{{ config('services.design_url') }}/design/{{ $product->img_front }}" alt="" class="modelImage">
                                                    </div>
                                                </div>
                                            </td>

											<td>
												@if( !$product->hasCampaign() )
                                                <button type="button" class="btn btn-primary round btn-min-width mr-1 mb-1 my-create-campaign" data-toggle="modal" data-target="#create-campaign-{{ $product->id }}">Tạo Campaign</button>
												@else
												<span>Giá : <b>{{ number_format($product->hasCampaign()->price) }} đ</b></span> <br> <br>
												<b>{{ $product->startToExpiryCampaign() }}</b>
												@endif
											</td>
											
											<td>
												@if( $product->hasCampaign() )
												<table>
													<tr>
														<th>Số Lượng</th>
														<th>Lợi Nhuận / Chiếc</th>
													</tr>
													
													<tr>
														<td><b>1 - 50</b></td>
														<td><b>{{ number_format($product->hasCampaign()->price - 195000) }} đ</b></td>
													</tr>
													
													<tr>
														<td><b>50 - 200</b></td>
														<td><b>{{ number_format($product->hasCampaign()->price - 185000) }} đ</b></td>
													</tr>
													
													<tr>
														<td><b>200 - N</b></td>
														<td><b>{{ number_format($product->hasCampaign()->price - 175000) }} đ</b></td>
													</tr>
												  
													<tr>
														<td>Đã bán : <b>{{ $product->hasCampaign()->numberOfProductsSelledBy($user->id) }}</b></td>
														<td><b>{{ number_format( $product->hasCampaign()->sellProfit($user->id) ) }} đ</b></td>
													</tr>
												</table>
												@endif
											</td>
											
											<td>
												@if( $product->hasCampaign() )
												<span>Số Lượng : <b>{{ $product->hasCampaign()->numberOfProductsSelled() }}</b></span> <br>
												<span>Doanh Thu : <b>{{ number_format( $product->hasCampaign()->designProfit() ) }} đ</b></span> <br>
												@endif 
											</td>
                                        </tr>
										
											<!-- Modal -->
											<div class="modal fade text-left" id="create-campaign-{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
												<div class="modal-dialog" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<label class="modal-title text-text-bold-600" id="myModalLabel33">Tạo Campaign</label>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<form action="{{ route('user.campaign.create') }}" method="post">
															@csrf
															<input type="hidden" name="product_id" value="{{ $product->id }}" >
														
															<div class="modal-body">
																<!--
																<label>Ngày Bắt Đầu: </label>
																<div class="form-group">
																	<input type="date" name="start_at" class="form-control" required>
																</div>
																<label>Ngày Kết Thúc: </label>
																<div class="form-group">
																	<input type="date" name="expiry_at" class="form-control" required>
																</div>
																-->
																<label>Giá (250.000đ - 1.500.000đ): </label>
																<div class="form-group">
																	<input type="number" name="price" class="form-control" value="250000" min="250000" max="1500000" required>
																</div>
																
															</div>
															<div class="modal-footer">
																<input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal" value="Hủy">
																<input type="submit" class="btn btn-outline-primary btn-lg" value="Tạo">
															</div>
														</form>
													</div>
												</div>
											</div>
		
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
                                    {{ $products->links() }}
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