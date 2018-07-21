@extends('layouts.app')

@section('content')
    <h2 class="display-4">List of Domains</h2>
    @if (count($domains))
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">id</th>
              <th scope="col">Name</th>
              <th scope="col">Status code</th>
              <th scope="col">Content length</th>
              <th scope="col">Updated at</th>
              <th scope="col">Created at</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($domains as $domain)
              <tr>
                 <th scope="row">{{ $domain->id }}</th>
                 <td><a href="{{ route('domains.show', ['id' => $domain->id]) }}">{{ $domain->name }}</a></td>
                 <td>{{ $domain->status_code }}</td>
                 <td>{{ $domain->content_length }}</td>
                 <td>{{ $domain->updated_at }}</td>
                 <td>{{ $domain->created_at }}</td>
              </tr>
           @endforeach
          </tbody>
      </table>
      {{ $domains->links() }}
     @endif
@endsection
