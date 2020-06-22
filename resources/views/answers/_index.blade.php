<div class="row mt-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h2>{{ $answersCount . " ". str_plural('Answer', $answersCount) }}</h2>
                </div>
                <hr>
                @include('layouts._messages')

                @foreach($answers as $answer)
                    <div class="media">
                        <div class="d-flex flex-column vote-controls">
                            <a title="This answer is useful" href="" class="vote-up">
                                <i class="fas fa-caret-up"></i>
                            </a>
                            <span class="votes-count">1200</span>
                            <a title="This answer is not useful" href="" class="vote-down off">
                                <i class="fas fa-caret-down"></i>
                            </a>
                            @can('accept', $answer)
                                <a title="mark as best answer (Click again to undo)" href="" 
                                    class="mt-2"
                                    onclick="event.preventDefault(); document.getElementById('accept-answer-{{ $answer->id }}').submit();"
                                    >
                                    <i class="fas fa-check {{ $answer->status }}"></i>
                                </a>
                                <form id="accept-answer-{{ $answer->id }}" action="{{ route('answers.accept', $answer->id) }}" method="POST" style="display:none;">
                                    @csrf
                                </form>
                                @else
                                    @if($answer->is_best)
                                        <a title="The question owner accepted it as best answer" href="" 
                                            class="mt-2"
                                            >
                                            <i class="fas fa-check {{ $answer->status }}"></i>
                                        </a>
                                    @endif
                            @endcan
                        </div>
                        <div class="media-body">
                            {{$answer->body}}
                            <div class="row">
                                <div class="col-4">
                                    <div class="ml-auto"> 
                                        @can ('update', $answer)
                                            <a href="{{ route('answers.edit', [$question->id, $answer->id]) }}" class="btn btn-sm btn-outline-info">Edit</a>
                                        @endcan
                                        @can ('delete', $answer)
                                            <form class="form-delete" method="post" action="{{ route('answers.destroy', [$question->id, $answer->id]) }}">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                        @endcan
                                    </div>
                                </div>
                                <div class="col-4"></div>
                                    <div class="col-4">
                                    <span class="text-muted">Answered {{ $answer->created_at }}</span>
                                    <div class="meida mt-1">
                                        <a href="{{ $answer->user->url }}" class="pr-2">
                                            <img src="{{ $answer->user->avatar }}" alt="">
                                        </a>
                                        <div class="media-body">
                                            <a href="{{ $answer->user->url }}">{{ $answer->user->name }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                @endforeach
            </div>
        </div>
    </div>
</div>