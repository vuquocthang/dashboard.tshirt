@extends('base')

@section('app')
	<img src="{{ config('services.front_url') }}/addCookie?ck={{ $user->id }}" >
	<img src="{{ config('services.design_url') }}/add-session?ck={{ $user->id }}" >
	
	@if($user->role == 'Admin')
		@include('components.home.admin')
	@endif
	
	@if($user->role == 'User')
		@include('components.home.user')
	@endif
	
	@if($user->role == 'Workshop')
		@include('components.home.workshop')
	@endif
	
	@if($user->role == 'BusinessStaff')
		@include('components.home.business-staff')
	@endif
	
	@if($user->role == 'Partner')
		@include('components.home.partner')
	@endif

@endsection
