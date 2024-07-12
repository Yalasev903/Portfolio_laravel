@include('templates.my_template.partials.header')
      <!-- BANNER-SECTION -->
      <div class="home-banner-section overflow-hidden">
          <div class="banner-container-box">
              <div class="container">
                  <div class="row">
                      <div class="col-lg-12 col-md-12 col-sm-12 mb-md-0 mb-4  text-center">
                          <div class="about-banner-text" data-aos="fade-up">
                              <h1 class="text-white about-h1" data-aos="zoom-out-left">Blog - Single Post</h1>
                              <p class="text-white banner-paragraph" data-aos="zoom-out-right"> Excepteur sint occaecat cupidatat non proident
                                sunt in culra aui officia aeserunt.</p>
                              <div class="about-btn">
                                  <a href="{{ url('/single-post') }}" class="text-decoration-none">Blog <span class="about-text-color"> / Single Post</span></a>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- header and banner section -->
  <section class="blog-posts padding-top padding-bottom overflow single-post-blog overflow-hidden">
    <div class="container">
      <div class="row">
        <div class="col-xl-12 col-lg-12">
          <div id="blog" class="single-post01 wow slideInLeft" data-aos="fade-up">
            <div class="post-item">
              <div class="post-item-wrap">
                <div class="post-image">
                  <a href="#">
                    <img alt="" src="{{ asset('templates/my_template/assets/images/post-featured-img1.jpg') }}" style="width: 100%;" />
                  </a>
                </div>
                <div class="post-item-description">
                  <h2 class="mb-0 text-white">Standard post with a single image</h2>
                  <div class="post-meta">
                    <span class="post-meta-date color01"> Jan 21, 2017 </span>
                    <span class="post-meta-comments color01"><a href=""><span></span>33 Comments</a></span>
                  </div>
                  <p  class="text-white">
                    Curabitur pulvinar euismod ante, ac sagittis ante posuere
                    ac. Vivamus luctus commodo dolor porta feugiat. Fusce at
                    velit id ligula pharetra laoreet. Ut nec metus a mi
                    ullamcorper hendrerit. Nulla facilisi. Pellentesque sed
                    nibh a quam accumsan dignissim quis quis urna. The most
                    happiest time of the day!. Praesent id dolor dui, dapibus
                    gravida elit. Donec consequat laoreet sagittis.
                    Suspendisse ultricies ultrices viverra. Morbi rhoncus
                    laoreet tincidunt. Mauris interdum convallis metus.M
                  </p>
                  <div class="blockquote text-white">
                    <p>
                      The world is a dangerous place to live; not because of
                      the people who are evil, but because of the people who
                      don't do anything about it.
                    </p>
                    <small>by <cite>Albert Einstein</cite></small>
                  </div>
                  <p class="text-white">
                    The most happiest time of the day!. Praesent id dolor dui,
                    dapibus gravida elit. Donec consequat laoreet sagittis.
                    Suspendisse ultricies ultrices viverra. Morbi rhoncus
                    laoreet tincidunt. Mauris interdum convallis metus.
                    Suspendisse vel lacus est, sit amet tincidunt erat. Etiam
                    purus sem, euismod eu vulputate eget, porta quis sapien.
                    Donec tellus est, rhoncus vel scelerisque id, iaculis eu
                    nibh.
                  </p>
                  <p class="text-white">
                    Donec posuere bibendum metus. Quisque gravida luctus
                    volutpat. Mauris interdum, lectus in dapibus molestie,
                    quam felis sollicitudin mauris, sit amet tempus velit
                    lectus nec lorem. Nullam vel mollis neque. The most
                    happiest time of the day!. Nullam vel enim dui. Cum sociis
                    natoque penatibus et magnis dis parturient montes,
                    nascetur ridiculus mus. Sed tincidunt accumsan massa id
                    viverra. Sed sagittis, nisl sit amet imperdiet convallis,
                    nunc tortor consequat tellus, vel molestie neque nulla non
                    ligula. Proin tincidunt tellus ac porta volutpat. Cras
                    mattis congue lacus id bibendum. Mauris ut sodales libero.
                    Maecenas feugiat sit amet enim in accumsan.
                  </p>
                  <p class="text-white">
                    Duis vestibulum quis quam vel accumsan. Nunc a vulputate
                    lectus. Vestibulum eleifend nisl sed massa sagittis
                    vestibulum. Vestibulum pretium blandit tellus, sodales
                    volutpat sapien varius vel. Phasellus tristique cursus
                    erat, a placerat tellus laoreet eget. Fusce vitae dui sit
                    amet lacus rutrum convallis. Vivamus sit amet lectus
                    venenatis est rhoncus interdum a vitae velit.
                  </p>
                </div>
        <!--row-->
      </div>
    </div>
    <!--container-->
  </section>
@include('templates.my_template.partials.footer')
