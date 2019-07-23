<div class="input-recaptcha">
    <div class="g-recaptcha"
        data-sitekey="{{ config('recaptcha.key') }}"
        data-size="{{ $size ?? 'normal' }}"
        data-theme="{{ $theme ?? 'light' }}"
        data-tabindex="{{ $tabindex ?? '0' }}"
        data-callback="{{ $callback ?? '' }}"
        ></div>
</div>
<script src='https://www.google.com/recaptcha/api.js'></script>
