                    <!-- CONTACT-CARD-SECTION -->
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 mb-md-0 mb-4">
                            <div class="about-us-section-page contact-us-section" data-aos="fade-up">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <h3 class="contact-us-title" data-aos="fade-up-left">Залишайте свої повідомлення</h3>
                                        <p data-aos="fade-up-right">Я з вами зв'яжусь найближчим часом.</p>
                                        <ul class="list-unstyled about-us-list">
                                        <li class="contact-li"><div class="icons-rounded-box-contact">
                                        <figure class="mb-0"><img src="{{ asset('templates/my_template/assets/images/contact-icon1.png') }}"  alt=""></figure></div>
                                        <div class="contact-content">
                                                <span class="contact-title">Де я:</span>
                                                 <span class="contact-parah">91 проспект Ново-Баварський, 61020, Україна, місто Харків</span></div></li>

                                          <li class="contact-li"><div class="icons-rounded-box-contact">
                                            <figure class="mb-0"><img src="{{ asset('templates/my_template/assets/images/contact-icon2.png') }}" alt="">
                                            </figure>
                                        </div>
                                        <div class="contact-content">
                                            <span class="contact-title">Телефон:</span>
                                            <span class="contact-parah">+3 8050 849 96 39   </span>
                                        </div></li>
                                        <li class="contact-li"><div class="icons-rounded-box-contact">
                                            <figure class="mb-0"><img src="{{ asset('templates/my_template/assets/images/contact-icon3.png') }}" alt="">
                                            </figure>
                                        </div><div class="contact-content">
                                            <span class="contact-title">Email:</span>
                                            <span class="contact-parah">slasev903@gmail.com</span>
                                        </div></li>
                                        </ul>

                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="about-section-form">
                                            <form method="POST" action="{{ url('/contact-form') }}">
                                                @csrf
                                                <div class="form-group contact-form-margin">
                                                    <input type="text" class="form-control input-text"
                                                        id="validationCustom01" placeholder="Ім'я" required="" name="name">
                                                </div>
                                                <div class="form-group contact-form-margin">
                                                    <input type="text" class="form-control input-text"
                                                        id="validationCustom02" placeholder="Email" required="" name="email">
                                                </div>
                                                <div class="form-group contact-form-margin">
                                                    <input type="text" class="form-control input-text"
                                                        id="validationCustom03" placeholder="Тема" required="" name="subject">
                                                </div>
                                                <div class="form-group contact-form-margin-text-area">
                                                    <textarea name="comments" id="message" cols="10" rows="10" class="form-control" placeholder="Ваше повідомлення"></textarea>
                                                </div>
                                                <div class="contact-section-btn text-center">
                                                    <button type="submit" class="btn btn-primary hover-effect">Відправити повідомлення</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
