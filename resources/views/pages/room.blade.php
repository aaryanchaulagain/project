@extends('layout.master')

@section('monkey')
<div class="py-5" style="background-color: #141414;">
    <div class="container">
        <h2 class="text-center text-white mb-5">OUR FEATURE ROOMS</h2>

        <div class="row g-4 justify-content-center">

            @forelse($rooms as $room)
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="card border-0 shadow-lg hover-card position-relative">

                    {{-- Room Image --}}
                    <img src="{{ $room->image
                        ? asset('uploads/rooms/' . $room->image)
                        : asset('images/default-room.svg') }}"
                        class="card-img-top"
                        alt="{{ $room->name }}"
                        style="height:250px; object-fit:cover;">

                    {{-- Price Badge (ALWAYS SHOW) --}}
                    <span class="badge bg-danger position-absolute top-0 end-0 m-2 px-3 py-2">
                        Rs {{ number_format($room->price) }}
                    </span>

                    <div class="card-body">

                        {{-- Room Name --}}
                        <h5 class="card-title text-dark mb-1">
                            {{ $room->name }}
                        </h5>



                        <p class="card-text text-muted mb-3">
                            <strong>Rooms Available:</strong> {{ $room->rooms_available }}
                        </p>

                        <a href="#" class="btn btn-outline-danger w-100">
                            View Details
                        </a>
                    </div>
                </div>
            </div>
            @empty
                <p class="text-white text-center">No rooms available right now.</p>
            @endforelse

        </div>
    </div>
</div>

<style>
.hover-card {
    border-radius: 12px;
    overflow: hidden;
    transition: all 0.3s ease;
}

.hover-card:hover {
    transform: translateY(-6px);
}

.card-img-top {
    border-top-left-radius: 12px;
    border-top-right-radius: 12px;
}

.badge {
    font-size: 0.95rem;
    border-radius: 20px;
}
</style>
@endsection
