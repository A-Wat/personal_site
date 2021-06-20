<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('inc.head', $heads)

    </head>
    <body id="contact_conf_page">
        @include('inc.header')

        {{ Breadcrumbs::render('contact.conf') }}

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
                                <textarea class="form-control" name="inquiry" id="form-item-inquiry" rows="5" readonly>{{ $inquiry }}</textarea>
                            </div>
                        </div>

                        <div class="form_button_group d-flex justify-content-between mt-4">
                            <button name="action" class="btn btn-secondary back_button btn-lg" value="back">戻る</a>
                            <button name="action" class="btn btn-primary submit_button btn-lg" value="submit">この内容で送信</button>
                        </div>

                        <input type="hidden" name="previous_url" value="{{ $previous_url }}">
                    </form>
                </div>
            </section>
        </article>

        @include('inc.footer')

    </body>
</html>
