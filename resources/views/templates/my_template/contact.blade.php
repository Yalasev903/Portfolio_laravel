@include('templates.my_template.partials.header')
        <!-- BANNER-SECTION -->
        <div class="home-banner-section overflow-hidden">
            <div class="banner-container-box">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 mb-md-0 mb-4  text-center">
                            <div class="about-banner-text" data-aos="fade-up">
                                <h1 class="text-white about-h1"  data-aos="zoom-out-left">Зв'язок зі мною</h1>
                                <p class="text-white banner-paragraph"  data-aos="zoom-out-right">Я надаю високоякісні послуги в області веб-розробки та дизайну. Готовий допомогти вам реалізувати ваші проекти та досягти ваших цілей. Зв’яжіться зі мною, щоб дізнатися більше!</p>
                                <div class="about-btn">
                                    <a href="{{ url('/contact') }}" class="text-decoration-none">Головна <span class="about-text-color"> /
                                            Контакти</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- CONTACT-CARD-SECTION -->
                    @include('templates.my_template.partials.contact-card-section')
                </div>
            </div>
        </div>
    </div>
<!-- MAP-Section -->
@include('templates.my_template.partials.map-section')
@include('templates.my_template.partials.footer')
