@extends('admin.layout.adminLayout')

@section('title')
    Testimonials
@endsection

@section('content')
    <div class="mx-2">
        <a href="{{ route('/admin') }}"> <i class='bx bxs-dashboard'></i></a>
        <i class='bx bx-chevron-right'></i>
        <a href="{{ route('testimonials') }}">testimonials</a>
        <i class='bx bx-chevron-right'></i>
        <a href="">edit</a>
    </div>

    @if (session('error'))
        <div class="error-message">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('editTestimonial', $data->id) }}" method='POST' enctype="multipart/form-data" class="mx-2">
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
            <label for="testimonial" class="form-label">Testimonial</label>
            <textarea class="form-control w-75" name='testimonial' id='testimonial' style="height: 150px">{{ $data->testimonial }}</textarea>
        </div>

        @error('testimonial')
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

        <label for="isPublished" class="form-check-label">Publish:</label>
        <div class="mb-2 form-check form-switch">
            <input class="form-check-input" type="checkbox" role="switch" id="isPublished" name='isPublished'
                @if ($data->isPublished == 1) checked @endif>
        </div>

        <button type='submit' class="btn btn-primary">Update Testimonial</button>
    </form>
@endsection
