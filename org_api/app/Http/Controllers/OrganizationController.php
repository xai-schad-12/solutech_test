<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organization;
use Illuminate\Support\Str;

class OrganizationController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string',
       
    ]);

    $slug=Str::slug($request->name);

    return Organization::create(['name'=>$request->name, 'slug'=>$slug]);
}

public function index(Request $request)
{
    return Organization::all();
}

public function show(Request $request,$slug){
    $organization = Organization::where('slug', $slug)->first();

    if (!$organization) {
        return response()->json(['message' => 'Organisation non trouvée'], 404);
    }
    
    return $organization->events; // or ->events()->get(
}
}
