<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Blog;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\BlogResource;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateTaskRequest;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return BlogResource::collection(Blog::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogRequest $request)
    {
        $task = Blog::create($request->validated());

        return BlogResource::make($task);
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $task)
    {
        return BlogResource::make($task);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Blog $task)
    {
        $task->update($request->validated());

        return BlogResource::make($task);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $task)
    {
        $task->delete();

        return response()->noContent();
    }
}
