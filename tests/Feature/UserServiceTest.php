<?php

namespace Tests\Feature;

use App\Services\UserService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPUnit\Framework\assertFalse;
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

    public function testLoginSukses()
    { 
        assertTrue($this->userServece->login("mirlani", "rahasia"));        
    }

    public function testLoginUserNotFoud()
    {
        assertFalse($this->userServece->login("araman", "araman"));
    }

    public function testLoginPasswordNotFoud()
    {
        assertFalse($this->userServece->login("mirlani", "salah"));
    }
}
