 
<header class="header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3 col-lg-2">
                @include('partials.logo')
            </div>
            <div class="col-xl-6 col-lg-7">
                @include('partials.menus.menu-center', [
                    'categories' => $categories,
                ])

            </div>
            <div class="col-lg-3">
                <div class="header__right">
                    @include('partials.menus.menu-right')
                </div>
            </div>
        </div>
        <div class="canvas__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header> 
