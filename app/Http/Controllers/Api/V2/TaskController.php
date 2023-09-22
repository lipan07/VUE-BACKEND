<?php

namespace App\Http\Controllers\Api\V2;

use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\BlogResource;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Models\Blog;

class TaskController extends Controller
{
    public function __construct()
    {
        // $this->authorizeResource(Blog::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return BlogResource::collection(auth()->user()->blogs()->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogRequest $request)
    {
        $blog = $request->user()->blogs()->create($request->validated());

        return BlogResource::make($blog);
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        return BlogResource::make($blog);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogRequest $request, $id)
    {
        $blog = Blog::find($id);
        $blog->update($request->all());

        return BlogResource::make($blog);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Blog::where('id', $id)->delete();

        return response()->noContent();
    }
}
