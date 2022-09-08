<nav class="header__menu">
    <ul>
        <li class="active"><a href="./index.html">Home</a></li>
 
        @php
            $bestSallerCategory = App\Http\Controllers\MenuController::CategoryByBestSeller();
        @endphp
        @if (gettype($bestSallerCategory) === 'array' && !empty($bestSallerCategory))
        @foreach ($bestSallerCategory as $category) 
            <li class="{{ setActiveCategory($category->slug) }}"><a
                href="{{ route('shop.index', ['category' => $category->slug]) }}">{{ $category->name }}</a></li> 
            @endforeach
        @endif
        <li><a href="./blog.html">Blog</a></li>
        <li><a href="./contact.html">Contact</a></li>
    </ul>
</nav>
