@php 

    $setting = \App\Models\SiteSetting::first();

@endphp

<footer id="footer" class="footer bg-light">
    <div class="container footer-top py-5">
        <div class="row gy-4">
            <div class="col-lg-4 col-md-6 footer-about">
                <a href="{{ url('/') }}" class="logo d-flex align-items-center">
                    <span class="sitename">{{ __('footer.sitename') }}</span>
                </a>
                <div class="footer-contact pt-3">
                    <p><i class="bi bi-geo-alt me-2"></i> {{ __('footer.address_line_1') }}</p>
                    <p><i class="bi bi-building me-2"></i> {{ __('footer.address_line_2') }}</p>
                    <p class="mt-3"><strong><i class="bi bi-telephone me-2"></i> {{ __('footer.phone_label') }}:</strong>
                        <span>{{ $setting->site_phone }}</span></p>
                    <p><strong><i class="bi bi-envelope me-2"></i> {{ __('footer.email_label') }}:</strong>
                        <span>{{ $setting->site_email }}</span></p>
                    <p><strong><i class="bi bi-clock me-2"></i> {{ __('footer.hours_label') }}:</strong>
                        <span>{{ __('footer.hours') }}</span></p>
                </div>
                <div class="social-links d-flex mt-4">
                    <a href="#"><i class="bi bi-facebook"></i></a>
                    <a href="#"><i class="bi bi-twitter-x"></i></a>
                    <a href="#"><i class="bi bi-whatsapp"></i></a>
                    <a href="#"><i class="bi bi-youtube"></i></a>
                </div>
            </div>

            <div class="col-lg-2 col-md-3 footer-links">
                <h4>{{ __('footer.quick_access') }}</h4>
                <ul>
                    <li><a href="#">{{ __('footer.quick_links.home') }}</a></li>
                    <li><a href="#">{{ __('footer.quick_links.medical_services') }}</a></li>
                    <li><a href="#">{{ __('footer.quick_links.doctors') }}</a></li>
                    <li><a href="#">{{ __('footer.quick_links.emergency') }}</a></li>
                    <li><a href="#">{{ __('footer.quick_links.appointments') }}</a></li>
                </ul>
            </div>

            <div class="col-lg-2 col-md-3 footer-links">
                <h4>{{ __('footer.our_services') }}</h4>
                <ul>
                    <li><a href="#">{{ __('footer.services_list.general_consultation') }}</a></li>
                    <li><a href="#">{{ __('footer.services_list.pediatrics') }}</a></li>
                    <li><a href="#">{{ __('footer.services_list.surgery') }}</a></li>
                    <li><a href="#">{{ __('footer.services_list.medical_imaging') }}</a></li>
                    <li><a href="#">{{ __('footer.services_list.laboratory') }}</a></li>
                </ul>
            </div>

            <div class="col-lg-2 col-md-3 footer-links">
                <h4>{{ __('footer.information') }}</h4>
                <ul>
                    <li><a href="#">{{ __('footer.info_links.news') }}</a></li>
                    <li><a href="#">{{ __('footer.info_links.careers') }}</a></li>
                    <li><a href="#">{{ __('footer.info_links.partnerships') }}</a></li>
                    <li><a href="#">{{ __('footer.info_links.downloads') }}</a></li>
                    <li><a href="#">{{ __('footer.info_links.faq') }}</a></li>
                </ul>
            </div>

            <div class="col-lg-2 col-md-3 footer-links">
                <h4>{{ __('footer.resources') }}</h4>
                <ul>
                    <li><a href="#">{{ __('footer.resources_links.health_tips') }}</a></li>
                    <li><a href="#">{{ __('footer.resources_links.prevention') }}</a></li>
                    <li><a href="#">{{ __('footer.resources_links.medications') }}</a></li>
                    <li><a href="#">{{ __('footer.resources_links.insurance') }}</a></li>
                    <li><a href="#">{{ __('footer.resources_links.admin_contact') }}</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container copyright text-center mt-4 py-3">
        <p class="mb-2">© <span>Copyright</span> <strong
                class="px-1 sitename">{{ __('footer.sitename') }}</strong> <span>{{ __('footer.copyright') }}</span></p>
        <div class="credits">
            <div class="mb-2">
                <a href="#" class="me-2">{{ __('footer.privacy_policy') }}</a> |
                <a href="#" class="mx-2">{{ __('footer.terms_of_use') }}</a> |
                <a href="#" class="ms-2">{{ __('footer.site_map') }}</a>
            </div>
            <div>
                {{ __('footer.partner') }} <a href="https://minsante.cm/" target="_blank">{{ __('footer.partner_link') }}</a>
            </div>
        </div>
    </div>
</footer>
<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>
