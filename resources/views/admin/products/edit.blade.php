<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    Добавление игры<br />
                    <form action="{{route('products.save')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        Название: <input type="text" name="name" value="{{$product->name}}"><br />
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        Категория:
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

                        Цена: <input type="text" name="price" value="{{$product->price}}"><br />
                        @error('price')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        Описание: <input type="text" name="description" value="{{$product->description}}"><br />
                        @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        @if($product->img1)
                        <img src="/img/{{$product->img1}}">    <br />
                        @endif

                        Обложка: <input type="file" name="img1"><br />
                        @error('img1')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <input type="hidden" name="id" value="{{$product->id}}">

                        <input type="submit" value="Сохранить">
                    </form>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
