<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Resources\RoleResourse;
use Symfony\Component\HttpFoundation\Response;

class RoleController extends Controller
{
    public function index(){
        return RoleResourse::collection(Role::all());
    }

    public function store(Request $request){

        $role = Role::create($request->only('name'));

        $role->permissions()->attach($request->input('permissions'));

        return response(new RoleResourse($role->load('permissions')), Response::HTTP_CREATED);
    }

    public function show($id){
        return new RoleResourse(Role::with('permissions')->find($id));
    }

    public function update(Request $request, $id){
        $role = Role::find($id);

        $role->update($request->only('name'));

        $role->permissions()->sync($request->input('permissions'));

        return response(new RoleResourse($role->load('permissions')), Response::HTTP_ACCEPTED);
    }

    public function destroy($id){
        Role::destroy($id);
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
