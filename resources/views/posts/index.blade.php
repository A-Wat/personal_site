<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $title }} | {{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- CSS -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    
        <!-- JS -->
        <script src="{{ asset('js/app.js') }}"></script>

    </head>
    <body id="blog_page">

        @include('inc.header')

        {{ Breadcrumbs::render('posts.index', $id, $title) }}

        <article>
            <section class="section_block">
                <div class="section_contents row">
                    <div class="col-12">
                        <div class="card p-5">
                            <div class="created_at"><i class="fas fa-flag"></i> {{ date('Y-m-d', strtotime($created_at)) }}</div>
                            <div class="blog-title">{{ $title }}</div>
                            <div class="blog-content">{!! $content !!}</div>
                        </div>
                    </div>
                </div>
            </section>
        </article>

        @include('inc.footer')

    </body>
</html>
