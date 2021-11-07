<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;

class UserController extends Controller
{
    public function softDelete(Request $request, UserService $userService)
    {
        $user = $request->user();
        $userService->softDelete($user);
        
        return redirect('/')->with("success", "Профиль успешно удален");
    }
}
