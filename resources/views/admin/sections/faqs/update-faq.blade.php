@extends('admin.layout.adminLayout')

@section('title')
    Faqs
@endsection

@section('content')
    <div class="mx-2">
        <a href="{{ route('/admin') }}"> <i class='bx bxs-dashboard'></i></a>
        <i class='bx bx-chevron-right'></i>
        <a href="{{ route('faqs') }}">faqs</a>
        <i class='bx bx-chevron-right'></i>
        <a href="">edit</a>
    </div>

    <form action="{{ route('editFaq', $data->id) }}" method='POST' class="mx-2">
        @csrf
        @method('PUT')

        <div class="mb-3 mt-3">
            <label for="question" class="form-label">Question</label>
            <input type="text" name='question' id='question' value='{{ $data->question }}' class="form-control w-75">
        </div>


        @error('question')
            <p style='color:red'>{{ $message }}</p>
        @enderror


        <div class="mb-3">
            <label for="answer" class="form-label">Answer</label>
            <textarea class="form-control w-75" name='answer' id='answer' value='asd' style="height: 150px">{{ $data->answer }}</textarea>
        </div>

        @error('answer')
            <p style='color:red'>{{ $message }}</p>
        @enderror


        <button type='submit' class="btn btn-primary">Update Faq</button>
    </form>
@endsection
