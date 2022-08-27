<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class ExampleTest extends TestCase
{
  use RefreshDatabase;
  
  public function setUp(): void
  {
      parent::setUp();
      // $this->seed();
  }
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testApiTest()
    {

        $response = $this->get('/api/test');
        $response->assertStatus(200);
        $this->assertEquals('これはテストです', $response->content()); // true

    }

    public function testConnectionDatabase(){
      $expectedEmailValue = 'test@email.com';
      User::factory()->create(['email' => $expectedEmailValue]);
      $user = User::find(1);
      $this->assertEquals($expectedEmailValue, $user->email);
    }
    
    public function testEnvironment()
    {
      $this->assertEquals('testing', $this->app->environment());
    }
}
