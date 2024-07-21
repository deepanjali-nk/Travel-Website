@extends('admin.layout.adminLayout')

@section('title')
    Contact
@endsection

@section('content')
    <div class="mx-2">
        <a href="{{ route('/admin') }}"> <i class='bx bxs-dashboard'></i></a>
        <i class='bx bx-chevron-right'></i>
        <a href="">contacts</a>
    </div>
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
                <th scope="col">email</th>
                <th scope="col">subject</th>
                <th scope="col">message</th>
                <th scope="col">actions</th>
            </thead>

            <tbody>
                @foreach ($contacts as $id => $contact)
                    <tr>
                        <td scope="row">{{ $contact->id }}</td>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>
                            {{ $contact->subject }}
                        </td>
                        <td>
                            {{ $contact->message }}
                        </td>

                        <td class="d-flex justify-content-around gap-3">
                            <button class="btn btn-info"><a class="text-light" href="">Edit</a></button>
                            <button class="btn
                                    btn-danger"><a class="text-light"
                                    href="">Delete</a></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $contacts->links() }}
    </div>
@endsection
