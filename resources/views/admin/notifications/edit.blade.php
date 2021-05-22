<x-app-layout>
    <div class="content-head__container">
        <div class="content-head__title-wrap">
            <div class="content-head__title-wrap__title bcg-title">Редактирование email</div>
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


        <form action="{{route('notifications.save')}}" method="post" class="admin-add-games">
            @csrf
            email: <br />
            <input type="text" name="email" value="{{$notification->email}}"><br />
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input type="hidden" name="id" value="{{$notification->id}}">
            <input type="submit" value="Сохранить">
        </form>


    </div>

</x-app-layout>
