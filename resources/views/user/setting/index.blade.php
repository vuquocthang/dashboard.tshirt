@extends('base')

@section('js')
<link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/app-assets/css/core/colors/palette-callout.css">
@endsection

@section('app')

<div class="app-content content">
    <div class="content-wrapper">
		<div class="content-header row">
			<div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
				<h3 class="content-header-title mb-0 d-inline-block">Setting</h3>
				<div class="row breadcrumbs-top d-inline-block">
					<div class="breadcrumb-wrapper col-12">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a>
							</li>
					
							<li class="breadcrumb-item active">Setting
							</li>
						</ol>
					</div>
				</div>
			</div>
		</div>

        <div class="content-body">
            <!-- Basic form layout section start -->
			
			@if ($errors->has('password'))
			<section id="basic-callouts">
				<div class="row">
					<div class="col-12">
						<div class="card">
							<div class="card-content collapse show">
								<div class="card-body">
									<div class="bs-callout-danger callout-border-left mt-1 p-1">
										<strong>Có lỗi xảy ra !</strong>
										<p>{{ $errors->first('password') }}</p>
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

            <section id="basic-form-layouts">

                <div class="row match-height">

                    <div class="col-md-6">
						<div class="card">
                            <div class="card-header">
                                <h4 class="card-title" id="basic-layout-icons">Tài Khoản</h4>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">

                                    <form class="form" method="post" action="{{ route('user.setting.update') }}">
                                        @csrf
										
										<div class="form-body">
                                            <div class="form-group">
                                                <label for="timesheetinput1">Email</label>
                                                <div class="position-relative has-icon-left">
                                                    <input type="text" name="email" id="timesheetinput1" class="form-control" value="{{ $user->email }}" disabled>
                                                    <div class="form-control-position">
                                                        <i class="ft-mail"></i>
                                                    </div>
                                                </div>
                                            </div>

                                            

                                            <div class="form-group">
                                                <label for="timesheetinput2">Họ Tên</label>
                                                <div class="position-relative has-icon-left">
                                                    <input type="text" name="name" id="timesheetinput2" class="form-control" value="{{ $user->name }}" >
                                                    <div class="form-control-position">
                                                        <i class="ft-user"></i>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="timesheetinput3">Số Điện Thoại</label>
                                                <div class="position-relative has-icon-left">
                                                    <input type="text" id="timesheetinput3" class="form-control" name="phone" placeholder="0123456789" value="{{ $user->phone }}">
                                                    <div class="form-control-position">
                                                        <i class="ft-phone"></i>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="timesheetinput3">Số Tài Khoản</label>
                                                <div class="position-relative has-icon-left">
                                                    <input type="text" class="form-control" name="bank_number" placeholder="0000111122223333" value="{{ $user->bank_number }}" >
                                                    <div class="form-control-position">
                                                        <i class="ft-credit-card"></i>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="projectinput5">Ngân Hàng</label>
                                                <select name="bank_name" class="form-control">
                                                    <option value="VCB">Vietcombank</option>
                                                    <option value="TCB">Techcombank</option>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="form-actions right">
                                            <button type="button" class="btn btn-warning mr-1">
                                                <i class="ft-x"></i> Hủy
                                            </button>
                                            <button type="submit" class="btn btn-primary">
                                                <i class="la la-check-square-o"></i> Lưu
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
						
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title" id="basic-layout-icons">Mật Khẩu</h4>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">

                                    <form class="form" method="post" action="{{ route('user.setting.update') }}">
                                        @csrf
										
										<input type="hidden" name="change_password" value="true" >
										
										<div class="form-body">
                                            
                                            <div class="form-group">
                                                <label for="timesheetinput2">Mật Khẩu Mới</label>
                                                <div class="position-relative">
                                                    <input type="password" class="form-control" placeholder="Mật Khẩu Mới" name="password" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="timesheetinput3">Xác Nhận Mật Khẩu Mới</label>
                                                <div class="position-relative">
                                                    <input type="password" class="form-control" placeholder="Xác Nhận Mật Khẩu Mới" name="password_confirmation" required>
                                                </div>
                                            </div>

                                            <div class="form-actions right">
                                                <button type="button" class="btn btn-warning mr-1">
                                                    <i class="ft-x"></i> Hủy
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i> Lưu
                                                </button>
                                            </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

            </section>
            <!-- // Basic form layout section end -->
            </div>
        </div>
    </div>
</div>
@endsection