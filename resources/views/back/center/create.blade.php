@extends('back.layout.layout')
@section('title','Create Center')
@section('content')

        <div class="content-header">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="ti-home"></i>&nbsp;Home</a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.content.index') }}">Center</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add Center</li>
                </ol>
            </nav>

        </div>
        <div class="container">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">

                        <form class="forms-sample" action="{{ route('admin.center.store') }}" method="POST">
                            @csrf
                            @method('post')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Center Title</label>
                                        <input name="center_title" type="text" class="form-control"
                                               value="{{ old('center_title') }}"
                                               placeholder="Title">
                                        @if ($errors->has('center_title'))
                                            <span class="help-block">
                                            <p
                                                class="text-red">{{ $errors->first('center_title') }}</p> </span>
                                        @endif
                                    </div>

                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <textarea name="address" cols="30" rows="5" class="form-control"
                                                  placeholder="Enter address here"></textarea>
                                        @if ($errors->has('address'))
                                            <span class="help-block">
                                            <p class="text-red">{{ $errors->first('address') }}</p> </span>
                                        @endif
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Center order</label>
                                        <input type="number" name="view_order" min="1" max="3" class="form-control">
                                        @if ($errors->has('view_order'))
                                            <span class="help-block">
                                            <p class="text-red">{{ $errors->first('view_order') }}</p> </span>
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
        </div>
@endsection
