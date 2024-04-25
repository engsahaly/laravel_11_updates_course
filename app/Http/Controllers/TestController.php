<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class TestController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            // 'test',
            new Middleware('test', only: ['index']),
            // new Middleware('subscribed', except: ['store']),
        ];
    }

    public function index()
    {
        return 'Hello from index function in test controller';
    }
}
