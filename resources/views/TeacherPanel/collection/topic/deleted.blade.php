@extends ('layouts.teacher')

@section('content')
<a href= "{{url('topic')}}"> <button type="button" class="btn btn-warning ml-3 my-2">Back</button>  </a>
<button type="button" class="btn btn-dark float-right mr-3 my-2 ">Logout</button>
<div class="container-fluid mt-3">
        <div class="row">
        <div class="col-md-12 ">
            <div class="card ">
                <div class="card-body my-1">
                    <h6 class= "mb-0">
                         Deleted Topics</h6>
</div></div></div></div>
<div class="row mt-3">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-body">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
        <table class="table table-striped table-bordered">
            <thead>
                <th> ID</th>
                <th> Topic Name</th>
                <th> Re-store</th>
                <th> Permanent Delete</th>
            </thead>
            <tbody>
                @foreach ($topic as $item)
                <tr>
                    <td>{{ $item->id}}</td>
                <td>{{ $item->topic_name}} </td>
                <td>
                    <a href = "{{url('topic-re-store/'.$item->id)}}" class="badge py-2 px-2 btn-success"> Re-Store</a>

                </td>
                <td>

                    <a href = "{{url('topic-permanentdelete/'.$item->id)}}" class="badge py-2 px-2 btn-danger"> Permanent Delete</a>
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







</div>
