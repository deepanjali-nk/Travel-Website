@extends('admin.layout.adminLayout')

@section('title')
    Packages
@endsection

@section('content')
    <div class="mx-2">
        <a href="{{ route('/admin') }}"> <i class='bx bxs-dashboard'></i></a>
        <i class='bx bx-chevron-right'></i>
        <a href="{{ route('packages') }}">packages</a>
        <i class='bx bx-chevron-right'></i>
        <a href="">add</a>
    </div>

    <form action="{{ route('addPackage') }}" method='POST' enctype="multipart/form-data" class="mx-2">
        @csrf


        <div class="mb-3 mt-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" name='name' id='name' placeholder='name' class="form-control w-75">
        </div>

        @error('name')
            <p style='color:red'>{{ $message }}</p>
        @enderror


        <div class="mb-3">
            <label for="city" class="form-label">City:</label>
            <input type="text" name='city' id='city' placeholder='city' class="form-control w-75">
        </div>

        @error('city')
            <p style='color:red'>{{ $message }}</p>
        @enderror


        <div class="mb-3">
            <label for="duration" class="form-label">Duration:</label>
            <input type="text" name='duration' id='duration' placeholder='duration' class="form-control w-75">
        </div>

        @error('duration')
            <p style='color:red'>{{ $message }}</p>
        @enderror


        <div class="mb-3">
            <label for="persons" class="form-label">Persons:</label>
            <input type="text" name='persons' id='persons' placeholder='persons' class="form-control w-75">
        </div>

        @error('persons')
            <p style='color:red'>{{ $message }}</p>
        @enderror


        <div class="mb-3">
            <label for="price" class="form-label">Price:</label>
            <input type="text" name='price' id='price' placeholder='price' class="form-control w-75">
        </div>

        @error('price')
            <p style='color:red'>{{ $message }}</p>
        @enderror


        <div class="mb-3">
            <label for="image" class="form-label">Image:</label>
            <input type="file" name='image' id='image' class="form-control w-75">
        </div>


        <button type='submit' class="btn btn-primary">Add Package</button>
    </form>
@endsection
