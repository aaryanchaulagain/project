@extends('layout.master', ['nonav' => true, 'noFooter' => true])

@section('monkey')
<div class="container mt-5">
    <h2>Room Approval Status</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rooms as $room)
            <tr>
                <td>{{ $room->name }}</td>
                <td>{{ ucfirst($room->status) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
