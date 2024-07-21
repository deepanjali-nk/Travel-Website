@extends('admin.layout.adminLayout')

@section('title')
    Faqs
@endsection

@section('content')
    <div class="mx-2">
        <a href="{{ route('/admin') }}"> <i class='bx bxs-dashboard'></i></a>
        <i class='bx bx-chevron-right'></i>
        <a href="{{ route('faqs') }}">faqs</a>
    </div>
    <br>
    <button class="mx-2 btn btn-primary"><a class="text-white" href="{{ route('add-faq') }}">Add New Faq</a></button>
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
                <th scope="col">question</th>
                <th scope="col">answer</th>
                <th scope="col">actions</th>
            </thead>

            <tbody>
                @foreach ($faqs as $id => $faq)
                    <tr>
                        <th scope="row">{{ $faq->id }}</th>
                        <td>{{ $faq->question }}</td>
                        <td>{{ $faq->answer }}</td>
                        <td class="action-btns">
                            <button class="btn btn-info"><a class="text-light"
                                    href="{{ route('edit-faq', $faq->id) }}">Edit</a></button>
                            <button class="btn btn-danger"><a class="text-light"
                                    href="{{ route('delete-faq', $faq->id) }}">Delete</a></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $faqs->links() }}
    </div>
@endsection
