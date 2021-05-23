<x-app-layout>
    <div class="content-head__container">
        <div class="content-head__title-wrap">
            <div class="content-head__title-wrap__title bcg-title">Оформление заказа:</div>
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

        Введите свои данные:<br />
        <form action="{{route('orders.createSave')}}" method="post" class="admin-add-games">
            @csrf
            <input type="hidden" name="id" value="{{$id}}">

            ФИО: <input type="text" name="name"><br />
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            email: <input type="text" name="email"><br />
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input type="submit" value="Добавить">
        </form>
    </div>

</x-app-layout>
