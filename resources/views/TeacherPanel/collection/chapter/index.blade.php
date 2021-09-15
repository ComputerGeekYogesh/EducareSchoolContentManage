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
                         All Chapters
        <a href="{{url('chapter-deleted-records')}}" class="badge bg-danger p-2 text-white float-right ml-2 "> Deleted Chapters</a>
         <a href="{{url('chapter-add')}}" class="badge bg-primary p-2 text-white float-right "> Add Chapters</a>
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
                <th> Subject Name</th>
                <th> Chapter No</th>
                <th> Chapter Name</th>
                <th> Edit</th>
                <th> Delete</th>
            </thead>
            <tbody>
                @foreach ($chapter as $item)
                <tr>
                    <td>{{ $item->id}}</td>
                <td>{{$item->subjects->subject_name}}</td>
                <td>{{ $item->chapter_no}}</td>
                <td>{{ $item->chapter_name}}</td>
                <td>
                    <a href = "{{url('chapter-edit/'.$item->id)}}" class="badge  py-2 px-2 btn-primary "> EDIT </a>

                </td>
                <td>

                    <a href = "{{url('chapter-delete/'.$item->id)}}" class="badge  py-2 px-2 btn-danger"> Delete </a>
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

