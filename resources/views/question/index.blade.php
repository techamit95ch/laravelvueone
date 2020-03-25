@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h2>All Questions</h2>
                        <div class="ml-auto">
                        <a href=" {{route('question.create')}} "class="btn btn-outline-secondary">
                                    Ask Questions
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @include('layouts\_message')
                    @foreach ($question as $ques)
                        <div class="media">
                            <div class="d-flex flex-column counters">
                                <div class="votes">
                                    <strong>
                                        {{$ques->votes}}
                                    </strong>
                                    {{str_plural('votes',$ques->votes)}}
                                </div>
                                <div class="status {{$ques->status }}">
                                    <strong>
                                        {{$ques->answers}}
                                    </strong>
                                    {{str_plural('answers',$ques->answers)}}
                                </div>
                                <div class="views">
                                    <strong>
                                        {{$ques->views}}
                                    </strong>
                                    {{str_plural('views',$ques->views)}}
                                </div>

                            </div>

                            <div class="media-body">
                                <div class="d-flex align-items-center">
                                    <h3 class="mt-0"><a href="{{$ques->url}}">{{$ques->title }}</a></h3>
                                    <div class="ml-auto">
                                        
                                        @can ('update',$ques)
                                            <a href="{{route('question.edit',$ques->id) }}"class="btn btn-outline-secondary btn-sm">Edit</a>
                                        @endcan
                                        @can ('delete',$ques)
                                        <form action="{{ route('question.destroy',$ques->id) }} " method="post" accept-charset="utf-8" class="form-questionDelete">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Are sure want to delete it?')">Delete</button>
                                        </form>
                                         @endcan
                                    </div>
                                </div>
                                
                                <p class="lead">
                                    Asked By
                                    <a href="{{$ques->user->url }}"> {{$ques->user->name}}</a>
                                    <small class="text-muted">{{$ques->created_date}}</small>
                                </p>

                                {{str_limit( $ques->body,250) }}
                            </div>
                        </div>
                    </hr>
                    @endforeach
                    <div class="mx-auto">
                    {{$question->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
