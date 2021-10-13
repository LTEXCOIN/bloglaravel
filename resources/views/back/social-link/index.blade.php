@extends('back.layout.layout')
@section('title','Social Link List')
@section('content')

        <div class="content-header">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="ti-home"></i>&nbsp;Home</a>
                    </li>
                    <li class="breadcrumb-item active">Social Link List</li>
                </ol>
            </nav>

        </div>

        <div class="container">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Social Link List</h4>

                    <div class="table-responsive pt-3">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th style="width: 10%">#</th>
                                <th style="width: 20%"> Name</th>
                                <th style="width: 30%">Link</th>
                                <th style="width: 20%">Status</th>
                                <th style="width: 20%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($links as $key=> $link)
                                <tr>
                                    <td>
                                        {{ ++$key }}
                                    </td>
                                    <td>{{ $link->name }}  </td>
                                    <td><a href="{{ $link->link }}" class="btn-link"
                                           target="_blank">{{ $link->link }}</a></td>
                                    <td>
                                        @if($link->status = 1)

                                            Active

                                        @else
                                            Inactive style="width: 20%;"
                                        @endif
                                    </td>

                                    <td><a href="{{ route('admin.social-link.edit',$link->id) }}"
                                           class="btn-sm btn btn-primary"><i class="fa fa-pencil-alt"></i></a>

                                        <form style="display: inline"
                                              action="{{ route('admin.social-link.destroy',$link->id) }}"
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
