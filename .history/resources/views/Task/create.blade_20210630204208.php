@extends('layouts.app')
@section('content')
<div class="panel-body"  style="background-img: rgb(51, 48, 48)">
    <!-- Display Validation Errors -->
    @include('common.error')

    <!-- New Task Form -->
    <form action="{{ url('task') }}" method="POST" class="form-horizontal">
        {!! csrf_field() !!}

        <!-- Task Name -->
        <div class="form-group text-center">
            <label for="task" class="control-label text-white  h1">Add Task Here</label>
        </div>
        <div class="row container m-5">
            <div class="col-sm-6 mb-5 ">
                <input type="text" name="name" id="task-name" class=" form-control">
            </div>
               <!-- Add Task Button -->
            <div class="col-sm-offset-6 mb-5">
                <button type="submit" class="btn btn-warning">
                    <i class="bi bi-check-circle  "></i>
                </button>
            </div>
        </div>
        </div>



    </form>
    <div class="m-2 h5">
        <a href="/">Back</a>
        </div>
</div>
@endsection
