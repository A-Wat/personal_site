<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('inc.head', $heads)
    </head>
    <body id="blog_page">

        @include('inc.header')

        {{ Breadcrumbs::render('posts.index', $id, $title) }}

        <article>
            <section class="section_block">
                <div class="section_contents row">
                    <div class="col-12">
                        <div class="card p-4 p-md-5">
                            <div class="created_at"><i class="fas fa-flag"></i> {{ date('Y-m-d', strtotime($created_at)) }}</div>
                            <div class="blog-title">{{ $title }}</div>
                            <div class="blog-content">{!! $content !!}</div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Contact -->
            <section class="section_block">
                <div class="section_title inview_target">
                    <div class="en">Contact</div>
                </div>

                <div class="section_contents">
                    <p>お仕事のご依頼、各種ご相談、その他すべてのお問い合わせにつきましては下記のフォームからご連絡ください。</p>

                    @include('inc.contact_form')
                </div>
            </section>
        </article>

        @include('inc.footer')

    </body>
</html>
