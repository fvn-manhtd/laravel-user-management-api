<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Resources\PermissionResourse;

class PermissionController extends Controller
{
    public function index(){
        return PermissionResourse::collection(Permission::all());
    }
}
