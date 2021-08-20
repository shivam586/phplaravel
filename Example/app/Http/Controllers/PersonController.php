<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{

    public function index()
    {
        return Person::getAll();
    }
    public function store(Request $request)
    {
        $mid=array();
        $mid['firstname']=$request->firstname;
        $mid['lastname']=$request->lastname;
        $check= Person::create($mid);

        if ($check){
            return response()->json([
                "message" => "User Saved successfully"
            ], 200);
        }else{
            return response()->json([
                "message" => "User Could not be Saved successfully. Some problem occurred."
            ], 200);
        }
    }

    public function show($id)
    {
        $person = Person::find($id);
        return response()->json($person,200);
    }

    public function deleteUser(Request $request, $id)
    {

        $response= (new \App\Models\Person)->deleteUser($id);
        if (!$response){
            return response()->json([
                "message" => "User Does not exist. Deletion failed."
            ], 404);
        }
        else{
            return response()->json([
                "message" => "User deleted successfully."
            ], 404);
        }
    }
}

