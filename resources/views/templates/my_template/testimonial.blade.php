@include('templates.my_template.partials.header')
        <!-- BANNER-SECTION -->
        <div class="home-banner-section overflow-hidden">
            <div class="banner-container-box">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 mb-md-0 mb-4  text-center">
                            <div class="about-banner-text" data-aos="fade-up">
                                <h1 class="text-white about-h1" data-aos="zoom-out-left">Testimonials</h1>
                                <p class="text-white banner-paragraph" data-aos="zoom-out-right">Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusm tempor incididunt ut labore et dolore magna aliqua.</p>
                                <div class="about-btn">
                                    <a href="{{ url('/testimonial') }}" class="text-decoration-none">Home <span class="about-text-color"> / Testimonials</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Clients_section2 -->
    @include('templates.my_template.partials.clients-section2')
    <!-- Form-Section -->
    @include('templates.my_template.partials.form-section')
 @include('templates.my_template.partials.footer')

