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

                        <a href="{{route('categories.new')}}">Добавить категорию</a>
                        <table class="table border">
                            @foreach($categories as $categorie)
                                <tr>
                                    <td>{{$categorie->name}}</td>
                                    <td><a href="{{route('categories.edit', ['id' => $categorie->id])}}"> | Редактировать</a></td>
                                    <td><a href="{{route('categories.delete', ['id' => $categorie->id])}}"> | Удалить</a></td>

                                </tr>
                            @endforeach
                        </table>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
