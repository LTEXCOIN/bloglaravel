@extends('back.layout.layout')
@section('title','Edit Page')
@section('content')

    <div class="content-header">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                            class="ti-home"></i>&nbsp;Home</a>
                </li>
                <li class="breadcrumb-item"><a href="{{ route('admin.content.index') }}">Page</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Page</li>
            </ol>
        </nav>

    </div>

    <div class="container">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">

                    <form class="forms-sample" action="{{ route('admin.page.update',$page->id) }}"
                          enctype="multipart/form-data" method="POST">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Title</label>
                                    <input name="title" type="text" class="form-control"
                                           value="{{ (!empty(old('title'))) ? old('title') : $page->title }}"
                                           placeholder="Title">
                                    @if ($errors->has('title'))
                                        <span class="help-block">
                                            <p class="text-red">{{ $errors->first('title') }}</p> </span>
                                    @endif
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Type</label>
                                    <select name="type" id="" class="form-control">
                                        <option value="">Select Type</option>
                                        <option
                                            @if(!empty(old('type')) && old('type') == 'About') selected
                                            @elseif($page->type == 'About') selected
                                            @endif value="About">About
                                        </option>
                                        <option
                                            @if(!empty(old('type')) && old('type') == 'Our Vision') selected
                                            @elseif($page->type == 'Our Vision') selected
                                            @endif value="Our Vision">Our Vision
                                        </option>
                                        <option
                                            @if(!empty(old('type')) && old('type') == 'Press Release') selected
                                            @elseif($page->type == 'Press Release') selected
                                            @endif value="Press Release">Press Release
                                        </option>

                                        <option
                                            @if(!empty(old('type')) && old('type') == 'Video') selected
                                            @elseif($page->type == 'Video') selected
                                            @endif value="Video">Video
                                        </option>

                                        <option
                                            @if(!empty(old('type')) && old('type') == 'Other') selected
                                            @elseif($page->type == 'Other') selected
                                            @endif value="Other">Other
                                        </option>


                                    </select>
                                    @if ($errors->has('type'))
                                        <span class="help-block">
                                            <p
                                                class="text-red">{{ $errors->first('type') }}</p> </span>
                                    @endif
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Image</label>
                                    <input type="file" name="image">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Description</label>
                                    <textarea name="description" id="" cols="30" rows="5" class="form-control"
                                              placeholder="Enter description here">{{ (!empty(old('description'))) ? old('description') : $page->description }}</textarea>
                                    @if ($errors->has('description'))
                                        <span class="help-block">
                                            <p
                                                class="text-red">{{ $errors->first('description') }}</p> </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Status</label>
                                    <select name="status" class="form-control">
                                        <option @if(!empty(old('status')) && old('status') == 1) selected
                                                @endif value="1">Active
                                        </option>
                                        <option @if(!empty(old('status')) && old('status') == 0) selected
                                                @endif value="0">Inactive
                                        </option>
                                    </select>
                                    @if ($errors->has('status'))
                                        <span class="help-block">
                                            <p class="text-red">{{ $errors->first('description') }}</p> </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">

                        </div>

                        <button type="submit" class="btn btn-success btn-save mr-2">Update</button>
                        <button class="btn btn-info">Back</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
