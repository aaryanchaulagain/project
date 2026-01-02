@extends('layout.master', ['nonav' => true, 'noFooter' => true])

@section('monkey')
<div class="container py-5">
    <div class="card shadow-lg rounded-4 mx-auto" style="max-width: 700px;">
        <div class="card-header bg-danger text-white text-center rounded-top">
            <h3 class="mb-0">Upload Your Room</h3>
        </div>
        <div class="card-body p-4">
            <form action="{{ route('owner.room.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Room Name --}}
                <div class="mb-3">
                    <label class="form-label fw-bold">Room Name</label>
                    <input type="text" name="name" class="form-control form-control-lg" placeholder="Ex: Cozy Single Bed Room" required>
                </div>

                {{-- Room Type --}}
                <div class="mb-3">
                    <label class="form-label fw-bold">Room Type</label>
                    <input type="text" name="type" class="form-control form-control-lg" placeholder="Ex: Single, Double, Full" required>
                </div>

                {{-- Rooms Available --}}
                <div class="mb-3">
                    <label class="form-label fw-bold">Rooms Available</label>
                    <input type="number" name="rooms_available" class="form-control form-control-lg" placeholder="Ex: 3" required>
                </div>

                {{-- Price --}}
                <div class="mb-3">
                    <label class="form-label fw-bold">Price (Rs)</label>
                    <input type="number" name="price" class="form-control form-control-lg" placeholder="Ex: 12000" required>
                </div>

                {{-- Room Image --}}
                <div class="mb-4">
                    <label class="form-label fw-bold">Room Image</label>
                    <input type="file" name="image" class="form-control form-control-lg" accept="image/*">
                    <small class="text-muted">Upload one main image (JPG, PNG)</small>
                </div>

                {{-- Submit Button --}}
                <div class="d-grid">
                    <button type="submit" class="btn btn-danger btn-lg fw-bold">Upload Room</button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    body {
        background-color: #f8f9fa;
    }

    .card-header {
        font-family: 'Poppins', sans-serif;
        letter-spacing: 1px;
    }

    .form-control:focus {
        border-color: #dc3545;
        box-shadow: 0 0 0 0.2rem rgba(220,53,69,.25);
    }

    input[type="file"] {
        padding: 0.3rem;
    }
</style>
@endsection
