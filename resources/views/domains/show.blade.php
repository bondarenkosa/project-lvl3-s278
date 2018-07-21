@extends('layouts.app')

@section('content')
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
        <tr>
          <th scope="row">{{ $domain->id }}</th>
          <td>{{ $domain->name }}</td>
          <td>{{ $domain->status_code }}</td>
          <td>{{ $domain->content_length }}</td>
          <td>{{ $domain->updated_at }}</td>
          <td>{{ $domain->created_at }}</td>
        </tr>
      </tbody>
  </table>
@endsection
