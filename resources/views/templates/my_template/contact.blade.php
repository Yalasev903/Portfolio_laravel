@include('templates.my_template.partials.header')
<!-- BANNER-SECTION -->
<div class="home-banner-section overflow-hidden">
    <div class="banner-container-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 mb-md-0 mb-4 text-center">
                    <div class="about-banner-text" data-aos="fade-up">
                        <h1 class="text-white about-h1" data-aos="zoom-out-left">Зв'язок зі мною</h1>
                        <p class="text-white banner-paragraph" data-aos="zoom-out-right">Я надаю високоякісні послуги в області веб-розробки та дизайну...</p>
                        <div class="about-btn">
                            <a href="{{ secure_url('/contact') }}" class="text-decoration-none">Головна <span class="about-text-color"> / Контакти</span></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- CONTACT-CARD-SECTION -->
            @include('templates.my_template.partials.contact-card-section')


        </div>
    </div>
</div>
@include('templates.my_template.partials.footer')

<div id="message"></div>
<!-- Добавим обработку формы через JavaScript -->
<script>
document.getElementById('contactForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Предотвратить обычную отправку формы

    var formData = new FormData(this);

    fetch('/contact-form', {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => response.json())
    .then(data => {
        // Обработка успешного ответа
        if (data.status === 'Success') {
            document.getElementById('formResult').innerHTML = `<p>${data.msg}</p>`;
            document.getElementById('contactForm').reset(); // Очистить форму
        } else {
            // Обработка ошибок
            document.getElementById('formResult').innerHTML = `<p>Сталася помилка під час надсилання повідомлення.</p>`;
        }
    })
    .catch(error => {
        console.error('Ошибка:', error);
        document.getElementById('formResult').innerHTML = `<p>Сталася помилка під час надсилання повідомлення.</p>`;
    });
});

</script>
