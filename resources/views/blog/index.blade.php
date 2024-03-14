@extends('layouts.index')
@section('content')

@include('includes.header')

<div style="display:flex;">
    <div>
        @foreach($blogList as $post)
        <div>
            <h2>{{ $post->subject }}</h2>
            <div style="padding:20px;">{{ $post->description }}</div>
        </div>
        @endforeach

        <div class="row mx-auto">{{ $blogList->links() }}</div>
    </div>
</div>

@include('includes.footer')
@endsection