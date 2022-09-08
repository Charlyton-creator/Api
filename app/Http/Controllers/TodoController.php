<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Todo;

class TodoController extends Controller
{

   /* public function __construct()
    {
        $this->middleware('auth:api');
    }
    //*/

    /**
     * @function Store
     * @author Charles
     * @param $request
     * @return json
     */
    public function store(Request $request)
    {
        $data =$request->validate([
            "title" => 'required|string|max:255',
            "priority" => 'nullable|integer|min:1|max:3',
            "status" => 'required|string'
        ]);

        $todocreated = Todo::create($data);

        return response()->json([
            'status' => '0',
            'message' => 'the todo was created successfully',
            'data' => $todocreated
        ], 201); // code of success creation
    }

    /**
     * @author Charles
     * @return json 
     */
    public function index()
    {
        $ListOfTodos = Todo::all();

        return response()->json([
            "status" => "0",
            "message" =>"The Todo List",
            "data" => $ListOfTodos
        ], 200); // success response
    }

    /**
     * @author Charles
     * @param id
     * @return bool
     */
    public function show($id)
    {
        $lookintodo = Todo::find($id);

        return response()->json([
            "status" => "0",
            "message" => "The Todo element was found out",
            "data" => $lookintodo
        ], 200); // success response
    }

    /**
     * @author Charles
     * @param $id, $request
     * @return bool
     */
    public function update(Request $request, $id)
    {
        $data =$request->validate([
            "title" => 'nullable|string|max:255',
            "priority" => 'nullable|integer|min:1|max:3',
            "status" => 'required|string'
        ]);    

        $todotoUpdate = Todo::find($id);

        if($todotoUpdate)
        {
            $todotoUpdate->update($data);

            return response()->json([
                "status" => "0",
                "message" => "Todo found update successfull",
                "data" => $todotoUpdate
            ],200);
        }
        else
        {
            return response()->json([
                "status" => "1",
                "message" => "Failed to update todo not found",
                "data" => null
            ], 404);
        }
    }

    /**
     * @author Charles
     * @param $id
     * @return bool
     */
    public function delete($id)
    {
        $todoToDelete = Todo::find($id);

        if($todoToDelete)
        {
            $todoToDelete->delete();
            return response()->json([
                "status" => "0",
                "message" => "Sucess deleting the Todo"
            ], 200);
        }
        else
        {
            return response()->json([
                "status" => "1",
                "message" => "failed to retrieve the todo",
                "data" => null
            ], 404);
        }
    }
}
