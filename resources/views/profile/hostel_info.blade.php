@extends('profile.profile-layout')
@section('profile')
<div class="card">
  <div class="card-header">
    Update Hostel Information
  </div>
  <div class="card-body">
    <form action="{{ route('updatehostel_info') }}" id="update_profile_form" method="post">
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
        <label for="address">address</label>
        <input type="text" name="address" value="{{ old('address', $Hostel->address?? '') }}" class="form-control" id="address" placeholder="Enter your address">
        @if($errors->has('address'))
          <span class="text-danger">{{ $errors->first('address') }}</span>
        @endif
      </div>
      <div class="form-group">
        <label for="description">describe the hostel</label>
        <input type="text" name="description" value="{{ old('description', $Hostel->description ?? '') }}" class="form-control" id="description" placeholder="Enter description">
        @if($errors->has('description'))
          <span class="text-danger">{{ $errors->first('description') }}</span>
        @endif
      </div>
      <div class="form-group">
        <label for="rent">Enter the monthly rent</label>
        <input type="number" name="rent" value="{{ old('rent', $Hostel->rent ?? '') }}" class="form-control" id="rent" placeholder="Enter rent">
        @if($errors->has('rent'))
          <span class="text-danger">{{ $errors->first('rent') }}</span>
        @endif
      </div>
      <div class="form-group">
        <label for="amenities">What are apartment amenities</label>
        <input type="text" name="amenities" value="{{ old('amenities', $Hostel->amenities ?? '') }}" class="form-control" id="amenities" placeholder="Enter amenities">
        @if($errors->has('amenities'))
          <span class="text-danger">{{ $errors->first('amenities') }}</span>
        @endif
      </div>
      <div class="form-group">
        <label for="rules">Rules to be followed in the hostel</label>
        <textarea name="rules" value="{{ old('rules', $Hostel->rules ?? '') }}" class="form-control" id="rules" placeholder="rules"></textarea>
        @if($errors->has('rules'))
          <span class="text-danger">{{ $errors->first('rules') }}</span>
        @endif
      </div>
      
      <div class="form-group">
    <label for="availability">Vacancies available</label>
    <div>
        <label><input type="radio" name="availability" value="1" {{ old('availability', $Hostel->availability ?? '') == '1' ? 'checked' : '' }}> Yes</label>
        <label><input type="radio" name="availability" value="0" {{ old('availability', $Hostel->availability ?? '') == '0' ? 'checked' : 'checked' }}> No</label>
    </div>
    @if($errors->has('availability'))
        <span class="text-danger">{{ $errors->first('availability') }}</span>
    @endif
</div>

<div class="form-group">
        <label for="number_beds">Total number of beds</label>
        <input type="number" name="number_beds" value="{{ old('number_beds', $Hostel->number_beds ?? '') }}" class="form-control" id="number_beds" placeholder="beds"></textarea>
        @if($errors->has('number_beds'))
          <span class="text-danger">{{ $errors->first('number_beds') }}</span>
        @endif
      </div>
      <div class="form-group">
        <label for="vacant_beds">Vacant beds currently</label>
        <input type="number" name="vacant_beds" value="{{ old('vacant_beds', $Hostel->vacant_beds ?? '') }}" class="form-control" id="vacant_beds" placeholder="beds"></textarea>
        @if($errors->has('vacant_beds'))
          <span class="text-danger">{{ $errors->first('vacant_beds') }}</span>
        @endif
      </div>
      
      <div class="form-group">
    <label for="constant_water_supply">Constant water supply</label>
    <div>
        <label><input type="radio" name="constant_water_supply" value="1" {{ old('constant_water_supply', $Hostel->constant_water_supply ?? '') == '1' ? 'checked' : '' }}> Yes</label>
        <label><input type="radio" name="constant_water_supply" value="0" {{ old('constant_water_supply', $Hostel->constant_water_supply ?? '') == '0' ? 'checked' : 'checked' }}> No</label>
    </div>
    @if($errors->has('constant_water_supply'))
        <span class="text-danger">{{ $errors->first('constant_water_supply') }}</span>
    @endif
</div>

<div class="form-group">
    <label for="private_security">Private Security</label>
    <div>
        <label><input type="radio" name="private_security" value="1" {{ old('private_security', $Hostel->private_security ?? '') == '1' ? 'checked' : '' }}> Yes</label>
        <label><input type="radio" name="private_security" value="0" {{ old('private_security', $Hostel->private_security ?? '') == '0' ? 'checked' : 'checked' }}> No</label>
    </div>
    @if($errors->has('private_security'))
        <span class="text-danger">{{ $errors->first('private_security') }}</span>
    @endif
</div>

<div class="form-group">
    <label for="parking_space">Parking space availability</label>
    <div>
        <label><input type="radio" name="parking_space" value="1" {{ old('parking_space', $Hostel->parking_space ?? '') == '1' ? 'checked' : '' }}> Yes</label>
        <label><input type="radio" name="parking_space" value="0" {{ old('parking_space', $Hostel->parking_space ?? '') == '0' ? 'checked' : 'checked' }}> No</label>
    </div>
    @if($errors->has('parking_space'))
        <span class="text-danger">{{ $errors->first('parking_space') }}</span>
    @endif
</div>

<div class="form-group">
    <label for="caretaker">Live-in Caretaker</label>
    <div>
        <label><input type="radio" name="caretaker" value="1" {{ old('caretaker', $Hostel->caretaker ?? '') == '1' ? 'checked' : '' }}> Yes</label>
        <label><input type="radio" name="caretaker" value="0" {{ old('caretaker', $Hostel->caretaker ?? '') == '0' ? 'checked' : 'checked' }}> No</label>
    </div>
    @if($errors->has('caretaker'))
        <span class="text-danger">{{ $errors->first('caretaker') }}</span>
    @endif
</div>

      <button type="submit" class="btn btn-primary">Create hostel Profile</button>
    </form>
  </div>
</div>
@endsection
