@extends('layout.master', ['noFooter' => true])
@section('monkey')

<div class="container my-5 d-flex justify-content-center">
    <div class="card shadow-lg p-4 rounded-4" style="max-width: 700px; width:100%;">

        <h3 class="text-center mb-4 fw-bold text-success">Create a Profile as Tenant</h3>

        <form action="" method="POST">
            @csrf

            <div class="row g-3">

                {{-- Name --}}
                <div class="col-md-6">
                    <label class="form-label fw-semibold">
                        <i class="bi bi-person-fill me-2 text-success"></i>Name
                    </label>
                    <input type="text" class="form-control" name="tenant_name" placeholder="Enter your name">
                </div>

                {{-- Email --}}
                <div class="col-md-6">
                    <label class="form-label fw-semibold">
                        <i class="bi bi-envelope-fill me-2 text-success"></i>Email Address
                    </label>
                    <input type="email" class="form-control" name="tenant_email" placeholder="Enter your email">
                </div>

                {{-- Phone Number --}}
                <div class="col-md-6">
                    <label class="form-label fw-semibold">
                        <i class="bi bi-telephone-fill me-2 text-success"></i>Phone Number
                    </label>
                    <input type="text" class="form-control" name="tenant_phone" placeholder="98XXXXXXXX">
                </div>

                {{-- Preferred Location --}}
                <div class="col-md-6">
                    <label class="form-label fw-semibold">
                        <i class="bi bi-geo-alt-fill me-2 text-success"></i>Preferred Location
                    </label>
                    <input type="text" class="form-control" name="tenant_location" placeholder="Enter location you prefer">
                </div>

                {{-- Preferred Room Type --}}
                <div class="col-md-6">
                    <label class="form-label fw-semibold">
                        <i class="bi bi-building me-2 text-success"></i>Preferred Room Type
                    </label>
                    <select class="form-control" name="tenant_roomtype">
                        <option value="">Select Room Type</option>
                        <option value="Single">Single</option>
                        <option value="Double">Double</option>
                        <option value="AC">AC</option>
                        <option value="Non-AC">Non-AC</option>
                    </select>
                </div>

                {{-- Move-in Date --}}
                <div class="col-md-6">
                    <label class="form-label fw-semibold">
                        <i class="bi bi-calendar-fill me-2 text-success"></i>Preferred Move-in Date
                    </label>
                    <input type="date" class="form-control" name="move_in_date">
                </div>

                {{-- Submit --}}
                <div class="col-12 text-center mt-3">
                    <button type="submit" class="btn btn-success px-5 py-2 rounded-pill">
                        <i class="bi bi-person-plus-fill me-2"></i>Submit
                    </button>
                </div>

            </div>
        </form>
    </div>
</div>

@endsection
