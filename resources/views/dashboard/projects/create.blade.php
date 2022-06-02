@extends('dashboard.master')

@section('title', '| Create Project')

@section('custom_css')
<style>

.input-item.title{
    font-size: 3rem;
}
.input-item.link, .input-item.coder{
    font-size: 2rem;
}
.input-item.overview{
    font-size: 1.2rem;
    font-family: 'Poppins';
}

</style>
@endsection

@section('content')
    <div class="container">
        <div class="go-to-back">
            <a href="{{ route('projects.index') }}" class="line-btn">&larr; Go To Projects List</a>
        </div>
        <div class="main-title">
            Create New Project
        </div>
        @if (Session('success'))
            <p class="alert alert-success">{{ session('success') }}</p>
        @endif
        <div class="project-form">
            <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                @csrf
                <div class="form-group">
                    <input type="text" class="input-item title" placeholder="Project Title" name="title" value="{{ old('title') }}">
                    <span class="focus-border"></span>
                    @error('title')
                        <small><span class="text-danger error">* {{ $message }}</span></small>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" class="input-item link" placeholder="Project Demo Link" name="project_link" value="{{ old('project_link') }}">
                    <span class="focus-border"></span>
                    @error('project_link')
                        <small><span class="text-danger error">* {{ $message }}</span></small>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" class="input-item coder" placeholder="Project Coder" name="coder" value="{{ old('coder') }}">
                    <span class="focus-border"></span>
                    @error('coder')
                        <small><span class="text-danger error">* {{ $message }}</span></small>
                    @enderror
                </div>
                <div class="form-group">
                    <textarea spellcheck="false" placeholder="Project Overview..." class="input-item overview" id="overview" required name="overview">{{ old('overview') }}</textarea>
                    <span class="focus-border"></span>
                    @error('overview')
                        <small><span class="text-danger error">* {{ $message }}</span></small>
                    @enderror
                </div>
                <div class="form-group">
                    <span class="skillTags-note">* Enter or comma between each skill tags</span>
                    <input type="text" id="skillTags" class="skillTags" name="tags">
                    <span class="focus-border"></span>
                    @error('tags')
                        <small><span class="text-danger error">* {{ $message }}</span></small>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="file" name="image_path" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" />
                    <label for="file-1"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Choose Project Image &hellip;</span></label>
                    <div class="img-preview" id="imgPreview">
                        <img src="" alt="Image Preview" class="img-preview__image" />
                        <span class="img-preview__text">Image Preview</span>
                    </div>
                    @error('image_path')
                        <small><span class="text-danger error">* {{ $message }}</span></small>
                    @enderror
                </div>
                <button type="submit" class="main-btn">Create Project <i class="fa fa-plus"></i></button>
            </form>
        </div>
    </div>
@endsection

@section('custom_js')
<script>
    const textarea = document.querySelector("#overview");
    textarea.addEventListener("keyup", e =>{
        textarea.style.height = "60px";
        let scHeight = e.target.scrollHeight;
        textarea.style.height = `${scHeight}px`;
    });


    var tagInput1 = new TagsInput({
        selector: 'skillTags',
        duplicate : false,
        max : 10
    });
    tagInput1.addData([])
</script>
@endsection
