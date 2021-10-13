<?php

namespace Tests\Feature;

use Tests\TestCase;

class GeneralTest extends TestCase
{
    /**
     * A basic feature test example.
     * @test
     * @return void
     */
    public function fileTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
