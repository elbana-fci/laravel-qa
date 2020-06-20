@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <div class="d-flex align-items-center">
                            <h1>{{ $question->title }}</h1>
                            <div class="ml-auto">
                                <a href="{{ route('questions.index') }}" class="btn btn-outline-secondary">Back to All Question</a>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="media">
                        <div class="d-flex flex-column vote-controls">
                            <a title="This question is useful" href="" class="vote-up">
                                <i class="fas fa-caret-up"></i>
                            </a>
                            <span class="votes-count">1200</span>
                            <a title="This question is not useful" href="" class="vote-down off">
                                <i class="fas fa-caret-down"></i>
                            </a>
                            <a title="Click to mark as favorite question (Click again to undo)" href="" class="favorite mt-2 favorited">
                                <i class="fas fa-star"></i>
                                <span class="favorites-count">123</span>
                            </a>
                        </div>
                        <div class="media-body">
                            {{ $question->body }}
                            <div class="float-right mt-5">
                                <span class="text-muted">Answered {{ $question->created_at }}</span>
                                <div class="meida mt-1">
                                    <a href="{{ $question->user->url }}" class="pr-2">
                                        <img src="{{ $question->user->avatar }}" alt="">
                                    </a>
                                    <div class="media-body">
                                        <a href="{{ $question->user->url }}">{{ $question->user->name }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('answers._index', [
        'answers' => $question->answers,
        'answersCount' => $question->answers_count,
    ])
    @include('answers._create')
</div>
@endsection
