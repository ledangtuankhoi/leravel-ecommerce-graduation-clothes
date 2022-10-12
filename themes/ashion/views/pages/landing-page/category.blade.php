@php
 $categories = App\Http\Controllers\BlockPageController::BlockCategory(); 
// error_log($cates);
@endphp 

@if ($categories)
    
 <section class="categories">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 p-0">
                <div class="categories__item categories__large__item set-bg"
                    data-setbg="{{ productImage($categories[0]['image']) }}">
                    <div class="categories__text">
                        <h1>{{ $categories[0]['name'] }}</h1>
                        <p>{{$categories[0]['description']}}</p>
                        <a href="{{ route('shop.index', ['c' => $categories[0]['slug']]) }}">Shop now</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row"> 
                    @for($i = 1; $i < count($categories); $i++) 
                        
                    <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                        <div class="categories__item set-bg"
                            data-setbg="{{ productImage($categories[$i]['image']) }}">
                            <div class="categories__text">
                                <h4>{{ $categories[$i]['name'] }}</h4>
                                <p>{{ $categories[$i]['product_count'] }} items</p>
                                <a href="{{ route('shop.index', ['c' => $categories[$i]['slug']]) }}">Shop now</a>
                            </div>
                        </div>
                    </div> 
                    @endfor

                </div>
            </div>
        </div>
    </div>
</section>
@endif
