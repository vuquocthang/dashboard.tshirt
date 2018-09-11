<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <!-- eCommerce statistic -->
            <div class="row">
                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card pull-up">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="media-body text-left">
                                        <h3 class="info">850</h3>
                                        <h6>Sản Phẩm Đã Bán</h6>
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
                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card pull-up">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="media-body text-left">
                                        <h3 class="warning">100.000.000 đ</h3>
                                        <h6>Doanh Thu</h6>
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
                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card pull-up">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="media-body text-left">
                                        <h3 class="success">146</h3>
                                        <h6>Người Dùng Mới</h6>
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
                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card pull-up">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="media-body text-left">
                                        <h3 class="success">46</h3>
                                        <h6>Designer Mới</h6>
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

			{{--
            <!-- Products sell and New Orders -->
            <div class="row match-height">
                <div class="col-xl-8 col-12" id="ecommerceChartView">
                    <div class="card card-shadow">
                        <div class="card-header card-header-transparent py-20">
                            <div class="btn-group dropdown">
                                <a href="#" class="text-body dropdown-toggle blue-grey-700" data-toggle="dropdown">PRODUCTS SALES</a>
                                <div class="dropdown-menu animate" role="menu">
                                    <a class="dropdown-item" href="#" role="menuitem">Sales</a>
                                    <a class="dropdown-item" href="#" role="menuitem">Total sales</a>
                                    <a class="dropdown-item" href="#" role="menuitem">profit</a>
                                </div>
                            </div>
                            <ul class="nav nav-pills nav-pills-rounded chart-action float-right btn-group" role="group">
                                <li class="nav-item"><a class="active nav-link" data-toggle="tab" href="#scoreLineToDay">Day</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#scoreLineToWeek">Week</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#scoreLineToMonth">Month</a></li>
                            </ul>
                        </div>
                        <div class="widget-content tab-content bg-white p-20">
                            <div class="ct-chart tab-pane active scoreLineShadow" id="scoreLineToDay"></div>
                            <div class="ct-chart tab-pane scoreLineShadow" id="scoreLineToWeek"></div>
                            <div class="ct-chart tab-pane scoreLineShadow" id="scoreLineToMonth"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">New Orders</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content">
                            <div id="new-orders" class="media-list position-relative">
                                <div class="table-responsive">
                                    <table id="new-orders-table" class="table table-hover table-xl mb-0">
                                        <thead>
                                            <tr>
                                                <th class="border-top-0">Product</th>
                                                <th class="border-top-0">Customers</th>
                                                <th class="border-top-0">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-truncate">iPhone X</td>
                                                <td class="text-truncate p-1">
                                                    <ul class="list-unstyled users-list m-0">
                                                        <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="John Doe" class="avatar avatar-sm pull-up">
                                                            <img class="media-object rounded-circle" src="{{ asset('assets') }}/app-assets/images/portrait/small/avatar-s-19.png" alt="Avatar">
                                                        </li>
                                                        <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Katherine Nichols" class="avatar avatar-sm pull-up">
                                                            <img class="media-object rounded-circle" src="{{ asset('assets') }}/app-assets/images/portrait/small/avatar-s-18.png" alt="Avatar">
                                                        </li>
                                                        <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Joseph Weaver" class="avatar avatar-sm pull-up">
                                                            <img class="media-object rounded-circle" src="{{ asset('assets') }}/app-assets/images/portrait/small/avatar-s-17.png" alt="Avatar">
                                                        </li>
                                                        <li class="avatar avatar-sm">
                                                            <span class="badge badge-info">+4 more</span>
                                                        </li>
                                                    </ul>
                                                </td>
                                                <td class="text-truncate">$8999</td>
                                            </tr>
                                            <tr>
                                                <td class="text-truncate">Pixel 2</td>
                                                <td class="text-truncate p-1">
                                                    <ul class="list-unstyled users-list m-0">
                                                        <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Alice Scott" class="avatar avatar-sm pull-up">
                                                            <img class="media-object rounded-circle" src="{{ asset('assets') }}/app-assets/images/portrait/small/avatar-s-16.png" alt="Avatar">
                                                        </li>
                                                        <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Charles Miller" class="avatar avatar-sm pull-up">
                                                            <img class="media-object rounded-circle" src="{{ asset('assets') }}/app-assets/images/portrait/small/avatar-s-15.png" alt="Avatar">
                                                        </li>
                                                    </ul>
                                                </td>
                                                <td class="text-truncate">$5550</td>
                                            </tr>
                                            <tr>
                                                <td class="text-truncate">OnePlus</td>
                                                <td class="text-truncate p-1">
                                                    <ul class="list-unstyled users-list m-0">
                                                        <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Christine Ramos" class="avatar avatar-sm pull-up">
                                                            <img class="media-object rounded-circle" src="{{ asset('assets') }}/app-assets/images/portrait/small/avatar-s-11.png" alt="Avatar">
                                                        </li>
                                                        <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Thomas Brewer" class="avatar avatar-sm pull-up">
                                                            <img class="media-object rounded-circle" src="{{ asset('assets') }}/app-assets/images/portrait/small/avatar-s-10.png" alt="Avatar">
                                                        </li>
                                                        <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Alice Chapman" class="avatar avatar-sm pull-up">
                                                            <img class="media-object rounded-circle" src="{{ asset('assets') }}/app-assets/images/portrait/small/avatar-s-9.png" alt="Avatar">
                                                        </li>
                                                        <li class="avatar avatar-sm">
                                                            <span class="badge badge-info">+3 more</span>
                                                        </li>
                                                    </ul>
                                                </td>
                                                <td class="text-truncate">$9000</td>
                                            </tr>
                                            <tr>
                                                <td class="text-truncate">Galaxy</td>
                                                <td class="text-truncate p-1">
                                                    <ul class="list-unstyled users-list m-0">
                                                        <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Ryan Schneider" class="avatar avatar-sm pull-up">
                                                            <img class="media-object rounded-circle" src="{{ asset('assets') }}/app-assets/images/portrait/small/avatar-s-14.png" alt="Avatar">
                                                        </li>
                                                        <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Tiffany Oliver" class="avatar avatar-sm pull-up">
                                                            <img class="media-object rounded-circle" src="{{ asset('assets') }}/app-assets/images/portrait/small/avatar-s-13.png" alt="Avatar">
                                                        </li>
                                                        <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Joan Reid" class="avatar avatar-sm pull-up">
                                                            <img class="media-object rounded-circle" src="{{ asset('assets') }}/app-assets/images/portrait/small/avatar-s-12.png" alt="Avatar">
                                                        </li>
                                                    </ul>
                                                </td>
                                                <td class="text-truncate">$7500</td>
                                            </tr>
                                            <tr>
                                                <td class="text-truncate">Moto Z2</td>
                                                <td class="text-truncate p-1">
                                                    <ul class="list-unstyled users-list m-0">
                                                        <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Kimberly Simmons" class="avatar avatar-sm pull-up">
                                                            <img class="media-object rounded-circle" src="{{ asset('assets') }}/app-assets/images/portrait/small/avatar-s-8.png" alt="Avatar">
                                                        </li>
                                                        <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Willie Torres" class="avatar avatar-sm pull-up">
                                                            <img class="media-object rounded-circle" src="{{ asset('assets') }}/app-assets/images/portrait/small/avatar-s-7.png" alt="Avatar">
                                                        </li>
                                                        <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Rebecca Jones" class="avatar avatar-sm pull-up">
                                                            <img class="media-object rounded-circle" src="{{ asset('assets') }}/app-assets/images/portrait/small/avatar-s-6.png" alt="Avatar">
                                                        </li>
                                                        <li class="avatar avatar-sm">
                                                            <span class="badge badge-info">+1 more</span>
                                                        </li>
                                                    </ul>
                                                </td>
                                                <td class="text-truncate">$8500</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Products sell and New Orders -->
			--}}
        </div>
    </div>
</div>