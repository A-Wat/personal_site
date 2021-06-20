<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('inc.head', $heads)

    </head>
    <body id="contact_conf_page">
        @include('inc.header')

        {{ Breadcrumbs::render('contact.done') }}
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

        @include('inc.footer')

    </body>
</html>
