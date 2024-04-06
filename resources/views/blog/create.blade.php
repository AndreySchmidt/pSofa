@extends('layouts.index')
@section('content')

@include('includes.header')

<div style="display:flex; max-width: 900px;margin: 0 auto;padding:60px;">
    <form style="display: flex; flex-direction: column;justify-content: center;" action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="subject">Название поста</label>
        <input type="text" style="width:600px;" id="subject" name="subject" placeholder="Enter blog name" value = "{{ old('subject') }}">
        @error('subject')
        <div class="text-danger">{{ $message }}</div>
        @enderror


        <textarea style="width:600px;" id="summernote" name="description">{{ old('description') }}</textarea>
        @error('description')
        <div class="text-danger">{{ $message }}</div>
        @enderror

        <button type="submit">Ok</button>
    </form>
</div>

@include('includes.footer')
@endsection
