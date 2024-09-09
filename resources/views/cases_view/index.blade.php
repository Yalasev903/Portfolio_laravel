@include('templates.my_template.partials.header')

<!-- BANNER-SECTION -->
<div class="home-banner-section overflow-hidden">
    <div class="banner-container-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 mb-md-0 mb-4 text-center">
                    <div class="about-banner-text" data-aos="fade-up">
                        <h1 class="text-white about-h1" data-aos="zoom-out-left">Мої кейси</h1>
                        <div class="about-btn">
                            <a href="{{ url('/cases_view') }}" class="text-decoration-none">Кейси/</a>
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
            @foreach($posts as $post)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="post-item">
                    <img src="{{ $post->img }}" alt="{{ $post->title }}" class="img-fluid">
                    <h3>{{ $post->title }}</h3>
                    <p class="text-white">{{ Str::limit(strip_tags($post->text), 150) }}</p>
                    <a href="{{ route('cases_view.show', $post->id) }}" class="btn btn-primary">Читати далі</a>
                </div>
            </div>
        @endforeach
        </div>
    </div>
</section>

@include('templates.my_template.partials.footer')
