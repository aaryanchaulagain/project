@extends('layout.master', ['nonav' => true, 'noFooter' => true])

@section('monkey')
<div class="container py-5">
    <h2 class="mb-4 text-center">Admin Dashboard</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-lg">
        <div class="card-header bg-danger text-white">
            <h4 class="mb-0">Room Management</h4>
        </div>
        <div class="card-body p-0 table-responsive">
            <table class="table table-bordered mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Name</th>
                        <th>Owner ID</th>
                        <th>Type</th>
                        <th>Rooms Available</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($rooms as $room)
                    <tr>
                        <td>{{ $room->name }}</td>
                        <td>{{ $room->owner_id }}</td>
                        <td>{{ $room->type }}</td>
                        <td>{{ $room->rooms_available }}</td>
                        <td>Rs {{ $room->price }}</td>
                        <td>
                            @if($room->status == 'hold')
                                <span class="badge bg-warning">Pending</span>
                            @elseif($room->status == 'approved')
                                <span class="badge bg-success">Approved</span>
                            @else
                                <span class="badge bg-secondary">{{ ucfirst($room->status) }}</span>
                            @endif
                        </td>
                        <td>
                            <img src="{{ $room->image ? asset('uploads/rooms/' . $room->image) : asset('images/default-room.svg') }}"
                                 alt="{{ $room->name }}" height="60">
                        </td>
                        <td>
                            @if($room->status == 'hold')
                                <form action="{{ route('admin.room.approve', $room->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    <button class="btn btn-sm btn-success" onclick="return confirm('Approve this room?')">Approve</button>
                                </form>
                            @endif

                            <form action="{{ route('admin.room.delete', $room->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this room?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center">No rooms found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
    body {
        background-color: #f8f9fa;
    }
    .card-header {
        font-weight: 600;
    }
    .badge {
        font-size: 0.9rem;
    }
</style>
@endsection
