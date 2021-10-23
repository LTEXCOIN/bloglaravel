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


        <div class="card">
            <div class="card-body">
                <form id="postFormSubmit" class="forms-sample" action="{{ route('admin.post.store') }}"
                      enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('post')

                    <div class="row">
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input name="title" type="text" id="title" class="form-control"
                                               value="{{ old('title') }}"
                                               placeholder="Title">
                                        @if ($errors->has('title'))
                                            <span class="help-block">
                                            <p class="text-red">{{ $errors->first('title') }}</p> </span>
                                        @endif
                                    </div>

                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Feature Image</label>
                                        <input type="file" id="feature_image" name="feature_image">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Description</label>
                                        <textarea name="description" id="summernote" cols="30" rows="5"
                                                  class="form-control"
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
                                        <label for="exampleInputUsername1">Meta Title</label>
                                        <input type="text" name="meta_title" id="meta_title" class="form-control">
                                        @if ($errors->has('meta_title'))
                                            <span class="help-block">
                                            <p class="text-red">{{ $errors->first('meta_title') }}</p> </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Meta Description</label>
                                        <textarea name="meta_description" id="meta_description" cols="30" rows="2"
                                                  class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">

                            <div class="form-group">
                                <label>Categories</label>
                                @foreach($categories as $key=> $category)
                                    <div class="form-group form-check">
                                        <input type="checkbox" value="{{ $category->id }}" name="categories[]"
                                               class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label"
                                               for="exampleCheck1">{{ $category->category_name }}</label>
                                    </div>
                                @endforeach
                                @if ($errors->has('status'))
                                    <span class="help-block">
                                            <p class="text-red">{{ $errors->first('status') }}</p> </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" id="status" class="form-control">
                                    @foreach($post_statuses as $key=> $post_status)

                                        <option value="{{ $post_status }}"
                                                @if($post_status == 'published') selected @endif>{{ $post_status }}</option>
                                    @endforeach

                                </select>
                                @if ($errors->has('status'))
                                    <span class="help-block">
                                            <p class="text-red">{{ $errors->first('status') }}</p> </span>
                                @endif
                            </div>
                        </div>
                    </div>


                    <button type="submit" class="btn btn-success btn-save mr-2">Save</button>
                    <button class="btn btn-info">Back</button>
                </form>

            </div>
        </div>

    </div>

    @push('extra-css')
        <link rel="stylesheet" href="{{ asset('assets/back/plugins/summernote/summernote.min.css')}}"></link>
    @endpush
    @push('extra-script')

        <script src="{{ asset('assets/back/plugins/summernote/summernote-bs4.min.js')}}"></script>
        <script>
            $(document).ready(function () {

                // Define function to open filemanager window
                const lfm = function (options, cb) {
                    const route_prefix = (options && options.prefix) ? options.prefix : '/laravel-filemanager';
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

                $('#summernote').summernote({
                    height: "200px",
                    toolbar: [
                        ['popovers', ['lfm']],
                        ['style', ['bold', 'italic', 'underline', 'clear']],
                        ['font', ['strikethrough', 'superscript', 'subscript']],
                        ['fontsize', ['fontsize']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph', 'h1', 'blockquote']],
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
                });

                //post form submit
                $("#postFormSubmit").submit(function (e) {
                    e.preventDefault(); // avoid to execute the actual submit of the form.

                    const form = $(this);
                    const url = form.attr('action');


                    $('.btn-save').text('Saving');
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: form.serialize(), // serializes the form's elements.
                        success: function (data, textStatus, xhr) {

                            if (xhr.status === 200) {
                                toastr.success('Data Inserted successfully');
                            }
                        },
                        error: function (e) {
                            let errors = e.responseJSON.errors;
                            Object.keys(errors).forEach(key => {
                                toastr.error(errors[key][0]);
                            });
                        },
                        complete: function () {
                            form.find('input').each(function (e, data) {
                                $('#title').val('');
                                $('#meta_title').val('');
                            });
                            $('#meta_description').val('');

                            $('#summernote').summernote('reset');
                            $('.btn-save').text('Save');
                        }
                    });
                });
            });
        </script>
    @endpush
@endsection
