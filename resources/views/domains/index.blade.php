@extends('layouts.app')

@section('content')
    <h2 class="display-4">Domains list</h2>
    @if ($domains)
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">id</th>
              <th scope="col">Name</th>
              <th scope="col">Updated at</th>
              <th scope="col">Created at</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($domains as $domain)
              <tr>
                 <th scope="row">{{ $domain->id }}</th>
                 <td><a href="{{ $domain->name }}" target="_blank">{{ $domain->name }}</a></td>
                 <td>{{ $domain->updated_at }}</td>
                 <td>{{ $domain->created_at }}</td>
              </tr>
           @endforeach
          </tbody>
      </table>
      {{ $domains->links() }}
     @endif
@endsection
