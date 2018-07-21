@extends('layouts.app')

@section('content')
    <h1 class="display-4">Webpage analyzer</h1>

    <form action="{{ route('domains.store') }}" method="post">
        <div class="form-group">
            <input class="form-control form-control-lg" type="text" name="name" value="{{ $name or '' }}" placeholder="Enter domain">
            <small id="nameHelp" class="form-text text-muted">
                Example: https://ru.hexlet.io
            </small>
            @isset($errors)
                <div class="alert alert-danger" role="alert">
                    <ul>
                        @foreach ($errors as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endisset
        </div>
        <button type="submit" class="btn btn-primary mb-2">Go</button>
    </form>
@endsection
