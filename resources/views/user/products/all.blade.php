<x-app-layout>
    <div class="content-head__container">
        <div class="content-head__title-wrap">
            <div class="content-head__title-wrap__title bcg-title">Последние товары</div>
        </div>
        <div class="content-head__search-block">
            <div class="search-container">
                <form class="search-container__form">
                    <input type="text" class="search-container__form__input">
                    <button class="search-container__form__btn">search</button>
                </form>
            </div>
        </div>
    </div>
    <div class="content-main__container">

        <div class="products-columns">


            @foreach($products as $product)
                <div class="products-columns__item">
                    <div class="products-columns__item__title-product">
                        <a href="{{route('products.one')}}?id={{$product->id}}"
                           class="products-columns__item__title-product__link">{{$product->name}}</a>
                    </div>
                    <div class="products-columns__item__thumbnail">
                        <a href="{{route('products.one')}}?id={{$product->id}}"
                           class="products-columns__item__thumbnail__link">
                            <img src="{{$product->getPathImg()}}" alt="Preview-image"
                                 class="products-columns__item__thumbnail__img"></a></div>
                    <div class="products-columns__item__description">
                        <span class="products-price">{{$product->price}} руб</span>
                        <a href="{{route('orders.add')}}?id={{$product->id}}" class="btn btn-blue">Купить</a>

                    </div>
                </div>
            @endforeach

        </div>
    </div>
    <div class="content-footer__container">

        @if($countPage > 1)
            <ul class="page-nav">
                <li class="page-nav__item"><a href="{{route('products.all')}}/?page=1" class="page-nav__item__link"><i
                            class="fa fa-angle-double-left"></i></a>
                </li>
                @foreach($pages as $page)
                    <li class="page-nav__item"><a href="{{route('products.all')}}/?page={{$page}}"
                                                  class="page-nav__item__link">{{$page}}</a></li>
                @endforeach
                <li class="page-nav__item"><a href="{{route('products.all')}}/?page={{$countPage}}"
                                              class="page-nav__item__link"><i class="fa fa-angle-double-right"></i></a>
                </li>
            </ul>
        @endif
    </div>
</x-app-layout>
