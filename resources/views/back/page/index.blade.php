@extends('back.layout.layout')
@section('title','Page List')
@section('content')

    <div class="content-header">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                            class="ti-home"></i>&nbsp;Home</a>
                </li>
                <li class="breadcrumb-item active">Page List</li>
            </ol>
        </nav>

    </div>

    <div class="container-fluid">


        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Page List</h4>

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
                        @foreach($pages as $key=> $page)
                            <tr>
                                <td>
                                    {{ ++$key }}
                                </td>
                                <td>{{ $page->title }}</td>
                                <td><img class="img-fluid" style="width: 100px; height: 100px"
                                         src="{{ asset('page/'.$page->thumbnail) }}" alt=""></td>
                                <td>{{ $page->type }}  </td>
                                <td>{{ substr($page->description,0,20) }}  </td>

                                <td>
                                    {{ date('d-m-Y',strtotime( $page->created_at )) }}
                                </td>
                                <td><a href="{{ route('admin.page.edit',$page->id) }}"
                                       class="btn-sm btn btn-primary"><i class="fas fa-pencil-alt"></i></a>

                                    <form style="display: inline-block"
                                          action="{{ route('admin.page.destroy',$page->id) }}"
                                          method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button onclick="return(confirm('are you sure to delete?'))"
                                                class="btn btn-danger btn-sm" type="submit"><i
                                                class="fas fa-trash"></i></button>

                                    </form>

                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row ml-3">
                {{ $pages->links() }}
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
