@extends('layouts.master')
@section('title')
    @lang('translation.User')
@endsection

@section('content')
    @component('common-components.breadcrumb')
        @slot('pagetitle') Users @endslot
        @slot('title') User List @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
             @if (session()->has('updated'))
            <div class="alert alert-warning">
          {{ session('updated') }}
          </div>
           @endif
       @if (session()->has('deleted'))
            <div class="alert alert-danger">
          {{ session('deleted') }}
         </div>
         @endif
         @if (session()->has('created'))
            <div class="alert alert-success">
          {{ session('created') }}
    </div>
      @endif

            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <a href="{!!route('users.create')!!}" class="btn btn-success waves-effect waves-light"><i
                                        class="mdi mdi-plus me-2"></i> Add New User</a>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-inline float-md-end mb-3">
                                <div class="search-box ms-2">
                                    <div class="position-relative">
                                        <input type="text" class="form-control rounded bg-light border-0"
                                            placeholder="Search...">
                                        <i class="mdi mdi-magnify search-icon"></i>
                                    </div>
                                </div>

                            </div>
                        </div>


                    </div>
                    <!-- end row -->
                    <div class="table-responsive mb-4">
                        <table class="table table-centered table-nowrap mb-0">
                            <thead>
                                <tr>
                                    
                                    <th scope="col">Name</th>
                                      <th scope="col">CNIC</th>
                                       <th scope="col">Phone</th>
                                         <th scope="col">Email</th>
                                        <th scope="col">Position</th>
                                        <th scope="col">Department</th>
                                       <th scope="col">Roles</th>
                                    <th scope="col" style="width: 200px;">Action</th>
                                </tr>
                             </thead>
                            <tbody>
                                @foreach($users as $user)
                            <tr>
                                    
                        <td>
                    <img src="{{ URL::asset('/assets/images/users/avatar-2.jpg') }}" alt=""
                         class="avatar-xs rounded-circle me-2">
                           <a href="#" class="text-body">{!!$user->name!!}</a>
                             </td>
                                <td>{!!$user->cnic!!}</td>
                                  <td>{!!$user->phone!!}</td>
                                    <td>{!! $user->email !!}</td>
                                 <td>{!!$user->position!!}</td>
                                  <td>{!!$user->department!!}</td>
                                <td>@if(!empty($user->getRoleNames()))
                                  @foreach($user->getRoleNames() as $v)
                                  <label class="badge bg-primary">{{ $v }}</label>
                                  @endforeach
                                  @endif
                                </td>
                               <td>
                              <ul class="list-inline mb-0">
                                 <li class="list-inline-item">
                                    <a href="{!!route('users.edit',$user->id)!!}" class="px-2 text-primary"><i
                                 class="uil uil-pen font-size-18"></i> </a>
                               </li>
                            <li class="list-inline-item">

                        <form action="{{route('users.destroy',$user->id)}}" method="POST">
                        {{method_field('DELETE')}}
                       {{ csrf_field() }}

                    
                      <button type="submit" class="btn btn-danger btn-sm" id="delete">
                     <i class="uil uil-trash-alt"></i>
                   </button>
                   </form>
                </li>
               </ul>
            </td>
        </tr>
      @endforeach
           </tbody>
              </table>
                  </div>
                    <div class="row mt-4" align="center">
                        <div class="col-sm-4">
                            <div>
                                <p class="mb-sm-0">Showing 1 to 12 entries</p>
                            </div>
                        </div>
                        <div class="col-sm-6" align="center" >
                            <div class="float-sm-end">
                                <ul class="pagination mb-sm-0">
                                    <li class="page-item disabled">

                                        {{ $users->links() }}
                                    
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
<script type="text/javascript">
  $(function () {
  $('#delete').on('click', function (e) {
    if (!confirm('Are you sure you want to delete?')) return;
    e.preventDefault();
    $('#delete-' + $(this).data('form')).submit();
  });
});
</script>
@endsection
