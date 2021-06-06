<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel2</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- CSS -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    
        <!-- JS -->
        <script src="{{ asset('js/app.js') }}"></script>

    </head>
    <body id="contact_conf_page">
        <article>
            <!-- Confirm -->
            <section class="section_block contact">
                <div class="section_title inview_target">
                    <div class="en">Contact Completed</div>
                </div>

                <div class="section_contents">
                    <p>お問い合わせありがとうございます。<br>
                    ご入力頂いたメールアドレス宛に内容確認メールをお送りしましたので、ご確認ください。</p>

                    <div class="button_group d-flex justify-content-center">
                        <a class="btn btn-primary btn_lg" href="{{ url('') }}">トップページに戻る</a>
                    </div>
                </div>
            </section>
        </article>

        <footer>
            <small class="d-flex justify-content-center">Copyright&copy; All Right Reserved.</small>
        </footer>
    </body>
</html>
