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
                            <a title="mark as best answer (Click again to undo)" href="" class="vote-accepted mt-2">
                                <i class="fas fa-check"></i>
                            </a>
                        </div>
                        <div class="media-body">
                            {{$answer->body}}
                            <div class="float-right mt-5">
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
                    <hr>
                @endforeach
            </div>
        </div>
    </div>
</div>