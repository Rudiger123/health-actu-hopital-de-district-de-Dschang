 <!-- Hero Section -->
 <section id="hero" class="hero section">
     <div id="hero-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

         <div class="carousel-item active">
             <img src="{{ $image1 }}" alt="">
             <div class="container">
                 <h2>{{ $titel1 }}</h2>
                 <p>{{ $text1 }}</p>
                 {{-- <a href="#about" class="btn-get-started">Read More</a> --}}
             </div>
         </div><!-- End Carousel Item -->

         <div class="carousel-item">
             <img src="{{ $image2 }}" alt="">
             <div class="container">
                 <h2>{{ $titel2 }}</h2>
                 <p>{{ $text2 }}</p>
                 {{-- <a href="#about" class="btn-get-started">Read More</a> --}}
             </div>
         </div><!-- End Carousel Item -->

         <div class="carousel-item">
             <img src="{{ $image3 }}" alt="">
             <div class="container">
                 <h2>{{ $titel3 }}</h2>
                 <p>{{ $text3 }}</p>
                 {{-- <a href="#about" class="btn-get-started">Read More</a> --}}
             </div>
         </div><!-- End Carousel Item -->

         <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
             <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
         </a>

         <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
             <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
         </a>

         <ol class="carousel-indicators"></ol>

     </div>

 </section><!-- /Hero Section -->
