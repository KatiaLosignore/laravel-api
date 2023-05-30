@extends('layouts.admin')

@section('content')

<a href="{{route('admin.projects.create')}}" class="btn btn-primary mt-4 mb-4">Create a new Project</a>

<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Image</th>
        <th scope="col">Title</th>
        <th scope="col">Content</th>
        <th scope="col">Slug</th>
        <th scope="col">Type</th>
        <th scope="col">Tecnologies</th>
        <th scope="col">Azioni</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($projects as $project)
            <tr>
                <td>{{$project->id}}</td>
                <td>
                    @if ($project->image)
                        <img class="img-thumbnail my-img-index" src="{{asset('storage/' . $project->image)}}" alt="{{$project->title}}"/>
                    @else
                        <img class="img-thumbnail" src="{{Vite::asset('resources/img/images.jpg')}}" alt= "Il codice"/>
                    @endif
                </td>
                <td>{{$project->title}}</td>
                <td>{{$project->content}}</td>
                <td>{{$project->slug}}</td>
                <td>{{$project->type?->name}}</td>
                <td>
                    @foreach ($project->technologies as $technology)
                        <span class="badge rounded-pill text-bg-primary">{{$technology->name}}</span>
                    @endforeach
                </td>
                <td class="d-flex">
                    <a class="btn btn-primary me-2" href="{{route('admin.projects.show', $project->slug)}}">Detail</a>
                    <a class="btn btn-warning me-2" href="{{route('admin.projects.edit', $project->slug)}}">Edit</a>

                    <form class="form_delete_project" action="{{route('admin.projects.destroy', ['project' => $project->slug])}}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger">Elimina</button>
                  </form>

                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
      <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Conferma eliminazione</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          Confermi di voler eliminare l'elemento selezionato?
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-danger">Conferma eliminazione</button>
      </div>
      </div>
  </div>
</div>

@endsection
