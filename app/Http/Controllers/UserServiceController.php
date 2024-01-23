<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class UserServiceController extends Controller
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function login(Request $request): Response
    {
        return response()->view("user.user", [
            "title" => "login"
        ]);
    }

    public function doLogin(Request $request): RedirectResponse|Response
    {
        $user = $request->input("user");
        $password = $request->input("password");

    // username dan passwordnya tidak di isi
        if (empty($user) || empty($password)) {
            return response()->view("user.user", [
                "title" => "login",
                "error" => "username dan password harus di isi"
            ]);
        }

        // dicek apakah user dan password benar kalau benar langsung di redirct ke /
        if ($this->userService->login($user, $password)) {

            $request->session()->put("user", $user);
            return redirect("/");
        }

        return response()->view("user.user", [
            "title" => "login",
            "error" => "username atau password anda salah"
        ]);
    }

    public function doLogout(Request $request, $userId)
    {

    }
}
