@extends('back.layout.layout')
@section('title','Edit Client')
@section('content')
    <div class="content-header">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                            class="ti-home"></i>&nbsp;Home</a>
                </li>
                <li class="breadcrumb-item"><a href="{{ route('admin.our-client.index') }}">Client List</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Client</li>
            </ol>
        </nav>

    </div>
    <div class="container">
        <div class="col-md-10 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <form class="forms-sample" action="{{ route('admin.our-client.update',$our_client->id) }}"
                          enctype="multipart/form-data" method="POST">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Name</label>
                                    <input name="name" type="text" class="form-control"
                                           value="{{ (!empty(old('name'))) ? old('name') : $our_client->name }}"
                                           placeholder="Name">
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <p
                                                class="text-red">{{ $errors->first('name') }}</p> </span>
                                    @endif
                                </div>

                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Image</label>
                                    <input type="file" name="logo">
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Status</label>
                                    <select name="status" class="form-control">
                                        <option @if(!empty(old('status')) && old('status') == 1) selected
                                                @elseif($our_client->status == 1) selected
                                                @endif value="1">Active
                                        </option>
                                        <option @if(!empty(old('status')) && old('status') == 0) selected
                                                @elseif($our_client->status == 0) selected
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
