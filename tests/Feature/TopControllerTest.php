<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TopControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        $res = $this->get('/');

        $res->assertStatus(200)
            ->assertViewIs('top.index');
    }
}
