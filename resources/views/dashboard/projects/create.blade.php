@extends('dashboard.master')

@section('title', '| Create Project')

@section('custom_css')
    <style>
        .input-item.title {
            font-size: 3rem;
        }

        .input-item.link,
        .input-item.coder {
            font-size: 2rem;
        }

        .input-item.overview {
            font-size: 1.2rem;
            font-family: 'Poppins';
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="go-to-back">
            <a class="line-btn" href="{{ route('projects.index') }}">&larr; Go To Projects List</a>
        </div>
        <div class="main-title">
            Create New Project
        </div>
        @if (Session('success'))
            <p class="alert alert-success">{{ session('success') }}</p>
        @endif
        <div class="project-form">
            <form action="{{ route('projects.store') }}" autocomplete="off" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="form-group">
                    <input class="input-item title" name="title" placeholder="Project Title" type="text" value="{{ old('title') }}">
                    <span class="focus-border"></span>
                    @error('title')
                        <small><span class="text-danger error">* {{ $message }}</span></small>
                    @enderror
                </div>
                <div class="form-group">
                    <input class="input-item link" name="project_link" placeholder="Project Demo Link" type="text" value="{{ old('project_link') }}">
                    <span class="focus-border"></span>
                    @error('project_link')
                        <small><span class="text-danger error">* {{ $message }}</span></small>
                    @enderror
                </div>
                <div class="form-group">
                    <input class="input-item coder" name="coder" placeholder="Project Coder" type="text" value="{{ old('coder') }}">
                    <span class="focus-border"></span>
                    @error('coder')
                        <small><span class="text-danger error">* {{ $message }}</span></small>
                    @enderror
                </div>
                <div class="form-group">
                    <textarea class="input-item overview" id="overview" name="overview" placeholder="Project Overview..." spellcheck="false">{{ old('overview') }}</textarea>
                    <span class="focus-border"></span>
                    @error('overview')
                        <small><span class="text-danger error">* {{ $message }}</span></small>
                    @enderror
                </div>
                <div class="form-group">
                    <span class="skillTags-note">* Enter or comma between each skill tags</span>
                    <input class="skillTags" id="skillTags" name="skills" type="text" value="{{ old('skills') }}">
                    <span class="focus-border"></span>
                    @error('skills')
                        <small><span class="text-danger error">* {{ $message }}</span></small>
                    @enderror
                </div>
                <div class="form-group">
                    <input class="inputfile inputfile-1" data-multiple-caption="{count} files selected" id="file-1" name="image" type="file" />
                    <label for="file-1"><svg height="17" viewBox="0 0 20 17" width="20" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
                        </svg> <span>Choose Project Image &hellip;</span></label>
                    <div class="img-preview" id="imgPreview">
                        <img alt="Image Preview" class="img-preview__image" src="" />
                        <span class="img-preview__text">Image Preview</span>
                    </div>
                    @error('image')
                        <small><span class="text-danger error">* {{ $message }}</span></small>
                    @enderror
                </div>
                <button class="main-btn" type="submit">Create Project <i class="fa fa-plus"></i></button>
            </form>
        </div>
    </div>
@endsection

@section('custom_js')
    <script>
        const textarea = document.querySelector("#overview");
        textarea.addEventListener("keyup", e => {
            textarea.style.height = "60px";
            let scHeight = e.target.scrollHeight;
            textarea.style.height = `${scHeight}px`;
        });


        var tagInput1 = new TagsInput({
            selector: 'skillTags',
            duplicate: false,
            max: 10
        });
        tagInput1.addData([])
    </script>
@endsection
