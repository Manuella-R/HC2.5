@extends('profile.profile-layout')
@section('profile')
<div class="card">
  <div class="card-header">
    Dashboard
  </div>
  <div class="card-body">
    <h5 class="card-title">Welcome to your profile {{ $user->first_name }}</h5>

    <table class="table">
 
      <tbody>
        <tr>
          <td>First Name</td>
          <td>{{ $user->first_name }}</td>
        </tr>
        <tr>
          <td>Last Name</td>
          <td>{{ $user->last_name }}</td>
        </tr>
        <tr>
          <td>Email</td>
          <td>{{ $user->email }}</td>
        </tr>
       
      </tbody>
    </table>
  </div>
</div>
@endsection
