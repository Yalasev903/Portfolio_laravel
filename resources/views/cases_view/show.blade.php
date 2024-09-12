<!-- resources/views/cases_view/show.blade.php -->
@include('templates.my_template.partials.header')

<!-- BANNER-SECTION -->
<div class="home-banner-section overflow-hidden">
    <div class="banner-container-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 mb-md-0 mb-4 text-center">
                    <div class="about-banner-text" data-aos="fade-up">
                        <h1 class="text-white about-h1" data-aos="zoom-out-left">{{ $post->title }}</h1>
                        <div class="about-btn">
                            <a href="{{ url('/cases_view') }}" class="text-decoration-none">Кейси / {{ $post->title }}</a>
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
                <div class="post-item">
                    <div class="post-item-wrap">
                        <div class="post-image">
                            <img src="..\{{ $post->img }}" alt="{{ $post->title }}" style="width: 100%;" />
                        </div>
                        <div class="post-item-description">
                            <h2 class="mb-0 text-white">{{ $post->title }}</h2>
                            <br>
                            <p class="text-white">{{ Str::limit(html_entity_decode(strip_tags($post->text)), 150000) }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('templates.my_template.partials.footer')
