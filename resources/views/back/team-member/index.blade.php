@extends('back.layout.layout')
@section('title','Team Members')
@section('content')
        <div class="content-header">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="ti-home"></i>&nbsp;Home</a>
                    </li>
                    <li class="breadcrumb-item active">Team Members</li>
                </ol>
            </nav>

        </div>

       <div class="container">
           <div class="card">
               <div class="card-body">
                   <h4 class="card-title">Content List</h4>

                   <div class="table-responsive pt-3">
                       <table class="table table-bordered">
                           <thead>
                           <tr>
                               <th>#</th>
                               <th>Name</th>
                               <th>Designation</th>
                               <th>Email</th>
                               <th>Contact</th>
                               <th>Photo</th>
                               <th>Text</th>
                               <th>Created_at</th>
                               <th>Action</th>
                           </tr>
                           </thead>
                           <tbody>
                           @foreach($team_members as $key=> $team_member)
                               <tr>
                                   <td>
                                       {{ ++$key }}
                                   </td>
                                   <td>{{ $team_member->name }}</td>
                                   <td>{{ $team_member->designation }}  </td>
                                   <td>{{ $team_member->email }}  </td>
                                   <td>{{ $team_member->contact }}  </td>
                                   <td><img style="width: 100px; height: 100px" src="{{ asset('team-member/'.$team_member->photo) }}"></td>
                                   <td>{{ substr($team_member->description,0,20) }}  </td>

                                   <td>
                                       {{ date('d-m-Y',strtotime( $team_member->created_at )) }}
                                   </td>
                                   <td><a href="{{ route('admin.team-member.edit',$team_member->id) }}"
                                          class="btn-sm btn btn-primary"><i class="fa fa-pencil-alt "></i></a>

                                       <form style="display: inline-block"
                                             action="{{ route('admin.team-member.destroy',$team_member->id) }}"
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
