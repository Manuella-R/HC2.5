@extends('layout.main-layout')

@section('body')
<div class="row mb-3">
    <form action="{{ route('postRegister') }}" method="POST" enctype="multipart/form-data" class="col-md-6 col-xs-12 offset-md-3 auth-form" id="registration_form">
        @csrf
        <div class="form-title">SIGN UP</div>
        
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text" class="form-control" value="{{ old('first_name') }}" name="first_name" id="first_name" placeholder="First Name">
                    @if($errors->any('first_name'))
                        <span class="text-danger">{{ $errors->first('first_name') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" class="form-control" value="{{ old('last_name') }}" name="last_name" id="last_name" placeholder="Last Name">
                    @if($errors->any('last_name'))
                        <span class="text-danger">{{ $errors->first('last_name') }}</span>
                    @endif
                </div>
            </div>
        </div>
        
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" value="{{ old('email') }}" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            @if($errors->any('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
            @endif
        </div>
        
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" autocomplete="false" id="password" placeholder="Password">
            @if($errors->any('password'))
                <span class="text-danger">{{ $errors->first('password') }}</span>
            @endif
        </div>
        
        <div class="form-group">
            <label for="confirm_password">Confirm Password</label>
            <input type="password" class="form-control" name="confirm_password" autocomplete="false" id="confirm_password" placeholder="Confirm Password">
            @if($errors->any('confirm_password'))
                <span class="text-danger">{{ $errors->first('confirm_password') }}</span>
            @endif
        </div>
        
        <label for="student">
            <input type="radio" id="student" name="role" value="student" required>
            Student
        </label>
        <label for="admin">
            <input type="radio" id="caretaker" name="role" value="caretaker" required>
            caretaker
        </label>
        
        <div id="student_fields" style="display:none;">
            <div class="form-group">
                <label for="phone_number">Phone number</label>
                <input type="text" class="form-control" name="phone_number" autocomplete="false" id="phone_number" placeholder="Phone number">
                @if($errors->any('phone_number'))
                    <span class="text-danger">{{ $errors->first('phone_number') }}</span>
                @endif
            </div>
            
            <div class="form-group">
                <label for="establishment_name">University name</label>
                <input type="text" class="form-control" name="establishment_name" autocomplete="false" id="establishment_name" placeholder="University name">
                @if($errors->any('establishment_name'))
                    <span class="text-danger">{{ $errors->first('establishment_name') }}</span>
                @endif
            </div>
			<div class="form-group">
            <input type="checkbox" {{ (old('terms')) ? 'checked' : '' }} name="terms" id="terms" class="form-check-input">
            <label class="form-group" for="terms_check">Check our <a href="#">terms</a> and <a href="#">conditions</a></label>
            </div>
        
           <div>
            <button type="submit" class="btn btn-primary mt-2">Submit</button>&nbsp; 
           
           </div>
        </div>
        
        <div id="admin_fields" style="display:none;">
            <div class="form-group">
                <label for="phone_number">Phone number</label>
                <input type="text" class="form-control" name="phone_number" autocomplete="false" id="phone_number" placeholder="Phone number">
                @if($errors->any('phone_number'))
                    <span class="text-danger">{{ $errors->first('phone_number') }}</span>
                @endif
            </div>
            
            <div class="form-group">
                <label for="establishment_name">Name of business</label>
                <input type="text" class="form-control" name="establishment_name" autocomplete="false" id="establishment_name" placeholder="Name of business">
                @if($errors->any('establishment_name'))
                    <span class="text-danger">{{ $errors->first('establishment_name') }}</span>
                @endif
            </div>

		<div class="form-group">
            <input type="checkbox" {{ (old('terms')) ? 'checked' : '' }} name="terms" id="terms" class="form-check-input">
            <label class="form-check-label" for="terms_check">Check our <a href="#">terms</a> and <a href="#">conditions</a></label>
        </div>
        
        <div>
            <button type="submit" class="btn btn-primary mt-2">Submit</button>&nbsp; 
           
        </div>
        </div>
        
        
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const studentRadio = document.getElementById('student');
        const adminRadio = document.getElementById('caretaker');
        const studentFields = document.getElementById('student_fields');
        const adminFields = document.getElementById('admin_fields');
        
        function toggleFields() {
            if (studentRadio.checked) {
                studentFields.style.display = 'block';
                adminFields.style.display = 'none';
            } else if (adminRadio.checked) {
                adminFields.style.display = 'block';
                studentFields.style.display = 'none';
            }
        }
        
        studentRadio.addEventListener('change', toggleFields);
        adminRadio.addEventListener('change', toggleFields);
    });
</script>
@endsection
