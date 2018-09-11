@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/app-assets/vendors/css/tables/datatable/datatables.min.css">
<link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/app-assets/css/core/colors/palette-callout.css">
@endsection

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <!-- eCommerce statistic -->
            <div class="row">
                <div class="col-xl-4 col-lg-6 col-12">
                    <div class="card pull-up">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="media-body text-left">
                                        <h3 class="info">{{ $user->balance }} đ</h3>
                                        <h6>Số Dư</h6>
                                    </div>
                                    <div>
                                        <i class="icon-basket-loaded info font-large-2 float-right"></i>
                                    </div>
                                </div>
                                <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                    <div class="progress-bar bg-gradient-x-info" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
			</div>
            <!--/ eCommerce statistic -->

            <!-- Recent Transactions -->
            <div class="row">
                <div id="recent-transactions" class="col-12">
                    <div class="card">

                        <div class="card-content">
						
							@if (session('error'))
							<section id="basic-callouts">
								<div class="row">
									<div class="col-12">
										<div class="card">
											<div class="card-content collapse show">
												<div class="card-body">
													<div class="bs-callout-danger callout-border-left mt-1 p-1">
														<strong>Có lỗi xảy ra !</strong>
														<p>{{ session('error') }}</p>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</section>
							@endif
						
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
						
						<div class="card-body">

                                    <form class="form" method="post" action="{{ route('partner.order.find') }}" >
										@csrf
									
                                        <div class="row justify-content-md-center">
                                            <div class="col-md-3">
                                                <div class="form-body">


                                                </div>
                                            </div>
											
											<div class="col-md-6">
                                                <div class="form-body">
                                                    <div class="form-group">
                                                        <label for="timesheetinput1">Mã Đơn Hàng</label>
                                                        <div class="position-relative has-icon-left">
                                                            <input type="text" value="{{ old('order_id') }}" name="order_id" id="timesheetinput1" class="form-control" value="" placeholder="123115" required>
                                                            <div class="form-control-position">
                                                                <i class="ft-mail"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-body">


                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-actions center">
                                            <button type="button" class="btn btn-warning mr-1">
                                                <i class="ft-x"></i> Hủy
                                            </button>
                                            <button type="submit" class="btn btn-primary">
                                                <i class="la la-check-square-o"></i> Tìm Kiếm
                                            </button>
                                        </div>
                                    </form>
                                </div>
						</div>
                    </div>
                </div>
            </div>
            <!--/ Recent Transactions -->
			
			@if( session('orders') )
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
												<th>Giá Trị Đơn Hàng</th>
                                                <th>Trạng Thái</th>
											</tr>
                                        </thead>
										
										
                                        <tbody>
											@foreach( session('orders') as $index => $order)
                                            <tr>
                                                <td>#{{ $order->id }}</td>
                                                <td>{{ fmDate( $order->created_at, "Y-m-d H:i:s", "d/m/Y" ) }}</td>
												
												<td><b>{{ $order->details()->join('product', 'order_detail.product_id', 'product.id')->selectRaw("SUM(product_quantity * product.price ) as total")->get()[0]->total }}</b> đ</td>
                                                
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-outline-success round" onclick="confirm_process('Xác nhận thanh toán đơn hàng này ?', {{ $order->id }})">Thanh Toán Ngay</button>
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
			@endif

        </div>
    </div>
</div>

@section('js')
<script src="{{ asset('assets') }}/app-assets/vendors/js/tables/datatable/datatables.min.js" type="text/javascript"></script>
<script src="{{ asset('assets') }}/app-assets/js/scripts/tables/datatables/datatable-basic.js" type="text/javascript"></script>

<script type="text/javascript">
function confirm_process(question, id) {

  if(confirm(question, id)){
	  window.location.href = "{{ url('partner/order/process') }}" + '/' + id

  }else{
    return false;  
  }

}
</script>
@endsection