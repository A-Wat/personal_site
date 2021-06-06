<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('inc.head', $heads)

        <!-- ページ個別の読み込みソースは以下に記述 -->
    </head>
    <body id="blog_page">

        @include('inc.header')

        {{ Breadcrumbs::render('posts.list') }}

        <article>
            <section class="section_block">
                <div class="section_contents row">
                @forelse($posts as $post)
                    <div class="col-lg-4 col-md-6 mb-2">
                        <div class="card">
                            <a href="{{ url('/posts/'. $post->id) }}">
                                <div class="card-body">
                                    <div>{{ $post->title }}</div>
                                    <div class=""><i class="fas fa-flag"></i> {{ date('Y-m-d', strtotime($post->updated_at)) }}</div>
                                </div>
                            </a>
                        </div>
                    </div>
                @empty
                    <p>記事が見つかりませんでした。</p>
                @endforelse

                    <div class="col-12 d-flex justify-content-center">
                        {{ $posts->links() }}
                    </div>
                </div>

            </section>
        </article>

        @include('inc.footer')

    </body>
</html>
