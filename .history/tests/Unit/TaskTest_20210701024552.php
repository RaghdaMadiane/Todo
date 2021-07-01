<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use  App\Models\Task;

class TaskTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_getAll()
    {
        $todos = factory('App\Models\Task', 3)->create();

        $this->get('/todos')
        ->assertStatus(200)
        ->assertJson($todos->toArray());
    }
    public function can_create_a_todo()
{
    $todo = factory('App\Todo')->make()->toArray();
}
    // public function test_create()
    // {
    //     $data=[
    //         'name'=>"task1",
    //     ];
    //     $this->post('task',$data)->assertStatus(201);
    //     $this->assertTrue(true);
    // }
    // public function test_update()
    // {
    //     $data=[
    //         'name'=>"task updated",
    //     ];
    //     $this->put(route('task',$task->id),$data)->assertStatus(200);
    // }
    // public function test_delete()
    // {
    //     $this->delete(route('task',$task->id),$data)->assertStatus(204);
    // }
}
