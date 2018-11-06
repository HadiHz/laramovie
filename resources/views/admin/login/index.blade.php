
<h1>سلام دنیا</h1>



<form class="login100-form validate-form" method="post" action="{{ route('authenticate') }}">
					<span class="login100-form-title">
						ورود به پنل مدیریت سایت نیما وب
					</span>
    {!! csrf_field() !!}

    <div class="wrap-input100 validate-input" data-validate = "لطفا یک ایمیل معتبر وارد کنید">
        <input class="input100" type="text" name="email" id="email" placeholder="ایمیل">
    </div>

    <div class="wrap-input100 validate-input" data-validate = "لطفا پسورد درست را وارد کنید">
        <input class="input100" type="password" name="password" id="password" placeholder="رمز عبور">
    </div>

    <div class="container-login100-form-btn">
        <button type="submit" class="login100-form-btn">
            ورود
        </button>
    </div>

</form>

@include('partials.errors')


