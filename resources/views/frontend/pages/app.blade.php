@extends('frontend.layouts.master')

@section('title', '| Home')

@section('content')

    @include('frontend.sections.home')

    @include('frontend.sections.about')

    @include('frontend.sections.projects')

    @include('frontend.sections.blogs')

    @include('frontend.sections.contact')

@endsection
