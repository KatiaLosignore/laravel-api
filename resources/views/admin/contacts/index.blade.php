@extends('layouts.admin')

@section('content')


    <h1 class="mt-4 mb-3">Contacts list</h1>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Message</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($leads as $lead)
                <tr>
                    <td>{{$lead->name}}</td>
                    <td>{{$lead->email}}</td>
                    <td>{{$lead->message}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
