@extends('back.layout.layout')
@section('title','Edit Content')
@section('content')

        <div class="content-header">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="ti-home"></i>&nbsp;Home</a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.content.index') }}">Content</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Content</li>
                </ol>
            </nav>

        </div>


        <div class="container">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">

                        <form class="forms-sample" action="{{ route('admin.content.update',$content->id) }}"
                              enctype="multipart/form-data" method="POST">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Title</label>
                                        <input name="title" type="text"
                                               value="{{ (!empty(old('title'))) ? old('title') : $content->title }}"
                                               class="form-control"
                                               placeholder="Title">
                                        @if ($errors->has('title'))
                                            <span class="help-block">
                                            <p
                                                class="text-red">{{ $errors->first('title') }}</p> </span>
                                        @endif
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Type</label>
                                        <select name="type" id="" class="form-control">
                                            <option value="">Select Type</option>
                                            <option
                                                @if(!empty(old('type')) && old('type') == 'Garment Inspection') selected
                                                @elseif($content->type == 'Garment Inspection') selected
                                                @endif value="Garment Inspection">Garment Inspection
                                            </option>
                                            <option @if(!empty(old('type')) && old('type') == 'Wirehousing') selected
                                                    @elseif($content->type == 'Wirehousing') selected
                                                    @endif value="Wirehousing">Wirehousing
                                            </option>

                                        </select>
                                        @if ($errors->has('title'))
                                            <span class="help-block">
                                            <p
                                                class="text-red">{{ $errors->first('title') }}</p> </span>
                                        @endif
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Image</label>
                                        <input type="file" name="image">
                                        <br>
                                        Uploaded image: <img src="{{ asset('content/'.$content->thumbnail) }}"
                                                             style="width: 50px; height: 50px;" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Description</label>
                                        <textarea name="description" id="" cols="30" rows="5" class="form-control"
                                                  placeholder="Enter description here">{{ (!empty(old('description'))) ? old('description') : $content->description }}</textarea>
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
                                            <option value="active">Active</option>
                                            <option value="inactive">Inactive</option>
                                        </select>
                                        @if ($errors->has('status'))
                                            <span class="help-block">
                                            <p
                                                class="text-red">{{ $errors->first('description') }}</p> </span>
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
