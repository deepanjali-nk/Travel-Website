@extends('admin.layout.adminLayout')

@section('title')
    Teams
@endsection

@section('content')
    <div class="mx-2">
        <a href="{{ route('/admin') }}"> <i class='bx bxs-dashboard'></i></a>
        <i class='bx bx-chevron-right'></i>
        <a href="{{ route('teams') }}">teams</a>
        <i class='bx bx-chevron-right'></i>
        <a href="">edit</a>
    </div>

    @if (session('error'))
        <div class="error-message">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('editTeam', $data->id) }}" method='POST' enctype="multipart/form-data" class="mx-2">
        @csrf
        @method('PUT')

        <div class="mb-3 mt-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" name='name' id='name' placeholder='name' class="form-control w-75"
                value='{{ $data->name }}'>
        </div>

        @error('name')
            <p style='color:red'>{{ $message }}</p>
        @enderror


        <div class="mb-3">
            <label for="position" class="form-label">Position:</label>
            <input type="text" name='position' id='position' placeholder='position' class="form-control w-75"
                value='{{ $data->position }}'>
        </div>

        @error('position')
            <p style='color:red'>{{ $message }}</p>
        @enderror

        <div class="mb-3">
            <label for="image" class="form-label">Image:</label>
            <div class="mb-3">
                <img src='{{ $data->imagePath }}' width='200' height='200'>
            </div>
            <input type="file" name='image' id='image' class="form-control w-75">
        </div>

        @error('image')
            <p style='color:red'>{{ $message }}</p>
        @enderror

        <div class="mb-3">
            <label for="facebook" class="form-label">Facebook Url</label>
            <input type="text" name='facebook' id='facebook' placeholder='facebook' class="form-control w-75"
                value='{{ $data->facebook }}'>
        </div>

        <div class="mb-3">
            <label for="twitter" class="form-label">Twitter Url</label>
            <input type="text" name='twitter' id='twitter' placeholder='twitter' class="form-control w-75"
                value='{{ $data->twitter }}'>
        </div>

        <div class="mb-3">
            <label for="instagram" class="form-label">Instagram Url</label>
            <input type="text" name='instagram' id='instagram' placeholder='instagram' class="form-control w-75"
                value='{{ $data->instagram }}'>
        </div>

        <div class="mb-3">
            <label for="linkedin" class="form-label">Linkedin Url</label>
            <input type="text" name='linkedin' id='linkedin' placeholder='linkedin' class="form-control w-75"
                value='{{ $data->linkedin }}'>
        </div>

        <label for="isPublished" class="form-check-label">Publish:</label>
        <div class="mb-2 form-check form-switch">
            <input class="form-check-input" type="checkbox" role="switch" id="isPublished" name='isPublished'
                @if ($data->isPublished == 1) checked @endif>
        </div>

        <button type='submit' class="btn btn-primary mb-3">Edit Team</button>
    </form>
@endsection
