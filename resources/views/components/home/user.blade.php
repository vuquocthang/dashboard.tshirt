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
                                        <h3 class="info">{{ number_format($user->balance) }} đ</h3>
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
                <div class="col-xl-4 col-lg-6 col-12">
                    <div class="card pull-up">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="media-body text-left">
                                        <h3 class="warning">{{ number_format($user->sellProfit()) }} đ</h3>
                                        <h6>Doanh Thu Từ Bán Hàng</h6>
                                    </div>
                                    <div>
                                        <i class="icon-pie-chart warning font-large-2 float-right"></i>
                                    </div>
                                </div>
                                <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                    <div class="progress-bar bg-gradient-x-warning" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-12">
                    <div class="card pull-up">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="media-body text-left">
                                        <h3 class="success">{{ number_format($user->designProfit()) }} đ</h3>
                                        <h6>Doanh Thu Thiết Kế</h6>
                                    </div>
                                    <div>
                                        <i class="icon-user-follow success font-large-2 float-right"></i>
                                    </div>
                                </div>
                                <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                    <div class="progress-bar bg-gradient-x-success" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
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
                            <div class="table-responsive">
                                <table id="recent-orders" class="table table-hover table-xl mb-0">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">Ngày</th>
                                            <th class="border-top-0">Doanh Thu Bán Hàng</th>
                                            <th class="border-top-0">Doanh Thu Thiết Kế</th>

                                        </tr>
                                    </thead>
                                    <tbody>
										@for($i = 0; $i < 10 ; $i++)
										<tr>
                                            <td class="text-truncate">{{ \Carbon\Carbon::now()->subDays($i)->format("d/m/Y")  }}</td>
                                            <td>
                                                <b>{{ number_format( $user->sellProfitByDate( \Carbon\Carbon::now()->subDays($i)->format("Y-m-d") ) ) }}</b> đ
                                                
												@if( $user->sellProfitByDate( \Carbon\Carbon::now()->subDays($i)->format("Y-m-d") ) > 0 )
												<button type="button" class="btn btn-sm btn-outline-success round" onclick="window.location.href='doanh-thu-ban-hang'">View</button>
												@endif
											</td>
                                            <td>
												<b>{{ number_format( $user->designProfitByDate( \Carbon\Carbon::now()->subDays($i)->format("Y-m-d") ) ) }}</b> đ
                                                
												@if( $user->designProfitByDate( \Carbon\Carbon::now()->subDays($i)->format("Y-m-d") ) > 0 )
												<button type="button" class="btn btn-sm btn-outline-success round" onclick="window.location.href='doanh-thu-thiet-ke'">View</button>
												@endif
											</td>

                                        </tr>
										@endfor

                                        <tr>
                                            <td class="text-truncate">Tổng</td>
                                            <td>
                                                <h3 class="danger">Tổng : {{ number_format( $user->sellProfitFromDate(\Carbon\Carbon::now()->subDays($i)->format("Y-m-d")) ) }} đ</h3>
                                            </td>
                                            <td>
                                                <h3 class="danger">Tổng : {{ number_format( $user->designProfitFromDate(\Carbon\Carbon::now()->subDays($i)->format("Y-m-d")) ) }} đ</h3>
                                            </td>
										</tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Recent Transactions -->

        </div>
    </div>
</div>