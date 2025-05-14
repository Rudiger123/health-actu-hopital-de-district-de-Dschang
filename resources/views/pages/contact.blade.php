@extends('layouts.app')

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/css/blog.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main-1.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('assets/js/main-1.js') }}"></script>
@endpush


@section('content')
    @php
        $image1 = 'assets/images/carousels/contact-1.jpg';
        $titel1 = 'Hôpital Régional Annexe de Dschang';
        $text1 =
            "Établissement de santé de référence dans la région de l'Ouest Cameroun, offrant des soins de qualité depuis 1985.";
        $image2 = 'assets/images/carousels/contact-1.jpg';
        $titel2 = 'Nos Services Médicaux';
        $text2 =
            'Nous proposons une gamme complète de services médicaux avec un personnel qualifié et des équipements modernes.';
        $image3 = 'assets/images/carousels/contact-1.jpg';
        $titel3 = 'Équipe Médicale Qualifiée';
        $text3 =
            'Notre équipe de professionnels de santé dévoués est à votre service 24h/24 pour des soins personnalisés.';
    @endphp

    {{-- hero section  --}}
    <x-layouts.hero :image1="$image1" :image2="$image2" :image3="$image3" :text1="$text1" :text2="$text2"
        :text3="$text3" :titel1="$titel1" :titel2="$titel2" :titel3="$titel3"></x-layouts.hero>
    {{-- end hero section --}}


    <div class="page-title"
        style="padding: 80px 80px 0 80px;
        background: color-mix(in srgb, #ffffff, transparent 70%);
        border-radius: 15px;">
        <div class="title-wrapper">
            <h1>Contact</h1>
            <p>Pour toute demande d'information ou prise de rendez-vous, notre équipe est à votre disposition.
            </p>
        </div>


        <div class="mb-5" data-aos="fade-up" data-aos-delay="200">
            <iframe style="border:0; width: 100%; height: 370px;"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3980.821234043066!2d10.054215614757986!3d5.443834996073619!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x105f8f5b6d8e6d3b%3A0x8e6f7f8e6f7f8e6f!2sH%C3%B4pital%20R%C3%A9gional%20Annexe%20de%20Dschang!5e0!3m2!1sfr!2scm!4v1676961268712!5m2!1sfr!2scm"
                frameborder="0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div><!-- End Google Maps -->

    </div>

    <!-- Contact Section -->
    <section id="contact" class="contact section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4 mb-5">
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="info-card">
                        <div class="icon-box">
                            <i class="bi bi-geo-alt"></i>
                        </div>
                        <h3>Adresse</h3>
                        <p>Quartier Nzometeu, Dschang<br>Région de l'Ouest, Cameroun</p>
                    </div>
                </div>

                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="info-card">
                        <div class="icon-box">
                            <i class="bi bi-telephone"></i>
                        </div>
                        <h3>Contacts</h3>
                        <p>Tél: (+237) 233 45 67 89<br>
                            Urgences: (+237) 677 89 45 23<br>
                            Email: contact@hradschang.cm</p>
                    </div>
                </div>

                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="info-card">
                        <div class="icon-box">
                            <i class="bi bi-clock"></i>
                        </div>
                        <h3>Heures d'Ouverture</h3>
                        <p>Lundi - Vendredi: 7h30 - 16h30<br>
                            Samedi: 8h00 - 13h00<br>
                            Urgences: 24h/24</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="form-wrapper" data-aos="fade-up" data-aos-delay="400">
                        @livewire('blog.contactForm')
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /Contact Section -->

    @livewire('blog.newsletter-form')

@endsection
