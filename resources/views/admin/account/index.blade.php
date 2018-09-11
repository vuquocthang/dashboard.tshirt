@extends('base')

@section('app')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
			<div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
				<h3 class="content-header-title mb-0 d-inline-block">Tài Khoản</h3>
				<div class="row breadcrumbs-top d-inline-block">
					<div class="breadcrumb-wrapper col-12">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a>
							</li>
					
							<li class="breadcrumb-item active">Tài Khoản
							</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
		
        <div class="content-body">

            <!-- Recent Transactions -->
            <div class="row">
                <div id="recent-transactions" class="col-12">
                    <div class="card">

                        <div class="card-header">
                            <button type="button" class="btn btn-success btn-min-width btn-glow mr-1 mb-1" onclick="window.location.href='{{ route('admin.account.create') }}'">Tạo Tài Khoản</button>
                        </div>

                        <!--
				<div class="card-content collapse show col-md-6" >
					<div class="card-body">
						<form class="form">
							<div class="form-body">
								<div class="form-group col-md-3">
									<label for="issueinput5">Priority</label>
									<select id="issueinput5" name="priority" class="form-control" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Priority" data-original-title="" title="">
										<option value="low">Low</option>
										<option value="medium">Medium</option>
										<option value="high">High</option>
									</select>
								</div>

								<button type="submit" class="btn btn-primary">
									<i class="la la-check-square-o"></i> Tìm
								</button>
							</div>

						</form>
					</div>
				</div> -->

                        <div class="card-content">
                            <div class="table-responsive">
                                <table id="recent-orders" class="table table-hover table-xl mb-0">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">STT</th>
                                            <th class="border-top-0">Username</th>
                                            <th class="border-top-0">Vai Trò</th>
                                            <th class="border-top-0">Hành Động</th>
                                            <th class="border-top-0">Hành Động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										@foreach($accounts as $index => $account)
                                        <tr>
                                            <td class="text-truncate">{{ $index + 1 }}</td>
                                            <td>{{ $account->email }}</td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-outline-success round">{{ $account->role }}</button>
                                            </td>

                                            <td>
                                                <button type="button" class="btn btn-primary round btn-min-width mr-1 mb-1" onclick="window.location.href='{{ route('admin.account.update', $account->id) }}'">Sửa</button>
                                            </td>

                                            <td>
                                                <button type="button" class="btn btn-danger round btn-min-width mr-1 mb-1" onclick="">Xóa</button>
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
									{{ $accounts->links() }}
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