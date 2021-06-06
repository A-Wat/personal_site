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
                    <div class="en">Confirm</div>
                </div>

                <div class="section_contents">
                    <p>以下の内容でお問い合わせを送信します。よろしければ「この内容で送信」ボタンを押してください。</p>

                    <form method="POST" action="{{ url('/contact/done') }}">
                        {{ csrf_field() }}
                        <div class="form_input_groups">
                            <div class="form-group">
                                <label for="form-item-name">お名前</label>
                                <input type="text" class="form-control" name="name" id="form-item-name" value="{{ $name }}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="form-item-email">メールアドレス</label>
                                <input type="email" class="form-control" name="email" id="form-item-email" value="{{ $email }}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="form-item-inquiry">お問い合わせ内容</label>
                                <textarea class="form-control" id="form-item-inquiry" rows="5" readonly>{{ $inquiry }}</textarea>
                            </div>
                        </div>

                        <div class="form_button_group d-flex justify-content-between mt-4">
                            <a href="{{ url('/#contact') }}" class="btn btn-secondary back_button btn-lg">戻る</a>
                            <button class="btn btn-primary submit_button btn-lg">この内容で送信</button>
                        </div>
                    </form>
                </div>
            </section>
        </article>

        <footer>
            <small class="d-flex justify-content-center">Copyright&copy; All Right Reserved.</small>
        </footer>
    </body>
</html>
