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
