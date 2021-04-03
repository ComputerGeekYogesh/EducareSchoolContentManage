@extends ('layouts.admin')


@section('content')
<button type="button" class="btn btn-success ml-3 my-2"> Welcome into Admin Panel</button>
<a href="{{ route('logout') }}" onclick="event.preventDefault();
document.getElementById('logout-form').submit();">
<button type="button" class="btn btn-dark float-right mr-3 my-2 ">Logout</button>
</a>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>

<div class="container-fluid mt-3">
    <div class="row">
    <div class="col-md-12 ">
        <div class="card ">
            <div class="card-body my-1">
                <h6 class= "mb-0">
                     Home page / Admin Panel
{{-- <div class="container-fluid mt-5"> --}}

      <!-- Heading -->
      {{-- <div class="card mb-4 wow fadeIn"> --}}

        <!--Card content-->
        {{-- <div class="card-body pt-5">

          <h4 class="mb-2 mb-sm-0 pt-1">
            {{-- <a href="" target="_blank">Home Page</a> --}}
            {{-- <span>/</span> --}}
            {{-- <span>Teacher Panel</span>
          </h4>

          {{-- <form class="d-flex justify-content-center">
            <!-- Default input -->
            <input type="search" placeholder="Type your query" aria-label="Search" class="form-control">
            <button class="btn btn-primary btn-sm my-0 p" type="submit">
              <i class="fa fa-search"></i>
            </button>

          </form> --}}

        {{-- </div>

      </div>--}}



@endsection
