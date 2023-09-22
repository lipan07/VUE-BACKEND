<?php

namespace App\Http\Controllers\Api\V2;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\BlogResource;

class CompleteTaskController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Blog $task)
    {
        $task->is_completed = $request->is_completed;
        $task->save();

        return BlogResource::make($task);
    }
}
