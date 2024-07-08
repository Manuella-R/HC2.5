@extends('profile.profile-layout')
@section('profile')
<div class="card">
  <div class="card-header">
    Update Profile
  </div>
  <div class="card-body">
    <form action="{{ route('updateUserinfo') }}" id="update_profile_form" method="post">
    @csrf
    @method('PUT')
      <div class="form-group">
        <label for="first_name">First Name</label>
        <input type="text" name="first_name" value="{{ old('first_name', $user->first_name ?? '') }}" class="form-control" id="first_name" placeholder="Enter first name">
        @if($errors->has('first_name'))
          <span class="text-danger">{{ $errors->first('first_name') }}</span>
        @endif
      </div>
      <div class="form-group">
        <label for="last_name">Last Name</label>
        <input type="text" name="last_name" value="{{ old('last_name', $user->last_name ?? '') }}" class="form-control" id="last_name" placeholder="Enter last name">
        @if($errors->has('last_name'))
          <span class="text-danger">{{ $errors->first('last_name') }}</span>
        @endif
      </div>
      <!-- Additional fields from user_desc table -->
      <div class="form-group">
        <label for="gender">Gender</label>
        <input type="text" name="gender" value="{{ old('gender', $UserDescription->gender?? '') }}" class="form-control" id="gender" placeholder="Enter gender">
        @if($errors->has('gender'))
          <span class="text-danger">{{ $errors->first('gender') }}</span>
        @endif
      </div>
     
      <div class="form-group">
        <label for="admission_number">Admission number</label>
        <input type="number" name="admission_number" value="{{ old('admission_number', $UserDescription->admission_number ?? '') }}" class="form-control" id="admission_number" placeholder="Enter your admission number">
        @if($errors->has('admission_number'))
          <span class="text-danger">{{ $errors->first('admission_number') }}</span>
        @endif
      </div>
     
      <div class="form-group">
        <label for="personality">Personality</label>
        <textarea name="personality" value="{{ old('personality', $UserDescription->personality ?? '') }}" class="form-control" id="personality" placeholder="Describe your personality"></textarea>
        @if($errors->has('personality'))
          <span class="text-danger">{{ $errors->first('personality') }}</span>
        @endif
      </div>
      
      <div class="form-group">
        <label for="describe_yourself">description</label>
        <textarea name="additional_info" value="{{ old('describe_yourself', $UserDescription->describe_yourself ?? '') }}" class="form-control" id="describe_yourself" placeholder="Describe yourself and how you'd socialize with fellow hostel members"></textarea>
        @if($errors->has('describe_yourself'))
          <span class="text-danger">{{ $errors->first('describe_yourself') }}</span>
        @endif
      </div>
      <button type="submit" class="btn btn-primary">Update Profile</button>
    </form>
  </div>
</div>
@endsection
