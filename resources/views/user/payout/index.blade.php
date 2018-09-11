@extends('base')

@section('app')
<div class="app-content content">
    <div class="content-wrapper">
		<div class="content-header row">
			<div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
				<h3 class="content-header-title mb-0 d-inline-block">Rút Tiền</h3>
				<div class="row breadcrumbs-top d-inline-block">
					<div class="breadcrumb-wrapper col-12">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a>
							</li>
					
							<li class="breadcrumb-item active">Rút Tiền
							</li>
						</ol>
					</div>
				</div>
			</div>
		</div>

        <div class="content-body">
            <section id="basic-badges">
                <div class="row match-height">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card" style="height: 207.156px;">
                            <div class="card-header">
                                <h4 class="text-center">Rút Tiền</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body text-center">
                                    <p>Yêu cầu rút tiền đã sẵn sàng. Click
                                        <button class="btn btn-primary">vào đây</button> để xác nhận !</p>

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