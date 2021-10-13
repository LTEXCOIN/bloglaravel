@extends('back.layout.layout')
@section('title','Update Center')
@section('content')

        <div class="content-header">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="ti-home"></i>&nbsp;Home</a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.content.index') }}">Center</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Update Center</li>
                </ol>
            </nav>

        </div>
        <div class="container">
            <div class="card">
                <div class="card-body">

                    <form class="forms-sample" action="{{ route('admin.center.update',$center->id) }}"
                          method="post">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Center Title</label>
                                    <input name="center_title" type="text" class="form-control"
                                           value="@if(!empty(old('center_title'))) {{ old('center_title') }} @else {{ $center->center_title }} @endif"
                                           placeholder="Title">
                                    @if ($errors->has('center_title'))
                                        <span class="help-block">
                                            <p
                                                class="text-red">{{ $errors->first('center_title') }}</p> </span>
                                    @endif
                                </div>

                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Address</label>
                                    <textarea name="address" cols="30" rows="5" class="form-control"
                                              placeholder="Enter address here">@if(!empty(old('address'))){{ old('address') }}@else{{ $center->address }} @endif</textarea>
                                    @if ($errors->has('address'))
                                        <span class="help-block">
                                            <p
                                                class="text-red">{{ $errors->first('address') }}</p> </span>
                                    @endif
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Address(Ja)</label>
                                    <textarea name="address_ja" cols="30" rows="5" class="form-control"
                                              placeholder="Enter address here">@if(!empty(old('address_ja'))){{ old('address_ja') }}@else{{ $center->address_ja }} @endif</textarea>
                                    @if ($errors->has('address_ja'))
                                        <span class="help-block">
                                            <p class="text-red">{{ $errors->first('address_ja') }}</p> </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Center order</label>
                                    <input type="number" name="view_order" min="1" max="3"
                                           value="@if(!empty(old('view_order'))) {{ old('view_order') }}@else{{ $center->view_order }}@endif"
                                           class="form-control">
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
