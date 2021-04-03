
@extends ('layouts.teacher')

@section('content')
<a href= "{{url('teacherpanel')}}"> <button type="button" class="btn btn-warning ml-3 my-2">Back</button>  </a>
<button type="button" class="btn btn-dark float-right mr-3 my-2 ">Logout</button>
<div class="container-fluid mt-3">
        <div class="row">
        <div class="col-md-12 ">
            <div class="card ">
                <div class="card-body my-1">
                    <h6 class= "mb-0">
                         All Classes
        <a href="{{url('classes-deleted-records')}}" class="badge bg-danger p-2 text-white float-right ml-2 "> Deleted Classes</a>
         <a href="{{url('classes-add')}}" class="badge bg-primary p-2 text-white float-right "> Add Classes</a>
    </h6>
</div></div></div></div>
    <div class="row mt-3
    ">
        <div class="col-md-12">
            <div class="card ">
                @if (session('status'))
                <div class="alert alert-danger" role="alert">
                    {{ session('status') }}
                </div>
            @endif
                <div class="card-body">
            <table class="table table-striped table-bordered">
                <thead>
                    <th> ID</th>
                    <th> Class Name</th>
                    <th> Edit</th>
                    <th> Delete</th>
                </thead>
                <tbody>
                    @foreach ($classes as $item)
                    <tr>
                        <td>{{ $item->id}}</td>
                    <td>{{ $item->class_name}}</td>
                    <td>
                        <a href = "{{url('classes-edit/'.$item->id)}}" class="badge  py-2 px-2 btn-primary "> EDIT </a>

                    </td>
                    <td>

                        <a href = "{{url('classes-delete/'.$item->id)}}" class="badge  py-2 px-2 btn-danger"> Delete </a>
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
