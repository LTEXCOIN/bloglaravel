<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Intervention\Image\Image;

class PostController extends Controller
{
    public function index()
    {
        return view('back.post.index');
    }

    public function create()
    {

        return view('back.post.create');
    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function store()
    {

    }

    public function show()
    {

    }
}
