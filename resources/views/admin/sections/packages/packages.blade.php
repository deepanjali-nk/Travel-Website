@extends('admin.layout.adminLayout')

@section('title')
    Packages
@endsection

@section('content')
    <div class="mx-2">
        <a href="{{ route('/admin') }}"> <i class='bx bxs-dashboard'></i></a>
        <i class='bx bx-chevron-right'></i>
        <a href="{{ route('packages') }}">packages</a>
    </div>
    <br>
    <button class="mx-2 btn btn-primary"><a class="text-white" href="{{ route('add-package') }}">Add New Package</a></button>
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
                <th scope="col">city</th>
                <th scope="col">duration</th>
                <th scope="col">persons</th>
                <th scope="col">price</th>
                <th scope="col">image</th>
                <th scope="col">actions</th>
            </thead>

            <tbody>
                @foreach ($packages as $id => $package)
                    <tr>
                        <th scope="row">{{ $package->id }}</th>
                        <td>{{ $package->name }}</td>
                        <td>{{ $package->city }}</td>
                        <td>{{ $package->duration }}</td>
                        <td>{{ $package->persons }}</td>
                        <td>Rs. {{ $package->price }}</td>
                        <td>
                            <img src="{{ asset($package->imagePath) }}" alt="" width='150' height='150'>
                        </td>
                        <td class="d-flex justify-content-around gap-3">
                            <button class="btn btn-info"><a class="text-light"
                                    href="{{ route('edit-package', $package->id) }}">Edit</a></button>
                            <button class="btn btn-danger"><a class="text-light"
                                    href="{{ route('delete-package', $package->id) }}">Delete</a></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-center mt-4">
        {{ $packages->links() }}
    </div>
@endsection
