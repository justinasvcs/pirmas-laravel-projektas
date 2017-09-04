@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $title }}</div>
                <div class="panel-body">

                    @foreach ($testimonials as $testimonial)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="name">
                                {{ $testimonial->name }}
                            </div>

                            <div class="time">
                                <small>{{ $testimonial->time }}</small>
                            </div>

                            <div class="text">
                                {{ $testimonial->content }}
                            </div>
                        </div>
                    </div>

                    <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection