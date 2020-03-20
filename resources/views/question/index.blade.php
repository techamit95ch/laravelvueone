@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">All Questions</div>

                <div class="card-body">
                    @foreach ($question as $ques)
                        <div class="media">
                            <div class="media-body">
                                <h3 class="mt-0">
                                    <a href="{{$ques->url}}">
                                    {{ $ques->title }}
                                    </a>
                                </h3>
                                <p class="lead">
                                    Asked By
                                    <a href="{{ $ques->user->url }}"> {{$ques->user->name}}</a>
                                    <small class="text-muted">{{$ques->created_date}}</small>
                                </p>

                                {{ str_limit( $ques->body,250) }}
                            </div>
                        </div>
                    </hr>
                    @endforeach
                    <div class="mx-auto">
                    {{ $question->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
