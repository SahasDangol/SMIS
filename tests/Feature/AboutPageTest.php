<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AboutPageTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCanViewDashboard()
    {
        $response = $this->get('/installation');
//        $response->assertSee("Dashboard");
        $response->assertStatus(200);
    }
}
