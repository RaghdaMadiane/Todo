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
            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAgVBMVEX///8AAACTk5P6+vrw8PAeHh6cnJwICAiZmZnr6+saGhqOjo709PQhISH39/fHx8dpaWnm5ubU1NR7e3tcXFzKysovLy/BwcGqqqqkpKTf398QEBBNTU1SUlJ6enpCQkJGRkaFhYUpKSk3NzexsbHZ2dljY2M6OjotLS1ycnK4uLjUPoAUAAAJNUlEQVR4nO2daWPiIBCGE2Or8awa612Nx3br//+B23YbIAkwEMbBdXk+ahzmNYRjwkAU0TFdZcdNvDlmqylhqWQkrViklfh2CJtVXOXZt0uotPc1gXG8b/t2C4+1RN8Xa9+OYaES+DAS20qBcTzw7RwKW43CrW/nMKi3oiIr3+65MxL1dOeDaDDvih+NfDvojNDRt2Qfdj36hsOGaZkLn87ZpxtvniExZlKupc+v7POxJ8/qJPPlszWrrBDyq2KOfZGt7M0u5/jD2gXzqCGXisGLo71sgapv+u7oTzys2XxyNblHnIPpuzQjZjWjM3ejaJ1p390XyVzpGcFqH0cgwh2U/d03MtuAKYYncf2ZuZVdew4YjmQSw66t8zcHd4ELDD8yWfeVoEh07zR+cWP7vKukz0Znrdp3S1VVmi9r17IR66avLiwXgiIvrgIHzNRG+2+1h8V1bqONpDAz1EZxFh3ml+skmrcH+uqQDnFKZP/oMNVexx8e17ZmWRgCZuPUCnnkYOlUXhSx2Wquv45cYV5c6DrBZE9+S38duUJTx0CCwoKg0JSg0NoxkKCwICg0JSi0dgzE1FD7iKzwCLw/JVeYnIoL3UbCLBh+AuYo5AqjXXGhbDpvDpsV77AcgzA2xANys+b1dMBDjFAYjV6hEFgazvrNmA25Eaiy0yvEiVgxwJfDHhSihKwYYIDJg8LoBVEgHF/yoXBwknvbgBO8mMiHwmj9G0ngb4N1Nl4URhPdwhJzthNsx/AMJa2O3GkLOmbLFj0p/LyNfdkiPXP2fZMb2MAxREPJerxqNerwW6vx2jhi7lEhEUEhvSFsgkJ6Q9gEhfSGsAkK6Q1hExTSG8ImKKQ3hE1QSG8Im6CQ3hA2QSG9IWyCQnpD2ASF9IawCQrpDWETFNIbwiYopDeETVCIZWjQvj3yBUg0Csfb4dPtGW5lydAkClm2yc2RZI1QKJyQCYzj+qtvCoUoSaCG1HNFKRTmhArrOUnhHmIofPzn8PHb0iiao2TygmRzSdlUY5qEgiaOoSn0R1BIbwiboJDeEDZBIb0hbIJCekPYBIX0hrAJCukNYRMU0hvCJiikN4QNURQDNzNWxcFbFOPhI1GPH018/IgwwgakxoSo/m0UPv5z+Pht6X/QH3olKKQ3hE1QSG8Im6CQ3hA2QSG9IWz6D69wcj3n280jK/zLZNF33Qv6zhUiEBT++wSF/z7/vcIbL15TF4mlD4pisG1Z3dnJQhVlaetza7Y7fR8VsjntZq2z+c5gDRUiR6J0XXdy6UpXembdi6tKymiici+6aa454Ospd9u5mDIiLL+JgyW4i99+5XBOJOVafdkhIe0W/Ltv9xpvXuz3Ho668K8Knhs+kF6fw8XR5ufHZkc/eWxLU+tte1+anINNlbtWT1BbbBQ6ep8ovtKfSdVA4eeDgpVkWGsMJUcS9vYf5/l0nX6yns7PH3uJUPvzAj2NSwe1/v11Nq6dlpCOZ6/V6zLbjsOPwkl1W+kX1dGqyfylUptPwLERVbwonAxLPm/0O++m/bLGJ8N9en/woXBSfr5y8KakefkfsZLoQWH5Du6qx+xKuZT22X6yqaj0Cstbu9dPaFVQOrj11WJ8Q69QbEVfLaYNU3EABJ3/IUCuUOwHd/UxykjZgUYDsaaa94vUCsUzJGQHJGj9EYd5xqMbYoWp0PB/yC5gt1h6kz4EiabTKWKFwl2QH3EB+CP8vnqYuwpahUId3TVLHRWeRcN6SqpwxJvDV8VECPJnwE1szAolVSjM6FXdBOiPcGaR2QmllArb3DllRw/7I3T9RtMMSoU86KTusA384YvtjHwGLLbT5lT/YX58dKweixooXHM7zgrHmUMUo/eelzXysI/m7GGTOsUXL5u8Ab9pJOq9JJEFfjeaqYGJQv48H90UIkQTZ4I53gjqxpRG7QIf2xqM3G8cERbM5cVnHd0E1khhyuwDZ20DFplLDvB+PWEvX7Qnkpm17Xzw5qQQ9x5e2GfaF4lmCtlJmJpW2cAi7nPIxjOvTf0RYQdrwTECsraUTe1n9YLsFebFZQcnhZ/94bHXnFJ/mDDZsu3nrBXySYqbQsQxDRuI9PRxMkOFI6YQPIaPalx6LsrZ4/jDov1XqGQqhawcaezC3p+34rp6xlRDi66wseQZxx9WJ96gkqkUspU5wLIaU39YUwNGTqkUmh56beoPG+WeoJKJFCYsigi0fbmhP2xo2oOKplJYFKObOYnuQP6w7gKMR1Er1HaHqfBOA/KnuK4DFX1PCsfiu5d/VqGmlpZXRwGvXu6vloItTVpeu9AD2lw28bmXlgbsLcblV/sZ9Jb37noLqMevrN+Do9n31+NrR23VGgouJxZGbfrpZnQfI+9SG2pQQ7+4v5G3ZvZkXUO/uL/Zk3IGXKmhT/oQQMEdzoBVUYxxeYW3UQ2NMKMYeCgiUeOSQGMn8uIXB/BSMoU8mpjIPzdrQ39AiiaioowIs5trWkMjtIgwLsqofvrzhVkb+hekqD4y7NGprmj/fhR7Zm3oX7DezCCjfrvWtaqhkfhnub1dw0b9hjSzKxztDSk2/F1WdSxpmSuC95YbGT4OMWgBNWCuVECGD0C3LmZ4IhjGahNUhOUmxkuD6whDBKPafW+rvkCmtn8TqcKETwSPDbPtBnydv+HKPbZKTLt+AAth9WXDR1HYX81w9eW1uH7YOIXRBnAFrfnvTVfQTtxKtKUNrYLW02QVdMJTp7bjFC/9XpWMD61k1yKuZDcfx5ay5Dq3QRzEiFGZg9WT0TAbQRin3xKhcxDjMkObjBIxW8oio6QW6roN77y8UbOsoFJOtE1W0OeT+E4hUahVaSn4dACDZV+sSzn7Pct84FSVkIuKUB8n5QLfQH/blQ1/7RIQv0rU7NmARm+gLrCvnf9Wsg/jnrVAWVbuDchEp6vpvS/KMNu8mtOuytQAWBA8jGJMJantC9PJF7XkgtEi71SvU+TaGHBpbavGsClF0yTZ6vHr23kxnXwKHU2mi/NbLY87bpKt7o+xxH8Qm4icfwbWu0ZkJLMDTBaq3SHkNNv5wzPPsK4Cm5j4PZEYDhr7DrsMeWdZ3UKiRg98lX3vTHOdPsedsO6Fy7N0h/vD82PI+2F9Xb3tTr1Np7PpnXaz1dVo2vEHmQ2TEEK11mYAAAAASUVORK5CYII=">
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
