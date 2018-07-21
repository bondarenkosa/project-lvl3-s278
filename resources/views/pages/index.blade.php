@extends('layouts.app')

@section('content')
    <h1 class="display-4">Webpage analyzer</h1>

    <form action="{{ route('domains.store') }}" method="post">
        <div class="form-group">
            <input class="form-control form-control-lg" type="text" name="name" value="{{ $name or '' }}" placeholder="Enter domain">
            <small id="nameHelp" class="form-text text-muted">
                Example: https://ru.hexlet.io
            </small>
            @isset($errors['name'])
                <div class="alert alert-danger" role="alert">
                  {{ $errors['name'][0] }}
                </div>
            @endisset
        </div>
        <button type="submit" class="btn btn-primary mb-2">Go</button>
    </form>
@endsection
