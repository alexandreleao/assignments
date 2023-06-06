<?php

namespace App\Http\Controllers;
use App\Models\Assignment;

use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    public function index()
    {
        $assignments = Assignment::all();
        return response()->json($assignments);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=> 'required',
            'description' => 'required',
            'due_date' => 'required|date',
        ]);

        $assignment = Assignment::create($request->all());
        return response()->json($assignment, 201);
    }

    public function show($id){
        $assignment = Assignment::findOrFail($id);
        return response()->json($assignment);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'due_date' => 'required|date',
        ]);

        $assignment = Assignment::findOrFail($id);
        $assignment->update($request->all());
        return response()->json($assignment, 200); 
    }

    public function destroy($id)
    {
        Assignment::destroy($id);
        return response()->json(null, 204);
    }


}
