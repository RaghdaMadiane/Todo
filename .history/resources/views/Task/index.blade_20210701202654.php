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
