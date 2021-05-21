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

                    Редактирование email:<br />
                    <form action="{{route('notifications.save')}}" method="post">
                        @csrf
                        email: <input type="text" name="email" value="{{$notification->email}}"><br />
                        @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input type="hidden" name="id" value="{{$notification->id}}">
                        <input type="submit" value="Сохранить">
                    </form>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>