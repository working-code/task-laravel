<x-app-layout>
    <div class="content-head__container">
        <div class="content-head__title-wrap">
            <div class="content-head__title-wrap__title bcg-title">Категории</div>
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

        <a href="{{route('categories.new')}}" class="btn-admin">Добавить категорию</a><br />

            @foreach($categories as $categorie)
                <div class="admin-categories">{{$categorie->name}}
                    <a href="{{route('categories.edit', ['id' => $categorie->id])}}" class="btn-admin">Редактировать</a>
                    <a href="{{route('categories.delete', ['id' => $categorie->id])}}" class="btn-admin">Удалить</a>
                </div>
            @endforeach

    </div>

</x-app-layout>
