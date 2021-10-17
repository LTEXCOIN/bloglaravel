@extends('back.layout.layout')
@section('title','Create Post')
@section('content')
    <div class="content-header">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                            class="ti-home"></i>&nbsp;Home</a>
                </li>
                <li class="breadcrumb-item"><a href="{{ route('admin.post.index') }}">Service</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Post</li>
            </ol>
        </nav>

    </div>
    <div class="container">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample d-none" action="{{ route('admin.post.store') }}"
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
                    <div class="row">
                        <div class="col-lg-12">
                            <textarea id="summernote-editor" name="image"></textarea>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.js"></script>
    <script>
        $(document).ready(function () {

            // Define function to open filemanager window
            var lfm = function (options, cb) {
                var route_prefix = (options && options.prefix) ? options.prefix : '/laravel-filemanager';
                window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=1200,height=600');

                window.SetUrl = cb;
            };

            // Define LFM summernote button
            const LFMButton = function (context) {
                const ui = $.summernote.ui;
                const button = ui.button({
                    contents: '<i class="note-icon-picture"></i> ',
                    tooltip: 'Insert image with filemanager',
                    click: function () {

                        lfm({type: 'image', prefix: '/filemanager'}, function (lfmItems, path) {

                            lfmItems.forEach(function (lfmItem) {

                                context.invoke('insertImage', lfmItem.url);
                            });
                        });

                    }
                });
                return button.render();
            };

            $('#summernote-editor').summernote({
                height: "320px",
                toolbar: [
                    ['popovers', ['lfm']],
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['insert', ['link', 'video']],
                    ['misc', ['fullscreen', 'codeview', 'undo', 'redo']],
                    ['view', ['help']]
                ],
                fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New', 'Merriweather'],
                buttons: {
                    lfm: LFMButton
                },
                lineHeights: ['0.2', '0.3', '0.4', '0.5', '0.6', '0.8', '1.0', '1.2', '1.4', '1.5', '2.0', '3.0'],
                styleTags: [
                    'p',
                    {
                        title: 'Blockquote', tag: 'blockquote', className: 'blockquote', value: 'blockquote'
                    },
                    'pre', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6'
                ]
            })
        });
    </script>
@endsection
