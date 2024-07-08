@extends('profile.profile-layout')
@section('profile')
    <div class="container">
        <h1>Hostel Information</h1>

        <table class="table">
            <tbody>
                <tr>
                    <td>Address</td>
                    <td>{{ $hostel->address }}</td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td>{{ $hostel->description }}</td>
                </tr>
                <tr>
                    <td>Rent</td>
                    <td>{{ $hostel->rent }}</td>
                </tr>
                <tr>
                    <td>Amenities</td>
                    <td>{{ $hostel->amenities }}</td>
                </tr>
                <tr>
                    <td>Rules</td>
                    <td>{{ $hostel->rules }}</td>
                </tr>
                <tr>
                    <td>Availability</td>
                    <td>{{ $hostel->availability ? 'Yes' : 'No' }}</td>
                </tr>
                <tr>
                    <td>Number of Beds</td>
                    <td>{{ $hostel->number_beds }}</td>
                </tr>
                <tr>
                    <td>Vacant Beds</td>
                    <td>{{ $hostel->vacant_beds }}</td>
                </tr>
                <tr>
                    <td>Constant Water Supply</td>
                    <td>{{ $hostel->constant_water_supply ? 'Yes' : 'No' }}</td>
                </tr>
                <tr>
                    <td>Private Security</td>
                    <td>{{ $hostel->private_security ? 'Yes' : 'No' }}</td>
                </tr>
                <tr>
                    <td>Parking Space</td>
                    <td>{{ $hostel->parking_space ? 'Yes' : 'No' }}</td>
                </tr>
                <tr>
                    <td>Caretaker</td>
                    <td>{{ $hostel->caretaker ? 'Yes' : 'No' }}</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
