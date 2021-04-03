
@extends ('layouts.admin')

@section('content')
<a href= "{{url('registered-user')}}"> <button type="button" class="btn btn-warning ml-3 my-2">Back</button>  </a>
<button type="button" class="btn btn-dark float-right mr-3 my-2 ">Logout</button>
<div class="container-fluid mt-3">
        <div class="row ">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-body">
                    <h6 class= "mb-0">Deleted User

    </h6>
</div></div></div></div>
    <div class="row mt-3
    ">
        <div class="col-md-12">
            <div class="card ">
                @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                <div class="card-body">
            <table class="table table-striped table-bordered">
                <thead>
                    <th> ID</th>
                    <th> Name</th>
                    <th> Email</th>
                    <th> Role ID</th>
                    <th> Deactivate</th>
                    <th> Re-store</th>
                    <th> Permanent Delete</th>
                </thead>
                <tbody>
                    @foreach ($user as $item)
                    <tr>
                        <td>{{ $item->id}}</td>
                    <td>{{ $item->name}}</td>
                    <td>{{ $item->email}}</td>
                    <td> {{$item->roles->role_name}} </td>
                    <td>
                        @if($item->deactivate=="0")
                       <label class="py-2 px-3 badge btn-success"> No  </label>
                        @elseif($item->deactivate=="1")
                        <label class="py-2 px-3 badge btn-warning"> Yes </label>

                        @endif

                    </td>
                    <td>
                        <a href = "{{url('user-re-store/'.$item->id)}}" class="badge py-2 px-2 btn-success"> Re-Store</a>

                    </td>
                    <td>

                        <a href = "{{url('user-permanentdelete/'.$item->id)}}" class="badge py-2 px-2 btn-danger"> Permanent Delete</a>
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
</div>
@endsection
