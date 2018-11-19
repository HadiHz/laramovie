@component('mail::message')

    سلام {{ $name }}
    <br>
    <p>
        فیلم یا سریال مورد نظر شما در وب سایت ما موجود است.
    </p>


@component('mail::button', ['url' => 'http://roocket.ir'])
        ورود به سایت
@endcomponent

    با تشکر
    {{ config('app.name') }}
@endcomponent
