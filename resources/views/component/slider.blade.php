<style>
    .carousel-caption {
        left: 5%;
        right: auto;
        text-align: left;
        transform: none;
    }

    .room-carousel-image {
        height: clamp(360px, 70vh, 643px);
        object-fit: cover;
    }
</style>



<div class="container-fluid px-0">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2500">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            {{-- first slide --}}
            <div class="carousel-item active">

                <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c" class="d-block w-100 room-carousel-image"
                    alt="luxury room">


                <div class="carousel-caption d-none d-md-block">
                    <h1 style="font-weight: 800">Explore The Room<a href="{{ route('service.rooms') }}"
                            style="text-decoration:none; color:white;">
                            <i class="bi bi-arrow-right ms-2" style="font-size:2rem;"></i>
                        </a></h1>
                    <h5>Luxury Bedroom Design</h5>
                    <p>cozy and stylish space designed for comfort and relaxation.</p>
                </div>
            </div>
            {{-- second slide --}}
            <div class="carousel-item">
                <img src="https://images.unsplash.com/photo-1615874959474-d609969a20ed" class="d-block w-100 room-carousel-image"
                    alt="modern room">
                <div class="carousel-caption d-none d-md-block">
                    <h1 style="font-weight: 800">Explore The Room<a href="{{ route('service.rooms') }}"
                            style="text-decoration:none; color:white;">
                            <i class="bi bi-arrow-right ms-2" style="font-size:2rem;"></i>
                        </a></h1>
                    <h5>Elegant Modern Living Room</h5>
                    <p>Experience the perfect blend of modern elegance and warm comfort.</p>
                </div>
            </div>
            {{-- third slide --}}
            <div class="carousel-item">

                <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c" class="d-block w-100 room-carousel-image"
                    alt="luxury room">
                <div class="carousel-caption d-none d-md-block">
                    <h1 style="font-weight: 800">Explore The Room<a href="{{ route('service.rooms') }}"
                            style="text-decoration:none; color:white;">
                            <i class="bi bi-arrow-right ms-2" style="font-size:2rem;"></i>
                        </a></h1>
                    <h5>Third slide label</h5>
                    <p>Some representative placeholder content for the third slide.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

</div>
