@can('accept', $model)
    <a title="mark as best answer (Click again to undo)" href="" 
        class="mt-2"
        onclick="event.preventDefault(); document.getElementById('accept-answer-{{ $model->id }}').submit();"
        >
        <i class="fas fa-check {{ $model->status }}"></i>
    </a>
    <form id="accept-answer-{{ $model->id }}" action="{{ route('answers.accept', $model->id) }}" method="POST" style="display:none;">
        @csrf
    </form>
    @else
        @if($model->is_best)
            <a title="The question owner accepted it as best answer" href="" 
                class="mt-2"
                >
                <i class="fas fa-check {{ $model->status }}"></i>
            </a>
        @endif
@endcan