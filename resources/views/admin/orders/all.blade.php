<x-app-layout>
    <div class="content-head__container">
        <div class="content-head__title-wrap">
            <div class="content-head__title-wrap__title bcg-title">Список заказов</div>
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
            <br />

        <div class="cart-product-list">
            @if($orders)
                @foreach($orders as $order)

                    <div class="cart-product-list__item">
                        <div class="cart-product__item__product-photo"><img src="{{$order->product->getPathImg()}}" class="cart-product__item__product-photo__image"></div>
                        <div class="cart-product__item__product-name">
                            <div class="cart-product__item__product-name__content">{{$order->product['name']}}</div>
                        </div>
                        <div class="cart-product__item__cart-date">
                            <div class="cart-product__item__cart-date__content">Заказ {{$order->id}}</div>
                        </div>
                        <div class="cart-product__item__cart-date">
                            <div class="cart-product__item__cart-date__content">{{$order->email}}</div>
                        </div>
                        <div class="cart-product__item__cart-date">
                            <div class="cart-product__item__cart-date__content">{{$order->name}}</div>
                        </div>
                        <div class="cart-product__item__product-price"><span class="product-price__value">{{$order->product['price']}}</span></div>
                    </div>

                @endforeach
            @else
                У вас нет заказов
            @endif
        </div>





    </div>

</x-app-layout>
