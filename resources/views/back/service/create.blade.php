@extends('back.layout.layout')
@section('title','Create Service')
@section('content')
    <div class="content-header">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                            class="ti-home"></i>&nbsp;Home</a>
                </li>
                <li class="breadcrumb-item"><a href="{{ route('admin.service.index') }}">Service</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Service</li>
            </ol>
        </nav>

    </div>
    <div class="container">
        <div class="col-md-10 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <form class="forms-sample" action="{{ route('admin.service.store') }}"
                          enctype="multipart/form-data" method="POST">
                        @csrf
                        @method('post')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Service Name</label>
                                    <input name="name" type="text" class="form-control" value="{{ old('name') }}"
                                           placeholder="Service Name">
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <p
                                                class="text-red">{{ $errors->first('name') }}</p> </span>
                                    @endif
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Service Name(ja)</label>
                                    <input name="name_ja" type="text" class="form-control" value="{{ old('name_ja') }}"
                                           placeholder="Service Name">
                                    @if ($errors->has('name_ja'))
                                        <span class="help-block">
                                            <p
                                                class="text-red">{{ $errors->first('name_ja') }}</p> </span>
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
                                    <textarea name="text" id="summernote" cols="30" rows="5" class="form-control"
                                              placeholder="Enter text here"></textarea>
                                    @if ($errors->has('text'))
                                        <span class="help-block">
                                            <p
                                                class="text-red">{{ $errors->first('text') }}</p> </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Description(ja)</label>
                                    <textarea name="text_ja" id="summernote1" cols="30" rows="5" class="form-control"
                                              placeholder="Enter text here"></textarea>
                                    @if ($errors->has('text_ja'))
                                        <span class="help-block">
                                            <p
                                                class="text-red">{{ $errors->first('text_ja') }}</p> </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Status</label>
                                    <select name="status" class="form-control">
                                        <option @if(!empty(old('status')) && old('status') == '1') selected
                                                @endif value="1">Active
                                        </option>
                                        <option @if(!empty(old('status')) && old('status') == '0') selected
                                                @endif value="0">Inactive
                                        </option>
                                    </select>
                                    @if ($errors->has('status'))
                                        <span class="help-block">
                                            <p class="text-red">{{ $errors->first('status') }}</p> </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">

                        </div>

                        <button type="submit" class="btn btn-success btn-save mr-2">Save</button>
                        <button class="btn btn-info">Back</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
