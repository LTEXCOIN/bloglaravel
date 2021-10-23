<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Validator;


class CategoryController extends Controller
{
    public function index()
    {
        $data = [];
        return view('back.category.create')->with($data);
    }

    public function create()
    {
        $data = [];
        return view('back.category.create')->with($data);
    }

    public function edit()
    {

    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $rules = [
            'category_name' => 'required|min:3|max:100|unique:categories',
        ];



        $validator = Validator::make($data = $request->all(), $rules);

        if ($validator->fails()) {
            return Response::json(array(
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray()
            ), 400); // 400 being the HTTP code for an invalid request.
        }

        if (Category::create($data)) {

            return Response::json(array('success' => 'Inserted successfully'), 200);
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

    public function update()
    {
        $x = 5;
    }

    public function destroy()
    {

    }
}
