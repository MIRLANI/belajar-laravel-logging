<?php

namespace Tests\Feature;

use App\Services\UserService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPUnit\Framework\assertTrue;

class UserServiceTest extends TestCase
{
   
    public UserService $userServece;

    protected function setUp(): void
    {
        parent::setUp();
        $this->userServece = $this->app->make(UserService::class);
    }

    public function testUserService()
    {
        assertTrue(true);
    }
}
