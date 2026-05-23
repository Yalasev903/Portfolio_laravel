@include('templates.my_template.partials.header')
        <!-- BANNER-SECTION -->
        <div class="home-banner-section overflow-hidden">
            <div class="banner-container-box">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 mb-md-0 mb-4  text-center">
                            <div class="about-banner-text" data-aos="fade-up">
                                <h1 class="text-white about-h1">Про мене</h1>
                                <p class="text-white banner-paragraph">Ми прагнемо досконалості та професіоналізму.</p>
                                <div class="about-btn">
                                    <a href="{{ url('/about-us') }}" class="text-decoration-none">Home <span class="about-text-color"> / About</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CYBER-SECURITY-SECTION -->
    @include('templates.my_template.partials.cyber-security-section')
    <!-- boxes-section -->
    @include('templates.my_template.partials.boxes-section')
    <!-- Clients_section -->
    {{-- @include('templates.my_template.partials.clients_section') --}}
<!-- ABOUT-TEAM-SECTION -->
    @include('templates.my_template.partials.about-team-section')
    <!-- Form-Section -->
    {{-- @include('templates.my_template.partials.form-section') --}}
 @include('templates.my_template.partials.footer')
