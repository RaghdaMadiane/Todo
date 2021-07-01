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
    public function test_example()
    {
        $this->assertTrue(true);
    }
    public function test_create()
    {
        $data=[
            'name'=>"task1",
        ];
        $this->post('task',$data)->assertStatus(201);
        $this->assertTrue(true);
    }
    public function test_update()
    {
        $data=[
            'name'=>"task updated",
        ];
        $this->put(route('task',$task->id),$data)->assertStatus(200);
    }
    public function test_delete()
    {
        $this->delete(route('task',$task->id),$data)->assertStatus(204);
    }
}
