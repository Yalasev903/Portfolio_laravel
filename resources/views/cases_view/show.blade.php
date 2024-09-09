<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->title }}</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    @include('templates.my_template.partials.header')

    <div class="container">
        <h1>{{ $post->title }}</h1>
        <img src="{{ $post->img }}" alt="{{ $post->title }}" class="img-fluid">
        <p>{{ $post->text }}</p>
        <a href="{{ route('cases_view.index') }}" class="btn btn-primary">Назад до кейсів</a>
    </div>

    @include('templates.my_template.partials.footer')
</body>
</html>
