<?php
namespace Tests\Unit;

use Tests\TestCase;
use App\Services\Projects;
use App\Models\Project;
use Mockery;

$this->instance(
    Projects::class,
    Mockery::mock(
        Projects::class,
        function ($mock) {
            $mock->shouldReceive('process')->once();
        }
    )
);

$this->instance(
    Project::class,
    Mockery::mock(
        Project::class,
        function ($mock) {
            $mock->shouldReceive('newInstance')->andReturn($mock);
        }
    )
);

class ProjectTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGetList()
    {
        $this->assertTrue(true);
    }
}
