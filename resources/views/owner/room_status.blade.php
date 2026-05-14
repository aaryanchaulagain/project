@extends('layout.master', ['nonav' => true, 'noFooter' => true])

@section('monkey')
<div class="container mt-5">
    <h2>Room Approval Status</h2>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($rooms as $room)
                <tr>
                    <td>{{ $room->name }}</td>
                    <td>{{ ucfirst($room->status) }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="2" class="text-center">You have not added any rooms yet.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
