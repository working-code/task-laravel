








<x-app-layout>
    <div class="content-head__container">
        <div class="content-head__title-wrap">
            <div class="content-head__title-wrap__title bcg-title">Редактирование игры</div>
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

            <form action="{{route('products.save')}}" method="post" enctype="multipart/form-data">
                @csrf
                Название:<br />
                <input type="text" name="name" value="{{$product->name}}"><br />
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                Категория:<br />
                <select name="categories_id">
                    @foreach($categories as $categorie)
                        @if($product->categories_id == $categorie->id)
                            <option selected value="{{$categorie->id}}">{{$categorie->name}}</option>
                        @else
                            <option value="{{$categorie->id}}">{{$categorie->name}}</option>
                        @endif
                    @endforeach
                </select><br />
                @error('price')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                Цена:<br />
                <input type="text" name="price" value="{{$product->price}}"><br />
                @error('price')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                Описание:<br />
                <textarea rows="10" name="description">{{$product->description}}</textarea><br />
                @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                @if($product->img1)
                    <img src="{{$product->getPathImg()}}">    <br />
                @endif

                Обложка:<br />
                <input type="file" name="img1"><br />
                @error('img1')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <input type="hidden" name="id" value="{{$product->id}}">

                <input type="submit" value="Сохранить">
            </form>

        </div>
    </div>

</x-app-layout>
