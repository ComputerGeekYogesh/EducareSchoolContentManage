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
                         Add Topic
    </h6>
</div></div></div></div>

            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="card ">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <div class="card-body">

                            <form action="{{url('topics-store')}}" method="POST" enctype="multipart/form-data">
                              @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Chapter Name</label>
                                        <select name="chapter_id" class="form-control">
                                         <option value = ""> --Select Chapter-- </option>
                                            @foreach ($chapter as $gitem)
                                            <option value = "{{$gitem->id}}">{{$gitem->chapter_name}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Topic Name</label>
                                        <input type ="text" name="topic_name" class="form-control" placeholder="Enter Topic Name" required>
                                    </div>
                                </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </div>


                        </div>
                            </form>
                    </div>
            </div>
            </div>
@endsection



