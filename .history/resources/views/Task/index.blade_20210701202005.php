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
            <img src="data:image/png;base64,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">
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
