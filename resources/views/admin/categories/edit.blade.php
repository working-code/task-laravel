<x-app-layout>
    <div class="content-head__container">
        <div class="content-head__title-wrap">
            <div class="content-head__title-wrap__title bcg-title">Редактирование категории</div>
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

        <form action="{{route('categories.save')}}" method="post" class="admin-add-games">
            @csrf
            Название категории: <br />
            <input type="text" name="name" value="{{$categorie->name}}"><br />
            <input type="hidden" name="id" value="{{$categorie->id}}">
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input type="submit" value="Сохранить">
        </form>

    </div>

</x-app-layout>
