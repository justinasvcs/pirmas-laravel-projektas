@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Pridėti naują draugą</div>
                <div class="panel-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form enctype="multipart/form-data" method="post" action="{{ route('friends.store') }}">
                        {{ csrf_field() }}

                        @include('friends.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection