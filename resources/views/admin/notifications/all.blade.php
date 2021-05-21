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


                    Список адресов для рассылки уведомлений:<br />
                    <a href="{{route('notifications.new')}}">Добавить email</a>
                    <table class="border">
                    @foreach($notifications as $notification)
                        <tr>
                            <td>{{$notification->id}}</td>
                            <td> | {{$notification->email}}</td>
                            <td><a href="{{route('notifications.edit', ['id' => $notification->id])}}"> | Редактировать</a></td>
                            <td><a href="{{route('notifications.delete', ['id' => $notification->id])}}"> | Удалить</a></td>
                        </tr>
                    @endforeach
                    </table>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
