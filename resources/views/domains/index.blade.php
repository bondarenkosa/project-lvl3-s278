@extends('layouts.app')

@section('content')
    <h2 class="display-4">List of Domains</h2>
    @if (count($domains))
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
                 <td><a href="{{ route('domains.show', ['id' => $domain->id]) }}" target="_blank">{{ $domain->name }}</a></td>
                 <td>{{ $domain->updated_at }}</td>
                 <td>{{ $domain->created_at }}</td>
              </tr>
           @endforeach
          </tbody>
      </table>
      {{ $domains->links() }}
     @endif
@endsection
