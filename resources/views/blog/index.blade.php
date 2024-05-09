@extends('layouts.index')
@section('content')

@include('includes.header')
<div style="display:flex; flex-direction: column; gap:20px; max-width: 900px;margin: 0 auto;padding:60px;">
    <form action="{{ route('blog.index') }}" method="GET">
        <!-- @csrf -->
        <input type="text" style="width:600px;" id="subject" name="subject" placeholder="Enter blog name" value = "{{ request('subject') ?: '' }}" />
        <button type="submit">Ok</button>
    </form>
    <div>
        @foreach($blogList as $blog)
        <div>
            <h2><a style="color: #6a6a6a;" href = "{{ route('blog.show', $blog->id) }}">{{ $blog->subject }}</a></h2>
            <div style="padding:20px;">{{ $blog->description }}</div>
        </div>
        @endforeach

        <div class="row mx-auto">{{ $blogList->links() }}</div>
    </div>
</div>

@include('includes.footer')
@endsection