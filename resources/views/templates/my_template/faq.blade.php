@include('templates.my_template.partials.header')
        <!-- BANNER-SECTION -->
        <div class="home-banner-section overflow-hidden">
            <div class="banner-container-box">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 mb-md-0 mb-4  text-center">
                            <div class="about-banner-text"  data-aos="fade-up">
                                <h1 class="text-white about-h1" data-aos="zoom-out-left">Загальні запити FAQ?</h1>
                                <div class="about-btn">
                                    <a href="{{ secure_url('/faq') }}" class="text-decoration-none">Home <span class="about-text-color"> / FAQ</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Faq-Section -->
    @include('templates.my_template.partials.faq-section')
        <!-- Form-Section -->
        {{-- @include('templates.my_template.partials.form-section') --}}
      @include('templates.my_template.partials.footer')
