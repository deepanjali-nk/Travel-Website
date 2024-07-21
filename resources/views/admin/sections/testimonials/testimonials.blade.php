@extends('admin.layout.adminLayout')

@section('title')
    Testimonials
@endsection

@section('content')
    <div class="mx-2">
        <a href="{{ route('/admin') }}"> <i class='bx bxs-dashboard'></i></a>
        <i class='bx bx-chevron-right'></i>
        <a href="">testimonials</a>
    </div>
    <br>
    <button class="mx-2 btn btn-primary"><a class="text-white" href="{{ route('add-testimonial') }}">Add New
            Testimonial</a></button>
    <br>

    {{-- check is the suceess has been set after adding/editing/deleting --}}
    @if (session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif
    <br>
    <div class="table-responsive mx-2">
        <table class="table text-center table-bordered">
            <thead class="text-uppercase">
                <th scope="col">id</th>
                <th scope="col">name</th>
                <th scope="col">position</th>
                <th scope="col">Published</th>
                <th scope="col">Testimonial</th>
                <th scope="col">image</th>
                <th scope="col">actions</th>
            </thead>

            <tbody>
                @foreach ($testimonials as $id => $testimonial)
                    <tr>
                        <td scope="row">{{ $testimonial->id }}</td>
                        <td>{{ $testimonial->name }}</td>
                        <td>{{ $testimonial->position }}</td>
                        <td>
                            @if ($testimonial->isPublished == 1)
                                <span class="text-success">
                                    &#10003;
                                </span>
                            @else
                                <span class="text-danger">
                                    X
                                </span>
                            @endif
                        </td>
                        <td>
                            <p>{{ $testimonial->testimonial }}</p>
                        </td>
                        <td>
                            <img src="{{ asset($testimonial->imagePath) }}" alt="" width='200' height='200'>
                        </td>

                        <td class="d-flex justify-content-around gap-3">
                            <button class="btn btn-info"><a class="text-light"
                                    href="{{ route('edit-testimonial', $testimonial->id) }}">Edit</a></button>
                            <button class="btn
                                    btn-danger"><a class="text-light"
                                    href="{{ route('delete-testimonial', $testimonial->id) }}">Delete</a></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $testimonials->links() }}
    </div>
@endsection
