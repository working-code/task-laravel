<x-app-layout>
    <div class="content-head__container">
        <div class="content-head__title-wrap">
            <div class="content-head__title-wrap__title bcg-title">Добавление игры</div>
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


        <div class="admin-add-games">

            <form  action="{{route('products.add')}}" method="post" enctype="multipart/form-data">
                @csrf
                Название:<br />
                <input type="text" name="name"><br />
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                Категория:<br />
                <select name="categories_id">
                    @foreach($categories as $categorie)
                        <option value="{{$categorie->id}}">{{$categorie->name}}</option>
                    @endforeach
                </select><br />
                @error('price')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                Цена:<br />
                <input type="text" name="price"><br />
                @error('price')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                Описание:<br />
{{--                <input type="text" name="description"><br />--}}
                <textarea name="description" rows="10"></textarea><br />
                @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                Обложка:<br />
                <input type="file" name="img1"><br />
                @error('img1')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <input type="submit" value="Добавить">
            </form>

        </div>
    </div>

</x-app-layout>
