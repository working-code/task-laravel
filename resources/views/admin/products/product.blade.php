<x-app-layout>

    <div class="content-head__container">
        <div class="content-head__title-wrap">
            <div class="content-head__title-wrap__title bcg-title">{{$product->name}}</div>
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
    <div class="menu-admin">
        @include('admin.menu')
    </div>

    <a href="{{route('products.new')}}" class="btn-admin">Добавить игру</a>
    <a href="{{route('products.edit', ['id' => $product->id])}}" class="btn-admin">Редактировать</a>
    <a href="{{route('products.delete', ['id' => $product->id])}}" class="btn-admin">Удалить</a><br />

    <div class="content-main__container">
        <div class="product-container">
            <div class="product-container__image-wrap"><img src="{{$product->getPathImg()}}" class="image-wrap__image-product"></div>
            <div class="product-container__content-text">
                <div class="product-container__content-text__title">{{$product->name}}</div>
                <div class="product-container__content-text__price">
                    <div class="product-container__content-text__price__value">
                        Цена: <b>{{$product->price}}</b>
                        руб
                    </div><a href="#" class="btn btn-blue">Купить</a>
                </div>
                <div class="product-container__content-text__description">
                    {{$product->description}}
                </div>
            </div>
        </div>
    </div>

                        <br/>
                        <br/>
                        <br/><br />



</x-app-layout>
