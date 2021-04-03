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
                         Edit Topic</h6>
</div></div></div></div>

<div class="row mt-3
">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-body">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
                <form action="{{url('topic-update/'.$topic->id)}}" method="POST" enctype="multipart/form-data">
                   @csrf
                    {{method_field('PUT')}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Chapter Name</label>
                                <select name="chapter_id" class="form-control">
                                    <option value = "{{$topic->chapter_id}}"> {{$topic->chapters->chapter_name}}</option>

                                    @foreach ($chapter as $cateitem)
                                    <option value = "{{$cateitem->id}}">{{$cateitem->chapter_name}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Topic Name</label>
                                <input type ="text" name="topic_name" value="{{$topic->topic_name}}" class="form-control" placeholder="Enter URL" required>
                            </div>
                        </div>

                                <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Update </button>
                                </diV>
                            </div>



            </div>
        </form>
        </div>
        </div>
        </div>
        </div>

        </div>
        @endsection
