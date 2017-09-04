@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Mano draugai</div>
                <div class="panel-body">
                    <p>
                        <a class="btn  btn-default" href="{{ route('friends.create') }}">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Sukurti naują
                        </a>
                    </p>

                    @if($friends->count() == 0)
                        <div class="alert alert-info">
                            Neturiu draugų... :(
                        </div>
                    @else
                        <table class="table">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Draugas</th>
                                    <th>Veiksmai</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($friends as $friend)
                                <tr>
                                    <td>
                                        @if($friend->photo)
                                        <img style="width: 50px; height: 50px;" src="{{ Storage::url($friend->photo->filename) }}">
                                        @else
                                        <span class="glyphicon glyphicon-user" style="font-size: 32px"></span>
                                        @endif
                                    </td>

                                    <td>
                                        {{ $friend->name }} ({{ $friend->sex }}, {{ $friend->city }})
                                    </td>
                                    <td>
                                        <a class="btn btn-default" href="{{ route('friends.show', $friend->id) }}">Rodyti</a>
                                        <a class="btn btn-default" href="{{ route('friends.edit', $friend->id) }}">Keisti</a>

                                        <form style="display: inline" method="POST" action="{{ route('friends.destroy', $friend->id) }}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <button class="btn btn-danger" type="submit">Ištrinti</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{ $friends->links() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection