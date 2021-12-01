<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function index()
    {
        return view('back.post.index');
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {

        $data = [
            'categories' => Category::orderBy('category_name', 'asc')->get(),
            'post_statuses' => Config::get('app-config.post_status'),
        ];

        return view('back.post.create')->with($data);
    }

    public function edit()
    {

    }

    public function update()
    {

    }

    /**
     * @param Request $request
     * @return JsonResponse|void
     */
    public function store(Request $request)
    {
        $rules = [
            'title' => 'required|min:3|unique:posts',
            'description' => 'required',
            'status' => 'required',
            'meta_title' => 'sometimes|min:3|max:100',
            'meta_description' => 'sometimes|min:3|max:160',
        ];


        $validator = Validator::make($data = $request->all(), $rules);

        if ($validator->fails()) {
            return Response::json(array(
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray()
            ), 400); // 400 being the HTTP code for an invalid request.
        }

        if (Post::create($data)) {

            return Response::json(array('success' => 'Post Inserted successfully'), 200);
        }

        return Response::json(array(
            'success' => false,
            'errors' => [
                'error' => [
                    'Failed to insert category'
                ]
            ]
        ), 400);
    }

    public function show()
    {

    }
}
