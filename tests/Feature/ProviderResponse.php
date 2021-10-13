<?php

namespace Tests\Feature;

use Tests\TestCase;

class ProviderResponse extends TestCase
{
    /**
     * A basic feature test example.
     * @test
     * @return void
     */
    public function is_valid()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
