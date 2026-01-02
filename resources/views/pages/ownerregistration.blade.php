@extends('layout.master', ['noFooter' => true])
@section('monkey')

<div class="container my-5 d-flex justify-content-center">
    <div class="card shadow-lg p-4 rounded-4" style="max-width: 700px; width:100%;">

        <h3 class="text-center mb-4 fw-bold text-primary">Create a Profile as Owner</h3>

        <form action="{{ route('owner.save') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="registration_id" value="{{ $id }}">

            <div class="row g-3">



                {{-- Room Type --}}
                <div class="col-md-6">
                    <label class="form-label fw-semibold">
                        <i class="bi bi-building me-2 text-primary"></i>Room Type
                    </label>
                    <input type="text" class="form-control" name="room_type" placeholder="Single, Double, AC, Non-AC" required>
                </div>

                {{-- Rooms Available --}}
                <div class="col-md-6">
                    <label class="form-label fw-semibold">
                        <i class="bi bi-door-open-fill me-2 text-primary"></i>No of Rooms Available
                    </label>
                    <input type="number" class="form-control" name="rooms_available" placeholder="e.g. 4"required>
                </div>

                {{-- Multiple Images --}}
                <div class="col-12">
                    <label class="form-label fw-semibold">
                        <i class="bi bi-image-fill me-2 text-primary"></i>Upload Room Images (3–4 Images)
                    </label>

                    <input type="file"
                           name="merchant_images[]"
                           class="form-control"
                           multiple
                           id="imageInput">
                </div>

                {{-- Preview Container --}}
                <div class="col-12">
                    <div id="previewContainer" class="d-flex flex-wrap gap-2 mt-3"></div>
                </div>

                {{-- Submit --}}
                <div class="col-12 text-center mt-3">
                    <button type="submit" class="btn btn-primary px-5 py-2 rounded-pill">
                        <i class="bi bi-person-plus-fill me-2"></i>Submit
                    </button>
                </div>

            </div>
        </form>
    </div>
</div>

{{-- IMAGE PREVIEW SCRIPT --}}
<script>
document.getElementById("imageInput").addEventListener("change", function(event) {
    const files = event.target.files;
    const preview = document.getElementById("previewContainer");
    preview.innerHTML = "";

    Array.from(files).forEach(file => {
        const reader = new FileReader();
        reader.onload = function(e) {
            let img = document.createElement("img");
            img.src = e.target.result;
            img.style.width = "90px";
            img.style.height = "90px";
            img.style.objectFit = "cover";
            img.style.borderRadius = "10px";
            img.style.border = "2px solid #ddd";
            preview.appendChild(img);
        };
        reader.readAsDataURL(file);
    });
});
</script>

@endsection
