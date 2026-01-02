@extends('layout.master', ['nonav' => true, 'noFooter' => true])

@section('monkey')
<div class="container mt-5">
    <h2>Edit Room Details</h2>
    <form action="{{ route('owner.room.update', $room->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Room Name</label>
            <input type="text" name="name" value="{{ $room->name }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Room Type</label>
            <input type="text" name="type" value="{{ $room->type }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Rooms Available</label>
            <input type="number" name="rooms_available" value="{{ $room->rooms_available }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Price</label>
            <input type="number" name="price" value="{{ $room->price }}" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Room</button>
    </form>
</div>
@endsection
