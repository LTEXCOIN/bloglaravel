@extends('back.layout.layout')
@section('title','Create Page')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add Page</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Add Page v1</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">

                        <form class="forms-sample" action="{{ route('admin.page.store') }}"
                              enctype="multipart/form-data" method="POST">
                            @csrf
                            @method('post')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Title</label>
                                        <input name="title" type="text" class="form-control" value="{{ old('title') }}"
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
                                        <select name="type" id="type-selection" class="form-control">
                                            <option value="">Select Type</option>
                                            <option
                                                @if(!empty(old('type')) && old('type') == 'About') selected
                                                @endif value="About">About
                                            </option>
                                            <option
                                                @if(!empty(old('type')) && old('type') == 'Our Vision') selected
                                                @endif value="Our Vision">Our Vision
                                            </option>
                                            <option
                                                @if(!empty(old('type')) && old('type') == 'Certification') selected
                                                @endif value="Certification">Certification
                                            </option>
                                            <option
                                                @if(!empty(old('type')) && old('type') == 'Press Release') selected
                                                @endif value="Press Release">Press Release
                                            </option>
                                            <option
                                                @if(!empty(old('type')) && old('type') == 'Video') selected
                                                @endif value="Video">Video
                                            </option>
                                            <option
                                                @if(!empty(old('type')) && old('type') == 'Other') selected
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
                            <div class="row d-none" id="youtube-block">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">YouTube Video Url</label>
                                        <input name="youtube_url" type="text" class="form-control"
                                               value="{{ old('youtube_url') }}"
                                               placeholder="Enter url here">
                                        @if ($errors->has('youtube_url'))
                                            <span class="help-block">
                                            <p
                                                class="text-red">{{ $errors->first('youtube_url') }}</p> </span>
                                        @endif
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="" id="image-label">Image</label>
                                        <input type="file" class="form-control" name="image">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Description</label>
                                        <textarea name="description" id="" cols="30" rows="5" class="form-control"
                                                  placeholder="Enter description here"></textarea>
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

                            <button type="submit" class="btn btn-success btn-save mr-2">Submit</button>
                            <button class="btn btn-info">Back</button>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>


    @push('extra-script')
        <script>
            $(document).ready(function () {
                $('#type-selection').change(function () {
                    let value = $(this).val();
                    if (value == 'Video') {
                        $('#youtube-block').removeClass('d-none');
                        $('#image-label').html('Youtube Video Thumbnail');


                    } else {
                        $('#youtube-block').addClass('d-none');
                        $('#image-label').html('Image');
                    }
                });
            });
        </script>
    @endpush
@endsection
