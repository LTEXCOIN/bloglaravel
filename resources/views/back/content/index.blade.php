@extends('back.layout.layout')
@section('title','Content List')
@section('content')

        <div class="content-header">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="ti-home"></i>&nbsp;Home</a>
                    </li>
                    <li class="breadcrumb-item active">Content List</li>
                </ol>
            </nav>

        </div>

        <div class="container-fluid">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Content List</h4>

                        <div class="table-responsive pt-3">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th> Title</th>
                                    <th>Image</th>
                                    <th>Type</th>
                                    <th>Description</th>
                                    <th>Created_at</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($contents as $key=> $content)
                                    <tr>
                                        <td>
                                            {{ ++$key }}
                                        </td>
                                        <td>{{ $content->title }}</td>
                                        <td><img style="width: 100px; height: 100px" src="{{ asset('content/'.$content->thumbnail) }}" alt=""></td>
                                        <td>{{ $content->type }}  </td>
                                        <td>{{ substr($content->description,0,20) }}  </td>

                                        <td>
                                            {{ date('d-m-Y',strtotime( $content->created_at )) }}
                                        </td>
                                        <td><a href="{{ route('admin.content.edit',$content->id) }}"
                                               class="btn-sm btn btn-primary"><i class="fa fa-pencil-alt"></i></a>

                                            <form style="display: inline-block"
                                                  action="{{ route('admin.content.destroy',$content->id) }}"
                                                  method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <button onclick="return(confirm('are you sure to delete?'))"
                                                        class="btn btn-danger btn-sm" type="submit"><i
                                                        class="fa fa-trash-alt"></i></button>

                                            </form>

                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>




    <script>

        $('.delete-user').click(function (e) {

            e.preventDefault() // Don't post the form, unless confirmed
            if (confirm('Are you sure?')) {
                // Post the form
                $(e.target).closest('form').submit() // Post the surrounding form
            }
        });
    </script>
@endsection
