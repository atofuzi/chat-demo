<?php

namespace Tests\Unit;

use App\Service\UserService;
use App\Models\User;
use App\Models\Post;
use Mockery;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SampleTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        // Do your extra thing here
    }
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_get_users()
    {
      $expect = (object)[
        'name' => '祐哉',
        'email' => 'sample@email.com'
      ];

      $userMock = Mockery::mock(User::class);
      $userMock
        ->shouldReceive('find')
        ->with(1)
        ->andReturn($expect);

      $this->assertEquals($expect, $expect);
    }

    public function test_all_users()
    {
      // $user1 = User::factory()->create();
      // $user2 = User::factory()->create();
      // $user3 = User::factory()->create();

      // $expect = [
      //   [ 'author' => 'test' ],
      //   [ 'author' => 'test' ]
      // ];

      // // $users = User::factory()->count(2)->make();
      // $obj1 = (object)array('id' => 1, 'content' => 'コンテント1');
      // $obj2 = (object)array('id' => 2, 'content' => 'コンテント2');

      // $posts = collect([
      //   $obj1,
      //   $obj2 
      // ]);

      // $userMock = Mockery::mock(User::class);
      // // $userMock->exists = true;
      
      // $users = collect([
      //   $userMock,
      //   $userMock,
      // ]);
  
      // $userMock
      //   ->shouldReceive('all')
      //   ->once()
      //   ->andReturn($users);
      // $userMock
      //   ->shouldReceive('getAttribute')
      //   ->with('posts')
      //   ->andReturn($posts);
      // $userMock
      //   ->shouldReceive('getAttribute')
      //   ->with('name')
      //   ->andReturn('test');


      // // $userMock->setAttribute('test', 'aaaaa');
      
      // $UserService = new UserService($userMock);
      // // $UserServiceMock
      // //   ->shouldReceive('getUser')
      // //   ->with(1)
      // //   ->once()
      // //   ->andReturn($expect);

      // $result = $UserService->getAllUsers();

      // $this->assertEquals($expect, $result->toArray());
    
    
    }
    public function tearDown(): void
    {
        Mockery::close();
    }

}
