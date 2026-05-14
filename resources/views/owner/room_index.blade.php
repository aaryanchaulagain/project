@extends('layout.master', ['nonav' => true, 'noFooter' => true])
@section('monkey')
<div class="container mt-5">
    <h2>Your Rooms</h2>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="table-responsive">
        <table class="table table-bordered align-middle">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Rooms Available</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($rooms as $room)
                <tr>
                    <td>{{ $room->name }}</td>
                    <td>{{ $room->type }}</td>
                    <td>{{ $room->rooms_available }}</td>
                    <td>Rs {{ number_format($room->price) }}</td>
                    <td>{{ ucfirst($room->status) }}</td>
                    <td>
                        <a href="{{ route('owner.room.edit', $room->id) }}" class="btn btn-sm btn-warning">Edit</a>

                        <form action="{{ route('owner.room.destroy', $room->id) }}" method="POST" class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">You have not added any rooms yet.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
