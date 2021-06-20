<form class="row contact_form" method="POST" action="{{ url('/contact/conf') }}">
    {{ csrf_field() }}
    <div class="form_input_groups col-md-6">
        <div class="form-group">
            <label for="form-item-name">お名前</label>
            <input type="text" class="form-control" name="name" id="form-item-name" value="{{ old('name') }}" required>
        </div>

        <div class="form-group">
            <label for="form-item-email">メールアドレス</label>
            <input type="email" class="form-control" name="email" id="form-item-email" value="{{ old('email') }}" required>
        </div>

        <div class="form-group">
            <label for="form-item-inquiry">お問い合わせ内容</label>
            <textarea class="form-control" name="inquiry" id="form-item-inquiry" rows="5">{{ old('inquiry') }}</textarea>
        </div>
    </div>

    <div class="privacy_policy d-flex flex-column col-md-6">
        <div class="privacy_policy_text">
            @include('inc.policy')
        </div>
        <div class="consent_checkbox form-group form-check text-center">
            <input type="checkbox" class="form-check-input" id="form-item-check" required>
            <label class="form-check-label" for="form-item-check">プライバシーポリシーに同意する</label>
        </div>
    </div>

    <div class="col-12 text-center">
        <button type="submit" class="btn btn-primary submit_button btn-lg mt-3">入力内容の確認</button>                        
    </div>
</form>