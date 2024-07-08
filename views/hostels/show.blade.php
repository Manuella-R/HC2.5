@extends('layout.main-layout')

@section('body')

<div class="hostel-details">

    <h1>{{ $hostel->name }}</h1>

    <p><strong>Rent:</strong> ${{ number_format($hostel->rent, 2) }}/Month</p>

    <p><strong>Description:</strong> {{ $hostel->description }}</p>

    <p><strong>Vacant Beds:</strong> {{ $hostel->vacant_beds }}</p>

    @if(auth()->check())
        <p>User is logged in</p>
        <p>User role ID: {{ auth()->user()->user_role_id }}</p>
        @if(auth()->user()->user_role_id == 1) <!-- Changed from === to == -->
            <form action="{{ route('hostels.apply', $hostel->H_id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="personality">Personality Description:</label>
                    <textarea name="personality" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                    <label for="expectations">Neighbour Expectations:</label>
                    <textarea name="expectations" class="form-control" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Apply</button>
            </form>
        @else
            <p>You need the appropriate role to apply for this hostel.</p>
        @endif
    @else
        <p>You need to be logged in to apply for this hostel.</p>
    @endif

</div>

@endsection
