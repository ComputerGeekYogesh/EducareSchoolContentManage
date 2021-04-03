@extends ('layouts.teacher')

@section('content')
<a href= "{{url('subject')}}"> <button type="button" class="btn btn-warning ml-3 my-2">Back</button>  </a>
<button type="button" class="btn btn-dark float-right mr-3 my-2 ">Logout</button>
<div class="container-fluid mt-3">
        <div class="row">
        <div class="col-md-12 ">
            <div class="card ">
                <div class="card-body my-1">
                    <h6 class= "mb-0">
                         Edit Subject</h6>
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

                            <form action="{{url('subject-update/'.$subject->id)}}" method="POST" enctype="multipart/form-data">
                                {{csrf_field()}}
                                {{method_field('PUT')}}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Class Name</label>
                                        <select name="class_id" class="form-control">
                                            <option value = "{{$subject->class_id}}"> {{$subject->classes->class_name}} </option>
                                            @foreach ($classes as $gitem)
                                            <option value = "{{$gitem->id}}">{{$gitem->class_name}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Subject Name</label>
                                        <input type ="text" name="subject_name" class="form-control" value="{{$subject->subject_name}}" placeholder="Enter Name">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Subject Code</label>
                                        <input type ="text" name="subject_code" value="{{$subject->subject_code}}" class="form-control" placeholder="Enter URL" required>
                                    </div>
                                  </div>


                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </div>
                                        </div>

                        </div>
                            </form>
                    </div>
            </div>
            </div>
@endsection



