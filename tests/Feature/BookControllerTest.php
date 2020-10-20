<?php

namespace Tests\Feature;

use App\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BookControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testGuestCreate()
    {
        $res = $this->get(route('book.create'));
        $res->assertRedirect(route('login'));
    }

    public function testAuthCreate()
    {
        $user = factory(User::class)->create();

        $res = $this->actingAs($user)
            ->get(route('book.create'));
        
        $res->assertStatus(200)
            ->assertViewIs('books.create');
    }
}
