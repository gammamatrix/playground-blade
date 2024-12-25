@if ($withDelete || $withEdit)
<div class="btn-group {{$css ?? 'float-end'}}" role="group"
    aria-label="{{ __(':model_label Controls and Actions', ['model_label' => $meta['info']['model_label']]) }}">
    <button id="detail-actions" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
        aria-expanded="false">
        <span class="fas fa-gear"></span> {{ __('Actions') }}
    </button>
    <ul class="dropdown-menu" aria-labelledby="detail-actions">
        @if($data->trashed())
        <form method="POST" action="{{ $routeRestore }}" novalidate>
            @csrf
            @method('put')
            <button class="dropdown-item text-success" role="button">
                {{ __('Restore') }} <span class="fa-solid fa-recycle float-end"></span>
            </button>
        </form>
        @else
        @if(!$data->locked)
        <a class="dropdown-item text-success" href="{{ $routeEdit }}" role="button">
            {{ __('Edit') }} <span class="fas fa-edit float-end"></span>
        </a>
        @endif
        @endif
        @if($data->locked)
        <form method="POST" action="{{ $routeUnlock }}" novalidate>
            @csrf
            @method('delete')
            <button class="dropdown-item text-warning" role="button">
                {{ __('Unlock') }} <span class="fa-solid fa-lock-open float-end"></span>
            </button>
        </form>
        @else
        @if(!$data->trashed())
        <form method="POST" action="{{ $routeLock }}" novalidate>
            @csrf
            @method('put')
            <button class="dropdown-item text-warning" role="button">
                {{ __('Lock') }} <i class="fa-solid fa-lock float-end"></i>
            </button>
        </form>
        <form method="POST" action="{{ $routeDelete }}" novalidate>
            @csrf
            @method('delete')
            <button class="dropdown-item text-danger" role="button">
                {{ __('Trash') }} <span class="fas fa-trash float-end"></span>
            </button>
        </form>
        @endif
        @endif
    </ul>
</div>
@endif
