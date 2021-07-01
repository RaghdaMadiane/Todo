@extends('layouts.app')
@section('content')
   <!-- Current Tasks -->

 <div  class="card container" style="background-image: url('https://s3.amazonaws.com/html5.powershow.com/3854039/data/img4.png') ">
   @if (count($tasks) > 0)
   <div class="card-body" style="overflow-x:auto;">
    <h3 class="text-center">Tasks</h3>
        <table class="table table-borderless  m-5" >              <!-- Table Headings -->

               <!-- Table Body -->
               <tbody >
                   @foreach ($tasks as $task)
                       <tr>
                           <!-- Task Name -->
                           <td class="table-text " style="width:900px" >
                               <li class="w-75"> {{ $task->name }}</li>
                           </td>

                           <td class="table-text ">
                               <!-- TODO: Delete Button -->

                                <div class="dropdown ml-4">
                                    <button class="btn btn-default" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="bi bi-three-dots-vertical"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                      <button class="dropdown-item" onclick="window.location='{{ url('Task/'.$task->id .'/edit') }}'" >Edit</button>

                                    <form action="{{ url('/Task/delete/'.$task->id) }}" method="POST">
                                        {!! csrf_field() !!}
                                        {!! method_field('DELETE') !!}
                                      <button class="dropdown-item" >Delete</button>
                                    </form>
                                    </div>
                                  </div>
                           </td>
                       </tr>
                   @endforeach
               </tbody>
        </table>
        @else
        <div class="text-center m-5">
            <img src="data:image/jpeg;base64,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">
            <h4 class="m-5 text-muted">No Task Here yet</h4>

        </div>

        @endif


        <div class=" d-flex justify-content-end m-5" >

             <button  class="  btn btn-warning rounded-circle"  onclick="window.location='{{ url('Task/newtask') }}'">
                <i class="bi bi-plus-lg"></i>
             </button>
        </div>
    </div>
</div>

@endsection
