<x-app-layout>
    <div class="content-head__container">
        <div class="content-head__title-wrap">
            <div class="content-head__title-wrap__title bcg-title">Уведомления</div>
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



        <a href="{{route('notifications.new')}}" class="btn-admin">Добавить email</a><br />
        Список адресов для рассылки уведомлений:<br />
            @foreach($notifications as $notification)
            <div class="admin-categories">
                    {{$notification->email}}
                    <a href="{{route('notifications.edit', ['id' => $notification->id])}}" class="btn-admin">Редактировать</a>
                    <a href="{{route('notifications.delete', ['id' => $notification->id])}}" class="btn-admin">Удалить</a>
            </div>
            @endforeach


    </div>

</x-app-layout>
