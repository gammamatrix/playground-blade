@extends('playground::layouts.site')

@section('title', __('Forbidden'))

@section('breadcrumbs')
    <nav aria-label="breadcrumb" class="m-3">
        <ol class="breadcrumb">
            @if (Route::has('home'))
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}">{{ __('Home') }}</a>
                </li>
            @endif
            <li class="breadcrumb-item active" aria-current="page">
                403
            </li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>
                    <small class="text-body-secondary">403</small>
                    {{ __('Forbidden') }}
                </h1>
            </div>
            <div class="card-body bg-warning">
                <p class="lead text-danger">
                    {{ __($exception->getMessage() ?: 'Forbidden') }}
                </p>
            </div>
            @if (url()->previous() === url()->current())
                <div class="card-footer">
                    <a class="btn btn-info float-end" href="{{ url()->previous() }}">
                        {{ __('Go back') }}
                    </a>
                </div>
            @endif
        </div>
    </div>
@endsection
