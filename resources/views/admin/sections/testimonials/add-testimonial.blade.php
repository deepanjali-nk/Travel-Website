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
        <a href="">add</a>
    </div>

    @if (session('error'))
        <div class="error-message">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('addTestimonial') }}" method='POST' enctype="multipart/form-data" class="mx-2">
        @csrf

        <div class="mb-3 mt-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" name='name' id='name' placeholder='name' class="form-control w-75">
        </div>

        @error('name')
            <p style='color:red'>{{ $message }}</p>
        @enderror


        <div class="mb-3">
            <label for="position" class="form-label">Position:</label>
            <input type="text" name='position' id='position' placeholder='position' class="form-control w-75">
        </div>

        @error('position')
            <p style='color:red'>{{ $message }}</p>
        @enderror


        <div class="mb-3">
            <label for="testimonial" class="form-label">Testimonial</label>
            <textarea class="form-control w-75" name='testimonial' id='testimonial' style="height: 150px"></textarea>
        </div>

        @error('testimonial')
            <p style='color:red'>{{ $message }}</p>
        @enderror


        <div class="mb-3">
            <label for="image" class="form-label">Image:</label>
            <input type="file" name='image' id='image' class="form-control w-75">
        </div>

        @error('image')
            <p style='color:red'>{{ $message }}</p>
        @enderror

        <label for="isPublished" class="form-check-label">Publish:</label>
        <div class="mb-2 form-check form-switch">
            <input class="form-check-input" type="checkbox" role="switch" id="isPublished" name='isPublished'>
        </div>

        <button type='submit' class="btn btn-primary">Add Testimonial</button>
    </form>
@endsection
