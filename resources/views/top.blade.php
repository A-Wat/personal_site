<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('inc.head', $heads)

        <!-- Styles -->
        <style>
            .welcomeboard {
                position:fixed;
                left:0;
                top:0;
                z-index:9999;
                width:100%;
                height:100%;
                background:#f8fafc;
                display:none;
            }
        </style>
    </head>
    <body id="top_page">
        <!-- 最初に読み込まれる -->
        <section class="flex-center position-ref full-width full-height welcomeboard">
            <div class="content">
                <div class="title m-b-md">
                    Welcome To My Site.
                </div>
            </div>
        </section>

        @include('inc.header')

        <article>
            <!-- About me -->
            <section id="about_me" class="section_block">
                <div class="section_title inview_target">
                    <div class="en">About me</div>
                </div>

                <div class="section_contents d-flex flex-wrap justify-content-between row">
                    <figure class="illust_me col-md-4">
                        <img src="{{ asset('images/sp_like_illust.png') }}" />
                    </figure>

                    <div class="profile col-md-8">
                        <ul class="list-group">
                            <li class="list-group-item d-flex">
                                <span class="item-title">名前</span>
                                <span class="item-body">わたなべ　あきひろ</span>    
                            </li>
                            <li class="list-group-item d-flex">
                                <span class="item-title">出身地</span>
                                <span class="item-body">北海道</span>
                            </li>
                            <li class="list-group-item d-flex">
                                <span class="item-title">血液型</span>
                                <span class="item-body">A型</span>
                            </li>
                            <li class="list-group-item d-flex">
                                <span class="item-title">ペット</span>
                                <span class="item-body">うさぎ（うーちゃん）</span>
                            </li>
                            <li class="list-group-item d-flex align-items-center">
                                <span class="item-title">SNS</span>
                                <span class="item-body">
                                    <a href="https://twitter.com/Akkman5" class="d-inline-flex align-items-center" target="_blank"><i class="fab fa-twitter-square mr-1 sns_icon"></i> @Akkman5</a>
                                </span>
                            </li>
                            <li class="list-group-item d-flex">
                                <span class="item-title">自己紹介</span>
                                <span class="item-body">フリーランスWEBエンジニアをやってます！フットワークの軽さを売りに、誰とでも快く一緒に仕事ができるよう心がけています！<br>
                                WEBサービスやWEBサイトの企画から開発までオールラウンドに対応します。ベストなWEB開発ができるようPHP系統技術とJavascript系統技術を追い求めていきます！</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </section>

            <!-- Blog -->
            <section id="blog" class="section_block">
                <div class="section_title inview_target">
                    <div class="en">Blog</div>
                </div>

                <div class="section_contents row">
                @foreach($posts as $post)
                    <div class="col-lg-4 col-md-6 mb-3">
                        <div class="card">
                            <a href="{{ url('/posts/' . $post->id) }}">
                                <img class="card-img-top\" src="{{ asset($post->eyecatch) }}" alt="{{ $post->title }} サムネイル" onerror="src='https://pro-foto.jp/img/f_25_topimg.jpg'">
                                <div class="card-body">
                                    <div>{{ date('Y-m-d', strtotime($post->updated_at)) }}</div>
                                    <div class="card-title">タイトル：{{ $post->title }}</div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach

                @if(count($posts) >= 1)
                    <div class="more_link mt-3 col-12 text-right">
                      <a href="{{ url('/posts/list/') }}">More</a>
                    </div>
                @endif
                </div>
            </section>

            <!-- Works -->
            <section id="works" class="section_block">
                <div class="section_title inview_target">
                    <div class="en">Works</div>
                </div>

                <div class="section_contents row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center pt-3 pb-3">
                                    ちょっと今準備中です！
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Contact -->
            <section id="contact" class="section_block">
                <div class="section_title inview_target">
                    <div class="en">Contact</div>
                </div>

                <div class="section_contents">
                    @include('inc.contact_form')
                </div>
            </section>
        </article>

        @include('inc.footer')

    </body>

    <script type="module">
        // welcomeboardをフェードアウトする
        let fadeOutWelcomeBoard = function(){
            setTimeout(function(){
                $('.welcomeboard').fadeOut('slow');
            }, 1000);
        }

        fadeOutWelcomeBoard();
    </script>
</html>