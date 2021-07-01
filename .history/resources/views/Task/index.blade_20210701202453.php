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
