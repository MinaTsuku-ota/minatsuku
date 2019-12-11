<script src="https://www.google.com/recaptcha/api.js?render={{ config('app.captcha_sitekey') }}"></script>
<script>
    grecaptcha.ready(function () {
        grecaptcha.execute('{{ config('app.captcha_sitekey') }}', { action: 'localhost' }).then(function (token) {
            if (token) {
                document.getElementById('recaptcha').value = token;
            }
        });
    });
</script>
