<div class="py-5 bg-light" data-aos="fade-up" data-aos-delay="100">
    <div class="container text-center">
        <h2 class="mb-3 fw-bold">{{ __('certifications.title') }}</h2>
        <p class="mb-5 text-muted">
            {{ __('certifications.description') }}
        </p>

        @php
            $certifications = [
                [
                    'image' => 'assets/images/certifications/1.jpg',
                    'title' => __('certifications.certifications.excellence'),
                ],
                [
                    'image' => 'assets/images/certifications/5.jpg',
                    'title' => __('certifications.certifications.cleanest'),
                ],
                [
                    'image' => 'assets/images/certifications/3.jpg',
                    'title' => __('certifications.certifications.hiv_project'),
                ],
               
            ];
        @endphp

        <div class="row g-4 justify-content-center">
            @foreach ($certifications as $certification)
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card border-0 shadow-sm h-100 hover-zoom">
                        <img src="{{ $certification['image'] }}" class="card-img-top img-fluid rounded"
                            alt="{{ $certification['title'] }}">
                        <div class="card-body p-2 text-center">
                            <small class="text-muted">{{ $certification['title'] }}</small>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<style>
    .hover-zoom img {
        transition: transform 0.4s ease-in-out;
    }

    .hover-zoom:hover img {
        transform: scale(1.05);
    }
</style>
