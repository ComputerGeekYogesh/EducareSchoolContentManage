@extends ('layouts.teacher')

@section('content')
<a href= "{{url('classes')}}"> <button type="button" class="btn btn-warning ml-3 my-2">Back</button>  </a>
<button type="button" class="btn btn-dark float-right mr-3 my-2 ">Logout</button>
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-body">
                    <h6> Edit Class</h6>
                </div>
            </div>
            </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="card ">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <div class="card-body">

                            <form action="{{url('classes-update/'. $classes->id)}}" method="POST">
                                {{csrf_field()}}
                                {{method_field('PUT')}}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Class Name</label>
                                        <input type ="text" name="class_name" value="{{$classes->class_name}}" class="form-control" placeholder="Enter Class Name">
                                    </div>
                                </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-info">Update</button>
                                            </div>
                                        </div>

                        </div>
                            </form>
                    </div>
            </div>
            </div>
@endsection



