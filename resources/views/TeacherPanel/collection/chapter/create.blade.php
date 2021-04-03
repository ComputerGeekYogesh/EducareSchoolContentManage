@extends ('layouts.teacher')

@section('content')
<a href= "{{url('chapter')}}"> <button type="button" class="btn btn-warning ml-3 my-2">Back</button>  </a>
<button type="button" class="btn btn-dark float-right mr-3 my-2 ">Logout</button>
<div class="container-fluid mt-3">
        <div class="row">
        <div class="col-md-12 ">
            <div class="card ">
                <div class="card-body my-1">
                    <h6 class= "mb-0">
                         Add Chapter
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

                            <form action="{{url('chapter-store')}}" method="POST" enctype="multipart/form-data">
                                {{csrf_field()}}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Subject Name</label>
                                        <select name="subject_id" class="form-control">
                                         <option value = ""> --Select Subject-- </option>
                                            @foreach ($subject as $gitem)
                                            <option value = "{{$gitem->id}}">{{$gitem->subject_name}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Chapter No</label>
                                        <input type ="text" name="chapter_no" class="form-control" placeholder="Enter chapter No">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Chapter Name</label>
                                        <input type ="text" name="chapter_name" class="form-control" placeholder="Enter Chapter Name" required>
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



