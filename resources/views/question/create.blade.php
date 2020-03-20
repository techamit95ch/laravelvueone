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
                        <a href=" {{route('question.index')}} " class="btn btn-outline-secondary">
                                   Back to All Questions
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form action=" {{ route('question.store') }} " method="POST">
                    @csrf    
                        <div class="form-group">
                            <label for="question-title">Ask Question</label>
                            <input type="text" name="title" id="question-title" class="form-control {{ $errors->has('title')?'is-invalid':'' }} ">
                            @if ($errors->has('title'))
                                <div class="invalid-feedback">
                                    <strong> {{ $errors->first('title') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="question-body">Explain Question</label>
                            <textarea type="text" name="body" id="question-body" class="form-control {{ $errors->has('body')?'is-invalid':'' }}"></textarea>
                            @if ($errors->has('body'))
                                <div class="invalid-feedback">
                                    <strong> {{ $errors->first('body') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">

                            <button type="submit" id="question-title" class="btn btn-primary btn-lg">Ask Question</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
