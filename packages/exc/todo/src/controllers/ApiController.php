<?php

namespace Exc\Todo\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Exc\Todo\Models\Todo;

class ApiController extends Controller
{
    public function list()
    {
        return Todo::all();
    }
    
    public function get($id)
    {
        return Todo::findOrFail($id);
    }
    
    public function create(Request $request)
    {
        $todo = Todo::create($request->all());
        return response()->json($todo, 201);
    }
    
    public function update(Request $request)
    {
        $todo = Todo::findOrFail($request->id);
        $todo->update($request->all());
        return response()->json($todo, 200);
    }
    
    public function delete($id)
    {
        $todo = Todo::findOrFail($id);
        $todo->delete();
        return response()->json(null, 204);
    }
}
