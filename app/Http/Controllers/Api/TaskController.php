<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Task::orderBy('created_at', 'DESC')->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $newItem = new Task();
        $newItem->name = $request->item['name'];
        if($newItem->save()){
            return $newItem;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $item = Task::find($id);
        
        if($item){
            if(!$request->item['completed']){
                $item->completed = 1;
                $item->completed_at = Carbon::now();
            }else{
                $item->completed = 0;
                $item->completed_at = null;
            }
            // $item->completed = $request->item['completed'] ? 1 : 0;
            // $item->completed_at = $request->item['completed'] ? Carbon::now() : null;
            $item->save();
            return $item;
        }

        return "No data found!!";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Task::find($id);
        if($item){
            $item->delete();
            return "New Task Deleted Successfully!!";
        }

        return "No data found!!";
    }
}
