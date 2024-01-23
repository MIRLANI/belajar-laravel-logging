<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserServiceControllerTest extends TestCase
{
    public function testLoginView()
    {
        $this->get("/login")
        ->assertSeeText("login")
        ->assertSeeText("User");
    }

    
    public function testLoginSukses()
    {
       $this->withSession([
        "user" => "mirlani"
       ])->post("/login", [
        "user" => "mirlani",
        "password" => "rahasia"
       ])->assertRedirect("/")
       ->assertSessionHas("user", "mirlani");
    }

    public function testUsernameDanPasswordRequired()
    {
        $this->post("/login", [])
        ->assertSeeText("username dan password harus di isi");
    }

    public function testUsernameDanPasswordnyaSalah()
    {
        $this->post("/login", [
            "user" => "salah",
            "password" => "salah"
        ])->assertSeeText("username atau password anda salah");
    }
}

