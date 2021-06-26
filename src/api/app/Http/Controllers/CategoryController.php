<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Resources\CategoryResourse;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
{
    public function index(){
        return CategoryResourse::collection(Category::all());
    }

    public function store(Request $request){

        $user = User::find($request->input('user_id'));

        if($user->role_id == 1){
            $category = Category::create($request->only('name'));
            return response(new CategoryResourse($category), Response::HTTP_CREATED);
        }else{
            return response(null, Response::HTTP_NO_CONTENT);
        }
        
    }

    public function show($id){
        return new CategoryResourse(Category::find($id));
    }

    public function update(Request $request, $id){
        $category = Category::find($id);

        $category->update($request->only('name'));

        return response(new CategoryResourse($category), Response::HTTP_ACCEPTED);
    }

    public function destroy($id){
        Category::destroy($id);
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
