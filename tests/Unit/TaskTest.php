<?php

namespace Tests\Unit;
use  App\Models\Task;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TaskTest extends TestCase
{

    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function test_create()
    {
        $user=User::factory()->create();

        $this->withoutMiddleWare();
        $this->actingAs($user);
        $data=[
            'name'=>"task1",
            'user_id'=>$user->id,
        ];

        $this->post('/',$data)->assertStatus(302);

    }
    public function test_getall()
    {

        $user=User::factory()->create();

        $this->actingAs($user);

        $task1=Task::factory()->create(['user_id'=>$user->id,'name'=>'TASK1']);
        $task2=Task::factory()->create(['user_id'=>$user->id,'name'=>'TASK2']);
        $response=$this->get('/')->assertStatus(200);

    }
    public function test_delete()
    {
        $user=User::factory()->create();
        $this->withoutMiddleWare();
        $this->actingAs($user);

        $task=Task::factory()->create(['user_id'=>$user->id]);

        $this->delete(route('Task.delete',$task->id))->assertStatus(302);
    }
    public function test_update()
    {
        $user=User::factory()->create();
        $this->withoutMiddleWare();
        $this->actingAs($user);
        $task=Task::factory()->create(['user_id'=>$user->id]);
        $data=[
            'name'=>"task updated",
            'user_id'=>$user->id,
        ];
        $this->put(route('Task.update',$task->id),$data)->assertStatus(302);
    }
}
