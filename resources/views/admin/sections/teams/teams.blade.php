@extends('admin.layout.adminLayout')

@section('title')
    Teams
@endsection

@php
    use Illuminate\Support\Str;
@endphp

@section('content')
    <div class="mx-2">
        <a href="{{ route('/admin') }}"> <i class='bx bxs-dashboard'></i></a>
        <i class='bx bx-chevron-right'></i>
        <a href="">teams</a>
    </div>
    <br>
    <button class="mx-2 btn btn-primary"><a class="text-white" href="{{ route('add-team') }}">Add New
            Team</a></button>
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
                <th scope="col">Socials</th>
                <th scope="col">image</th>
                <th scope="col">actions</th>
            </thead>

            <tbody>
                @foreach ($teams as $team)
                    <tr>
                        <td scope="row">{{ $team->id }}</td>
                        <td>{{ $team->name }}</td>
                        <td>{{ $team->position }}</td>
                        <td>
                            @if ($team->isPublished == 1)
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
                            @if (!empty($team->facebook))
                                @if (Str::startsWith($team->facebook, ['http://', 'https://']))
                                    <a href="{{ $team->facebook }}" target="_blank">Facebook</a><br>
                                @else
                                    <a href="http://{{ $team->facebook }}" target="_blank">Facebook</a><br>
                                @endif
                            @endif

                            @if (!empty($team->twitter))
                                @if (Str::startsWith($team->twitter, ['http://', 'https://']))
                                    <a href="{{ $team->twitter }}" target="_blank">Twitter</a><br>
                                @else
                                    <a href="http://{{ $team->twitter }}" target="_blank">Twitter</a><br>
                                @endif
                            @endif

                            @if (!empty($team->instagram))
                                @if (Str::startsWith($team->instagram, ['http://', 'https://']))
                                    <a href="{{ $team->instagram }}" target="_blank">Instagram</a><br>
                                @else
                                    <a href="http://{{ $team->instagram }}" target="_blank">Instagram</a><br>
                                @endif
                            @endif

                            @if (!empty($team->linkedin))
                                @if (Str::startsWith($team->linkedin, ['http://', 'https://']))
                                    <a href="{{ $team->linkedin }}" target="_blank">LinkedIn</a><br>
                                @else
                                    <a href="http://{{ $team->linkedin }}" target="_blank">LinkedIn</a><br>
                                @endif
                            @endif
                        </td>

                        <td>
                            <img src="{{ asset($team->imagePath) }}" alt="" width='200' height='200'>
                        </td>

                        <td class="d-flex justify-content-around gap-3">
                            <button class="btn btn-info"><a class="text-light"
                                    href="{{ route('edit-team', $team->id) }}">Edit</a></button>
                            <button class="btn btn-danger"><a class="text-light"
                                    href="{{ route('delete-team', $team->id) }}">Delete</a></button>
                        </td>

                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $teams->links() }}
    </div>
@endsection
