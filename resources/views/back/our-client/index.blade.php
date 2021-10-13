@extends('back.layout.layout')
@section('title','Our Clients')
@section('content')

    <div class="content-header">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                            class="ti-home"></i>&nbsp;Home</a>
                </li>
                <li class="breadcrumb-item active">Our Clients</li>
            </ol>
        </nav>

    </div>

    <div class="container-fluid">
        <div class="card">
            <div class="card-body">

                <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Logo</th>
                            <th>Status</th>
                            <th>Created_at</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($clients as $key=>$client)
                            <tr>
                                <td>
                                    {{ ++$key }}
                                </td>
                                <td>{{$client->name }}</td>
                                <td><img style="height: 100px; width: 100px;"
                                         src="{{ asset('our-client/'.$client->logo) }}"></td>
                                <td>
                                    @if($client->status == 1)
                                        Active
                                    @else
                                        Inactive
                                    @endif
                                </td>
                                <td>
                                    {{ date('d-m-Y',strtotime($client->created_at )) }}
                                </td>
                                <td><a href="{{ route('admin.our-client.edit',$client->id) }}"
                                       class="btn-sm btn btn-primary"><i class="fa fa-pencil-alt"></i></a>

                                    <form style="display: inline-block"
                                          action="{{ route('admin.our-client.destroy',$client->id) }}"
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
