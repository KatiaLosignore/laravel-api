@extends('layouts.admin')


@section('content')


    <div class="row mt-4">
        <h2>Edit Technology:</h2>

        <form method="POST" action="{{route('admin.technologies.update',['technology'=>$technology->slug])}}">

            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Name Technology</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name',$technology->name)}}">
                @if ($errors->has('name'))
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                
                @endif
            </div>
            <button type="submit" class="btn btn-primary my-4">Save</button>

        </form>

    </div>

@endsection
