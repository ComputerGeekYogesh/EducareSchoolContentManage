@extends ('layouts.admin')

@section('content')
<a href= "{{url('adminpanel')}}"> <button type="button" class="btn btn-warning ml-3 my-2">Back</button>  </a>
<button type="button" class="btn btn-dark float-right mr-3 my-2 ">Logout</button>
<div class="container-fluid mt-3 ">

      <!-- Heading -->
      <div class="card mb-4 wow fadeIn">

        <!--Card content-->
        <div class="card-body d-sm-flex justify-content-between mt-3">

          <h4 class="mb-2 mb-sm-0 pt-1">

            <span>Registered Users</span>
          </h4>


        </div>

      </div>
                    <!----heading------>

         <div class="row">
        <div class = "col-md-6">
            <form action = "{{url('registered-user')}}" method="GET">
                <div class="row">
                    <div class = "col-md-8">
                        <div class= "form-group">
                            <select name = "roles" class= "form-control">
                                @if(isset($_GET['roles']))
                                <option value="{{ $_GET['roles']}}">{{ $_GET['roles']}} </option>
                                <option value="1">Admin </option>
                                <option value="2">Student </option>
                                <option value="3">Teacher </option>
                                @else
                                <option value="--Select Role--"> --Select Role--</option>
                                <option value="1">Admin </option>
                                <option value="2">Student </option>
                                <option value="3">Teacher </option>
                                @endif
                            </select>
                        </div>
                    </div>
                        <div class = "col-md-4">
                            <button type = "submit" class="btn btn-primary py-1">Filter </button>
                        </div>    </div>

            </form>   </div>
            <div class = "col-md-6">
                <a href="{{url('user-deleted-records')}}" class="badge bg-danger p-2 text-white float-right ml-2 "> Deleted User</a>

            </div>
             <div class = "col-md-12">
             <div class = "card">
                <div class = "card-body">
                    @if (session('status'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                    <table id = "datatable1" class = "table table-bordered table-striped">

                            <thead>
                          <tr>
                            <th> ID </th>
                            <th> Email </th>
                            <th> Role Name</th>
                            <th> Deactivate </th>
                            <th> Edit </th>
                            <th> Delete </th>
                          </tr>
                        </thead>
 <tbody>
     @foreach($users as $item)
<tr>
<td> {{$item->id}} </td>
<td> {{$item->email}} </td>
<td> {{$item->roles->role_name}} </td>
<td>
    @if($item->deactivate=="0")
   <label class="py-2 px-3 badge btn-success"> No  </label>
    @elseif($item->deactivate=="1")
    <label class="py-2 px-3 badge btn-warning"> Yes </label>

    @endif

</td>
<td>
    <a href = "{{url('role-edit/'.$item->id)}}" class="badge badge-pill btn-primary px-3 py-2"> Edit </a> <br>
</td>
<td>
    <a href = "{{url('user-delete/'.$item->id)}}" class="badge badge-pill btn-danger px-3 py-2"> Delete </a>
</td>

</tr>
@endforeach
 </tbody>

                        </table>
                       {{--<div class="float-right" {{$users->links()}} </div>--}}
                       <style>
                        .w-5{
                            display:none;
                        }
                    </style>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection


@section('script')
<script>
    $(document).ready( function () {
    $('#datatable1').DataTable();
} );
</script>

@endsection
