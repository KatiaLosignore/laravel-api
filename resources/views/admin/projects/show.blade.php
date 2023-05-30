@extends('layouts.admin')


@section('content')

<h1 class="mt-3">{{$project->title}}</h1>
<h6 class="mb-3"><small>Slug: {{$project->slug}}</small></h6>

<h3>Type: {{$project->type?$project->type->name:'No matched type'}}</h3>

<div class="mb-3 mt-3">
    @foreach ($project->technologies as $technology)
        <span class="badge rounded-pill text-bg-primary">{{$technology->name}}</span>
    @endforeach
</div>

@if ($project->image)
    <img class="img-thumbnail" src="{{asset('storage/' . $project->image)}}" alt="{{$project->title}}"/>
@else
    <img class="img-thumbnail" src="{{Vite::asset('resources/img/images.jpg')}}" alt= "Il codice"/>
@endif


<p class="mb-3 mt-3">{{$project->link_project}}</p>
<p>{{$project->content}}</p>

<a class="btn btn-primary" href="{{route('admin.projects.index')}}">Back</a>

@endsection
