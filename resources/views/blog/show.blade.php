@extends('layouts.index')
@section('content')

@include('includes.header')

<div style="display:flex; max-width: 900px;margin: 0 auto;padding:60px;">
    <div>
        <div>
            <h2>{{ $blog->subject }}</h2>
            <div style="padding:20px;">{{ $blog->description }}</div>
        </div>
    </div>
</div>

@include('includes.footer')
@endsection