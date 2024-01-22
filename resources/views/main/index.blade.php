@extends('layouts.index')
@section('content')

@include('includes.header')

<main>
    @include('includes.section-main')
    @include('includes.section-materials')
    @include('includes.section-choose')
    @include('includes.section-help')
    @include('includes.section-examples')
    @include('includes.section-testimonials')
    @include('includes.section-blog')
    @include('includes.section-subscribe')
</main>

@include('includes.footer')
@endsection