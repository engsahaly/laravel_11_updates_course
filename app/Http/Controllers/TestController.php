<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Support\Traits\Dumpable;

class TestController extends Controller
{
    use Dumpable;

    public function index()
    {
        // dump('Hello from index function');
        // dd('Hello from index function');
        // $this->dd('Hello from index function');
        User::create([
            'name' => 'mahmoud',
            'email' => 'mahmoud@yahoo.com',
            'password' => bcsqrt('123456789'),
        ])->dd();
        return 'Hello from index function in test controller';
    }
}
