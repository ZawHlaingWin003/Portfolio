@extends('dashboard.master')

@section('title', '| Create Blog')

@section('custom_css')
<style>

.input-item.title{
    font-size: 3rem;
}
.input-item.slug, .input-item.excerpt{
    font-size: 1.2rem;
}

.ck-editor{
    color: black;
}
.ck-editor a{
    color: blue;
}

</style>
@endsection

@section('content')
    <div class="container">
        <div class="go-to-back">
            <a href="{{ route('blogs.list') }}" class="line-btn">&larr; Go To Blog List</a>
        </div>
        <div class="main-title">
            Create New Blog
        </div>
        @if (Session('success'))
            <p class="alert alert-success my-3">{{ session()->get('success') }}</p>
        @endif
        <div class="blog-form">
            <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                @csrf
                <div class="form-group">
                    <input type="text" class="input-item title" placeholder="Blog Title" name="title" id="title" value="{{ old('title') }}">
                    <span class="focus-border"></span>
                    @error('title')
                        <small><span class="text-danger error">* {{ $message }}</span></small>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" class="input-item slug" placeholder="Blog Slug" name="slug" id="slug" value="{{ old('slug') }}">
                    <span class="focus-border"></span>
                    @error('slug')
                        <small><span class="text-danger error">* {{ $message }}</span></small>
                    @enderror
                </div>
                <div class="form-group">
                    <textarea spellcheck="false" placeholder="Blog Excerpt" class="input-item excerpt" required name="excerpt" id="excerpt">{{ old('excerpt') }}</textarea>
                    <span class="focus-border"></span>
                    @error('excerpt')
                        <small><span class="text-danger error">* {{ $message }}</span></small>
                    @enderror
                </div>
                <div class="form-group">
                    <textarea name="content" class="content" id="content">{{ old('content') }}</textarea>
                    @error('content')
                        <small><span class="text-danger error">* {{ $message }}</span></small>
                    @enderror
                </div>
                <div class="form-group">
                    <select class="form-select form-select-lg mb-3" name="category_id">
                        <option selected disabled>Choose Category ... </option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? "selected" : "" }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <small><span class="text-danger error">* {{ $message }}</span></small>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="file" name="image_path" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" />
                    <label for="file-1"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Choose Blog Image &hellip;</span></label>
                    <div class="img-preview" id="imgPreview">
                        <img src="" alt="Image Preview" class="img-preview__image" />
                        <span class="img-preview__text">Image Preview</span>
                    </div>
                    @error('image_path')
                        <small><span class="text-danger error">* {{ $message }}</span></small>
                    @enderror
                </div>
                <button type="submit" class="main-btn">Create Blog <i class="fa fa-plus"></i></button>
            </form>
        </div>
    </div>
@endsection

@section('custom_js')
<script>

    $('#title').change(function (e) {
        e.preventDefault();

        $.get("{{ route('blogs.checkSlug') }}", { 'title': $(this).val() },
            function (data) {
                $("#slug").val(data.slug);
            },
        );
    });

    ClassicEditor
    .create( document.querySelector( '#content' ) )
    .catch( error => {
        console.error( error );
    });

    const textarea = document.querySelector("#excerpt");
    textarea.addEventListener("keyup", e =>{
        textarea.style.height = "60px";
        let scHeight = e.target.scrollHeight;
        textarea.style.height = `${scHeight}px`;
    });

</script>
@endsection
