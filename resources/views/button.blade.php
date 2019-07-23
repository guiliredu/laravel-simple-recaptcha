<div class="input-recaptcha">
    <button
        class="g-recaptcha {{ $class ?? '' }}"
        data-sitekey="{{ config('recaptcha.key') }}"
        data-callback="{{ $callback ?? '' }}"
        >Submit</button>
</div>
<script src='https://www.google.com/recaptcha/api.js'></script>
