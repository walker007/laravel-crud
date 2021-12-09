<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_exemplo_de_teste()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
