@extends('back.layout.layout')
@section('title','Centers')
@section('content')

        <div class="content-header">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="ti-home"></i>&nbsp;Home</a>
                    </li>
                    <li class="breadcrumb-item active">Centers</li>
                </ol>
            </nav>

        </div>

        <div class="container">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Centers</h4>

                    <div class="table-responsive pt-3">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th> Center Title</th>
                                <th>Address</th>
                                <th>View Order</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($centers as $key=> $center)
                                <tr>
                                    <td>
                                        {{ ++$key }}
                                    </td>
                                    <td>{{ $center->center_title }}  </td>
                                    <td>{{ $center->address }}  </td>
                                    <td class="text-center">{{ $center->view_order }}  </td>


                                    <td><a href="{{ route('admin.center.edit',$center->id) }}"
                                           class="btn-sm btn btn-primary"><i class="fas fa-pencil-alt"></i></a>

                                        <form style="display: none"
                                              action="{{ route('admin.center.destroy',$center->id) }}"
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
