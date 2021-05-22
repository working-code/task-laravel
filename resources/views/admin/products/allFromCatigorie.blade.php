<x-app-layout>
    <div class="content-head__container">
        <div class="content-head__title-wrap">
            <div class="content-head__title-wrap__title bcg-title">Игры в разделе {{$categorieName}}</div>
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

        <div class="menu-admin">
            @include('admin.menu')
        </div>

        <a href="{{route('products.new')}}" class="btn-admin">Добавить игру</a><br/>
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
                        <span class="products-price">{{$product->price}}</span>
                        <a href="{{route('products.edit', ['id' => $product->id])}}" class="btn-admin">Редактировать</a>
                        <a href="{{route('products.delete', ['id' => $product->id])}}" class="btn-admin">Удалить</a>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
    <div class="content-footer__container">

        @if($countPage > 1)
            <ul class="page-nav">
                <li class="page-nav__item"><a href="{{route('products.categorie')}}?id={{$product->categories_id}}&page=1" class="page-nav__item__link"><i
                            class="fa fa-angle-double-left"></i></a>
                </li>
                @foreach($pages as $page)
                    <li class="page-nav__item"><a href="{{route('products.categorie')}}?id={{$product->categories_id}}&page={{$page}}"
                                                  class="page-nav__item__link">{{$page}}</a></li>
                @endforeach
                <li class="page-nav__item"><a href="{{route('products.categorie')}}?id={{$product->categories_id}}&page={{$countPage}}"
                                              class="page-nav__item__link"><i class="fa fa-angle-double-right"></i></a>
                </li>
            </ul>
        @endif
    </div>
</x-app-layout>
