@extends ('layouts.admin')

@section('content')
<a href= "{{url('registered-user')}}"> <button type="button" class="btn btn-warning ml-3 my-2">Back</button>  </a>
<button type="button" class="btn btn-dark float-right mr-3 my-2 ">Logout</button>
<div class="container-fluid mt-3 ">
<div class="container-fluid mt-5 ">

      <!-- Heading -->
      <div class="card mb-4 wow fadeIn">

        <!--Card content-->
        <div class="card-body d-sm-flex justify-content-between">

          <h4 class="mb-2 mb-sm-0 pt-1">
            <span>Edit User</span>
          </h4>


        </div>

      </div>
                    <!----heading------>

         <div class="row">
             <div class = "col-md-12">
             <div class = "card">
                <div class = "card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                    <h4> Current Role: {{$user->roles->role_name}}</h4>
                 <form action = "{{url('role-update/'.$user->id)}}" method="POST">
                    {{csrf_field()}}
                    @method('PUT')
                    <div class="row">
                     <div class = "col-md-6">
                     <div class = "form-group">
                        <label for=""> Email</label>
                        <input type="text"  class="form-control" readonly value = "{{$user->email}}">
                    </div> </div>
                    <div class = "col-md-6">
                    <div class="form-group">
                        <label for=""> Role Name</label>
                        <select name="roles" class="form-control">

                            <option value = "{{$user->role_id}}"> {{$user->roles->role_name}} </option>
                            <option value = "1"> Admin </option>
                            <option value = "2"> Student</option>
                            <option value = "3"> Teacher </option>

                        </select>
                        </div> </div>
                        <div class = "col-md-6">
                        <div classs="form-group">
                            <label for=""> Deactivate</label>
                            <select name="deactivate" class="form-control">
                                <option value = ""> {{$user->deactivate}} </option>
                                <option value = "1"> Yes</option>
                                <option value = "0"> No</option>

                            </select> </div> </div>
                            <div class = "col-md-6">
                            <div classs="form-group">
                            <button type= "submit" class="btn btn-primary"> Update</button>
            </div> </div>
            </form>
        </div>
    </div>
</div>



@endsection
