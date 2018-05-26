<?php

namespace Exc\Todo\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

class TodoController extends Controller
{
    public function list()
    {
        $apiRequest = Request::create('todo/api/list', 'GET');
        $response = Route::dispatch($apiRequest);
        
        return view('todo::list', ['items' => json_decode($response->content())]);
    }
    
    public function create(Request $request)
    {
        $apiRequest = Request::create('todo/api/create', 'POST', $request->input());
        $response = Route::dispatch($apiRequest);
        return Redirect::to("todo");
    }
    
    public function delete($id)
    {
        $apiRequest = Request::create('todo/api/delete/'.$id, 'DELETE');
        $response = Route::dispatch($apiRequest);
        return Redirect::to("todo");
    }
    
    public function edit($id)
    {
        $apiRequest = Request::create('todo/api/get/'.$id, 'GET');
        $response = Route::dispatch($apiRequest);
        
        return view('todo::edit', ['item' => json_decode($response->content())]);
    }
    
    public function update(Request $request)
    {
        $apiRequest = Request::create('todo/api/update', 'PUT', $request->input());
        $response = Route::dispatch($apiRequest);
        return Redirect::to("todo");
    }
}
