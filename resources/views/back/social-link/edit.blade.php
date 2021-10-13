@extends('back.layout.layout')
@section('title','Create Center')
@section('content')

        <div class="content-header">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="ti-home"></i>&nbsp;Home</a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.content.index') }}">Social Link</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add Social Link</li>
                </ol>
            </nav>

        </div>
        <div class="container">
            <div class="card">

                <div class="card-body">

                    <form class="forms-sample" action="{{ route('admin.social-link.store') }}" method="POST">
                        @csrf
                        @method('post')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Social Link Title</label>
                                    <select name="name" class="form-control">
                                        <option value="">Select Platform</option>
                                        <option @if(!empty(old('name')) && old('name') == 'Facebook') selected
                                                @elseif($social_link->name == 'Facebook') selected
                                                @endif value="Facebook">Facebook
                                        </option>
                                        <option @if(!empty(old('name')) && old('name') == 'Instagram') selected
                                                @elseif($social_link->name == 'Instagram') selected
                                                @endif value="Instagram">Instagram
                                        </option>
                                        <option @if(!empty(old('name')) && old('name') == 'Linkedin') selected
                                                @elseif($social_link->name == 'Linkedin') selected
                                                @endif value="Linkedin">Linkedin
                                        </option>
                                        <option @if(!empty(old('name')) && old('name') == 'Tumblr') selected
                                                @elseif($social_link->name == 'Tumblr') selected
                                                @endif value="Tumblr">
                                            Tumblr
                                        </option>
                                        <option @if(!empty(old('name')) && old('name') == 'Twitter') selected
                                                @elseif($social_link->name == 'Twitter') selected
                                                @endif value="Twitter">Twitter
                                        </option>

                                    </select>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <p
                                                class="text-red">{{ $errors->first('name') }}</p> </span>
                                    @endif
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Link</label>
                                    <input name="link" type="text" class="form-control"
                                           value="{{ (!empty(old('link'))) ? old('link') : $social_link->link }}"
                                           placeholder="https://facebook.com/your-page-link">
                                    @if ($errors->has('link'))
                                        <span class="help-block">
                                            <p
                                                class="text-red">{{ $errors->first('link') }}</p> </span>
                                    @endif
                                </div>

                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Status</label>
                                    <select name="status" id="" class="form-control">
                                        <option @if(!empty(old('status')) && old('status') == 1) selected
                                                @elseif($social_link->status == 0) selected
                                                @endif value="1">Active
                                        </option>
                                        <option @if(!empty(old('status')) && old('status') == 0) selected
                                                @elseif($social_link->status == 0) selected
                                                @endif value="0">Inactive
                                        </option>
                                    </select>
                                    @if ($errors->has('view_order'))
                                        <span class="help-block">
                                            <p class="text-red">{{ $errors->first('view_order') }}</p> </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success btn-save mr-2">Update</button>
                        <button class="btn btn-info">Back</button>
                    </form>
                </div>
            </div>
        </div>
@endsection