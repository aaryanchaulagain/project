@extends('layout.master', ['nonav' => true, 'noFooter' => true])

@section('monkey')
<div class="container mt-5">
    <h2 class="mb-4">Welcome, Owner!</h2>

    <div class="row">

        <!-- Upload Room -->
        <div class="col-12 col-md-4">
            <div class="card shadow-sm mb-3">
                <div class="card-body">
                    <h5 class="card-title">Upload New Room</h5>
                    <p class="card-text">Add a new room for renting.</p>
                    <a href="{{ route('owner.room.create') }}" class="btn btn-primary">Upload Room</a>
                </div>
            </div>
        </div>

        <!-- View Rooms -->
        <div class="col-12 col-md-4">
            <div class="card shadow-sm mb-3">
                <div class="card-body">
                    <h5 class="card-title">My Rooms</h5>
                    <p class="card-text">See all rooms you have listed.</p>
                    <a href="{{ route('owner.room.index') }}" class="btn btn-success">View Rooms</a>
                </div>
            </div>
        </div>

        <!-- Approval Status -->
        <div class="col-12 col-md-4">
            <div class="card shadow-sm mb-3">
                <div class="card-body">
                    <h5 class="card-title">Approval Status</h5>
                    <p class="card-text">Check which rooms are approved or pending.</p>
                    <a href="{{ route('owner.room.status') }}" class="btn btn-warning">Check Status</a>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
