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

                    <form action="{{route('categories.save')}}" method="post">
                        @csrf
                        Название категории: <input type="text" name="name" value="{{$categorie->name}}"><br />
                        <input type="hidden" name="id" value="{{$categorie->id}}">
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input type="submit" value="Сохранить">
                    </form>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
