@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Draugo profilis</div>
                <div class="panel-body">
                    Vardas: {{ $friend->name }}<br>
                    Gimimo data: {{ $friend->birthday }}<br>
                    Tel. nr.: {{ $friend->phone }}<br>
                    Miestas: {{ $friend->city }}<br>
                    Lytis: {{ $friend->sex }}<br>
                    Photo:<br>
                    <img style="width: 150px; height: auto;" src="{{ Storage::url($friend->photo->filename) }}"><br>

                    <div>
                        <a class="btn btn-default" href="{{ route('friends.edit', $friend->id) }}">Keisti</a>

                        <form style="display: inline-block" method="POST" action="{{ route('friends.destroy', $friend->id) }}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            <button class="btn btn-danger" type="submit">Ištrinti</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection