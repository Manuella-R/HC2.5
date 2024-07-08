@extends('layout.main-layout')

@section('body')
<div class="row">
    <div class="col-md-4">
        <ul class="list-group profile-nav">
            <li class="list-group-item {{ (request()->route()->getName() == 'dashboard') ? 'active' : '' }}"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="list-group-item {{ (request()->route()->getName() == 'edit_profile') ? 'active' : '' }}"><a href="{{ route('edit_profile') }}">Edit Profile</a></li>
            <li class="list-group-item {{ (request()->route()->getName() == 'change_password') ? 'active' : '' }}"><a href="{{ route('change_password') }}">Change Password</a></li>
            <li class="list-group-item {{ (request()->route()->getName() == 'edit_userinfo') ? 'active' : '' }}"><a href="{{ route('edit_userinfo') }}">User info</a></li>
            
            {{-- Conditionally render Create Hostel info link based on user role --}}
            @if(auth()->check() && auth()->user()->user_role_id === 3)
				<li class="list-group-item {{ (request()->route()->getName() == 'hostel_info_main') ? 'active' : '' }}"><a href="{{ route('hostel_info_main') }}">View Hostel Info</a></li>

				@endif

                <li class="list-group-item {{ (request()->route()->getName() == 'hostel_info') ? 'active' : '' }}"><a href="{{ route('hostel_info') }}">Create Hostel info</a></li>
				<li class="list-group-item {{ (request()->route()->getName() == 'hostel_info_main') ? 'active' : '' }}"><a href="{{ route('hostel_info_main') }}">View Hostel Info</a></li>

        </ul>
    </div>
    <div class="col-md-8">
        @yield('profile')
    </div>
</div>

{{-- Debugging --}}
<p>User Role ID: {{ auth()->check() ? auth()->user()->user_role_id : 'Not logged in' }}</p>

@endsection
