@extends('layouts.main')

@section('content')
    @if(session()->has('success'))
        <div class="alert alert-success">{{ session()->get('success') }}</div>
    @endif
@section('header')
    Запись на мероприятния
@endsection
    Все мероприятия
    <div class="row">
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th>Название мероприятия</th>
                    <th>Дата проведения</th>
                    <th>Статус записи</th>
                    <th>Управление</th>
                </tr>
            </thead>
        <tbody>
           @forelse($events as $event)
            <tr>
                <td  class="text-center"> {{ $event->name }} </td>
                <td  class="text-center"> {{ $event->date }} </td>
                <td  class="text-center">
                    @auth
                    @foreach($event->users as $user)
                        @if($user->name == Auth::user()->name)
                            Вы записаны
                        @endif
                    @endforeach
                        @endauth
                </td>
                <td class="h6">
                    <a class="" href="{{ route('event.show', $event) }}"><i class="fa fa-lg fa-baby"></i> Список участников/описание</a><br>
                    <a class="" href="{{ route('edit.join', ['id' => $event->id]) }}"><i class="fa fa-lg fa-edit"></i> Записаться на мероприятние</a><br>
                    <a class="" href="#"
                       onclick="event.preventDefault();
                                     document.getElementById('destroy-form-{{ $event->id }}').submit();">
                        <i class="fa fa-lg fa-trash"></i>
                        {{ __(' Отказаться') }}
                    </a>

                    <form id="destroy-form-{{ $event->id }}" action="{{ route('edit.unsubscribe', ['id' => $event->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        @auth()
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            @endif
                    </form>

                </td>
            </tr>
           @empty
            <tr>
                <td colspan="4">
                    <h2>Нет мероприятий</h2>
                </td>
           </tr>
           @endforelse
        </tbody>
        </table>
    </div>

@endsection
