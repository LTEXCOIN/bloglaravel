@extends('back.layout.layout')
@section('title','Edit Content')
@section('content')
        <div class="content-header">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="ti-home"></i>&nbsp;Home</a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.team-member.index') }}">Team Member</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Team Member</li>
                </ol>
            </nav>

        </div>
        <div class="container">
            <div class="card">
                <div class="card-body">

                    <form class="forms-sample" action="{{ route('admin.team-member.update',$team_member->id) }}"
                          enctype="multipart/form-data" method="POST">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Title</label>
                                    <input name="name" type="text" class="form-control"
                                           value="{{ (!empty(old('name'))) ? old('name') : $team_member->name }}"
                                           placeholder="Name">
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <p
                                                class="text-red">{{ $errors->first('name') }}</p> </span>
                                    @endif
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Title(ja)</label>
                                    <input name="name_ja" type="text" class="form-control"
                                           value="{{ (!empty(old('name_ja'))) ? old('name_ja') : $team_member->name_ja }}"
                                           placeholder="Name">
                                    @if ($errors->has('name_ja'))
                                        <span class="help-block">
                                            <p
                                                class="text-red">{{ $errors->first('name_ja') }}</p> </span>
                                    @endif
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Designation</label>
                                    <input name="designation" type="text" class="form-control"
                                           value="{{ (!empty(old('designation'))) ? old('designation') : $team_member->designation }}"
                                           placeholder="Designation">
                                    @if ($errors->has('designation'))
                                        <span class="help-block">
                                            <p
                                                class="text-red">{{ $errors->first('designation') }}</p> </span>
                                    @endif
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Designation(ja)</label>
                                    <input name="designation_ja" type="text" class="form-control"
                                           value="{{ (!empty(old('designation_ja'))) ? old('designation_ja') : $team_member->designation_ja }}"
                                           placeholder="Designation">
                                    @if ($errors->has('designation_ja'))
                                        <span class="help-block">
                                            <p
                                                class="text-red">{{ $errors->first('designation_ja') }}</p> </span>
                                    @endif
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Email</label>
                                    <input name="email" type="text" class="form-control"
                                           value="{{ (!empty(old('email'))) ? old('email') : $team_member->email }}"
                                           placeholder="Email">
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <p
                                                class="text-red">{{ $errors->first('email') }}</p> </span>
                                    @endif
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Contact</label>
                                    <input name="contact" type="text" class="form-control"
                                           value="{{ (!empty(old('contact'))) ? old('contact') : $team_member->contact }}"
                                           placeholder="Contact">
                                    @if ($errors->has('contact'))
                                        <span class="help-block">
                                            <p
                                                class="text-red">{{ $errors->first('contact') }}</p> </span>
                                    @endif
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Contact(ja)</label>
                                    <input name="contact_ja" type="text" class="form-control"
                                           value="{{ (!empty(old('contact_ja'))) ? old('contact_ja') : $team_member->contact_ja }}"
                                           placeholder="Contact">
                                    @if ($errors->has('contact_ja'))
                                        <span class="help-block">
                                            <p
                                                class="text-red">{{ $errors->first('contact_ja') }}</p> </span>
                                    @endif
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Image</label>
                                    <input type="file" name="photo">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Description</label>
                                    <textarea name="text" cols="30" rows="5" class="form-control"
                                              placeholder="Enter some text here">{{ (!empty(old('text'))) ? old('text') : $team_member->text }}</textarea>
                                    @if ($errors->has('text'))
                                        <span class="help-block">
                                            <p class="text-red">{{ $errors->first('text') }}</p> </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Description(ja)</label>
                                    <textarea name="text_ja" cols="30" rows="5" class="form-control"
                                              placeholder="Enter some text here">{{ (!empty(old('text_ja'))) ? old('text_ja') : $team_member->text_ja }}</textarea>
                                    @if ($errors->has('text_'))
                                        <span class="help-block">
                                            <p class="text-red">{{ $errors->first('text_ja') }}</p> </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Status</label>
                                    <select name="status" class="form-control">
                                        <option value="1" @if($team_member->status == 1) selected @endif>Active
                                        </option>
                                        <option value="0" @if($team_member->status == 0) selected @endif>Inactive
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
@endsection
