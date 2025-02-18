<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AllPostsCollection;
use App\Http\Resources\UsersCollection;
use App\Models\Post;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $posts = Post::inRandomOrder()->limit(20)->get();
            return response()->json(new AllPostsCollection($posts), 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

}
