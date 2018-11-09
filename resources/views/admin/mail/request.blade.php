@component('mail::message')

    سلام {{ $name }}
    <br>
    <p>
        درخواست شما مورد بررسی قرار گرفت.<br> به زودی درخواست شما انجام خواهد شد.
    </p>


@component('mail::button', ['url' => 'http://roocket.ir'])
ورود به سایت
@endcomponent

با تشکر<br>
{{ config('app.name') }}
@endcomponent
