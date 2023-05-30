@extends('layouts.admin')


@section('content')

    <h2>Add new Technology:</h2>

    <form method="POST" action="{{ route('admin.technologies.store') }}">

        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Name Technology</label>
            <input type="name" class="form-control @error('name') is-invalid @enderror " id="name" name="name" value="{{old('name')}}">
            @if ($errors->has('name'))
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            @endif
        </div>
    

        <button type="submit" class="btn btn-primary">Save</button>

    </form>

@endsection
