
@extends('layouts.main')

@section('title')
    {{ $event['name'] }} @parent
@endsection

@section('header')
    Список записавшихся на мероприятие: {{ $event['name'] }}
@endsection

@section('content')

    <div class="row">
        <hr>
             Описание мероприятий: {{ $event->description }}
         <hr>
    </div>
    @auth
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">

                <table class="table table-bordered">
                    <thead>

                    <tr>
                        <th class="text-center">Имя</th>
                        <th class="text-center">Отчество</th>
                        <th class="text-center">Возраст</th>
                        <th class="text-center">Место рождения</th>
                        <th class="text-center">e-mail</th>
                    </tr>
                    </thead>
                    <tbody>

                    @forelse($event->users as $user)
                        <tr>
                            <td> {{ $user->name }} </td>
                            <td> {{ $user->surname }}</td>
                            <td> {{ $user->age }}</td>
                            <td> {{ $user->place_of_birth }}</td>
                            <td> {{ $user->email }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5"><h2>#н/д</h2></td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
        </div>
    </div>


        <a class="" href="#"
           onclick="event.preventDefault();
               document.getElementById('destroy-form-{{ $event->id }}').submit();">
            <i class="fa fa-lg fa-trash"></i>
            {{ __(' Удалить (В ЦЕЛОМ СТРАНИЦА ПОЛУЧИЛАСЬ ПОЛУАДМИНСКАЯ, ПРОСТО ХОТЕЛОСЬ ДОБАВИТЬ)') }}
        </a>
        @endauth

        <form id="destroy-form-{{ $event->id }}" action="{{ route('event.destroy', $event->id) }}" method="POST">
            @csrf
            @method('DELETE')
        </form>


@endsection
