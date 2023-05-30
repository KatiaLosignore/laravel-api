@extends('layouts.admin')

@section('content')

<h1 class="mt-3 mb-3">List of Project Types</h1>

<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Slug</th>
        <th scope="col">Color</th>
        <th scope="col">Number of projects</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($types as $type)
            <tr>
                <td>{{$type->id}}</td>
                <td>{{$type->name}}</td>
                <td>{{$type->slug}}</td>
                <td>{{$type->color}}</td>
                <td>{{count($type->projects)}}</td>             
            </tr>
        @endforeach

    </tbody>
</table>



@endsection