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


        @if($orders)
            @foreach($orders as $order)
                {{$order->id}}
                {{$order->name}}
                {{$order->email}}
                {{$order->product['name']}}
                {{$order->product['price']}}
            @endforeach
        @else
            У вас нет заказов
        @endif
    </div>

</x-app-layout>
