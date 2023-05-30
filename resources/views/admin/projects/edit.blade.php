@extends('layouts.admin')


@section('content')

    <form method="POST" action="{{ route('admin.projects.update' , ['project' => $project->slug]) }}" enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror " id="title" name="title" value="{{old('title', $project->title)}}">
            @error('title')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Select image</label>

            @if ($project->image)
            <div class="my-img-wrapper">
                <img class="img-thumbnail my-img-thumb" src="{{asset('storage/' . $project->image)}}" alt="{{$project->title}}"/>
                <a href="{{route('admin.projects.deleteImage', ['slug' => $project->slug])}}" class="my-img-delete btn btn-danger">X</a>
            </div>
            @endif

            <input type="file" class="form-control @error('image') is-invalid @enderror " id="image" name="image">

            @error('image')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>


        <div class="mb-3">
            <label for="type_id" class="form-label">Select Types</label>
            <select class="form-select @error('type_id') is-invalid @enderror" name="type_id" id="type_id">
                <option @selected(old('type_id', $project->type_id)=='') value="">No Type</option>
                @foreach ($types as $type)
                    <option @selected(old('type_id', $project->type_id)==$type->id) value="{{$type->id}}">{{$type->name}}</option>
                @endforeach
            </select>
            @error('type_id')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Description</label>
            <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content">{{old('content', $project->content)}}</textarea>
            @error('content')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="link_project" class="form-label">Link project</label>
            <input type="text" class="form-control @error('link_project') is-invalid @enderror " id="link_project" name="link_project" value="{{old('link_project', $project->link_project)}}">
            @error('link_project')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>


        <div class="mb-3">
            @foreach($technologies as $technology)

                @if ($errors->any())
                    <input id="tag_{{$technology->id}}" @if (in_array($technology->id , old('technologies', []))) checked @endif type="checkbox" name="technologies[]" value="{{$technology->id}}">
                @else
                    <input id="tag_{{$technology->id}}" @if ($project->technologies->contains($technology->id)) checked @endif type="checkbox" name="technologies[]" value="{{$technology->id}}">
                @endif

                <label for="tag_{{$technology->id}}" class="form-label">{{$technology->name}}</label>
                <br>
            @endforeach
            @error('technologies')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Salva</button>

    </form>

@endsection
