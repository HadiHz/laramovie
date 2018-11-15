<header>
    <!-- START TOP HEADER -->
    <div class="topheader w-100">
        <div class="container clearfix ">
            <div class="row">
                <div class="col-12 col-md-2 mt-2 pl-0">
                    <a href="#" class="navbar-brand float-right"><img class="logo mr-5" src="/img/film-png-7.png" alt="roocket"></a>
                </div>
                <div class="col-12 col-md-3 mt-4 text-center">
                    <span class="text-light">به فول فیلم خوش آمدید </span>
                    <h1 class="h1-title text-light">دانلود فیلم | دانلود سریال</h1>
                </div>
                <div class="col-12 col-md-7 mt-4 w-100">
                    <form class="form-inline my-2 my-lg-0 w-100 mr-5" action="{{ route('search') }}" method="get">
                        {{ csrf_field() }}
                        <input name="search" class="form-control mr-sm-2 w-75" type="search" placeholder="عبارت برای جستجو را وارد کنید" aria-label="Search">
                        <button class="btn btn-info my-2 my-sm-0" type="submit">جستجو</button>
                    </form>
                </div>



            </div>

        </div>

    </div>
    <!-- END TOP HEADER -->


    <!-- START TOP MENU -->
    <div class="topmenu pb-2 w-100">
        <div class="container topmenu-container clearfix">
            <div class="row float-right">
                <nav class="navbar navbar-dark navbar-expand-lg pt-0 pb-0">

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse float-left" id="navbar">
                        <ul class="navbar-nav">

                            <li class="nav-item"> <a class="nav-link active text-dark" href="teach-math.php"><span class="text-top-menu">دانلود فیلم ایرانی</span> </a></li>
                            <li class="nav-item"> <a class="nav-link active text-dark" href="teach-math.php"><span class="text-top-menu">دانلود فیلم ایرانی</span> </a></li>
                            <li class="nav-item"> <a class="nav-link active text-dark" href="teach-math.php"><span class="text-top-menu">دانلود فیلم ایرانی</span> </a></li>
                            <li class="nav-item"> <a class="nav-link active text-dark" href="teach-math.php"><span class="text-top-menu">دانلود فیلم خارجی</span> </a></li>
                            <li class="nav-item"> <a class="nav-link active text-dark" href="teach-math.php"><span class="text-top-menu">دانلود سریال ایرانی</span> </a></li>
                            <li class="nav-item"> <a class="nav-link active text-dark" href="teach-math.php"><span class="text-top-menu">دانلود سریال خارجی</span></a></li>
                            <li class="nav-item"> <a class="nav-link active text-dark" href="teach-math.php"><span class="text-top-menu">درباره ما</span></a></li>
                            <li class="nav-item"> <a class="nav-link active text-dark" href="teach-math.php"><span class="text-top-menu">تماس با ما</span></a></li>


                        </ul>
                    </div>


                </nav>

            </div>
        </div>
    </div>
    <!-- END TOP HEADER -->

</header>