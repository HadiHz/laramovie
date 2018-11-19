@component('mail::message')

    سلام {{ $name }}
    <br>
    <p>
        به زودی فیلم یا سریال مورد نظر شما را در وب سایت قرار خواهیم داد
    </p>


@component('mail::button', ['url' => 'http://www.fullfilm2.com'])
ورود به سایت
@endcomponent

با تشکر<br>
{{ config('app.name') }}
@endcomponent
