<?php

namespace App\Http\Controllers;

use App\Models\PostComment;
use App\Http\Requests\StorePostCommentRequest;
use App\Http\Requests\UpdatePostCommentRequest;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PostCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StorePostCommentRequest $request): JsonResponse
    {
        // Begin transaction
        try {
            DB::beginTransaction();

//            $data
            // Create a new post
            $post = Post::create($request->validated());
//test
            // Retrieve the ID of the newly created post
//            $postId = $post->id;
            $post->comments()->create($request->validated());

            // Commit the transaction
            DB::commit();

            return response()->json(['message' => 'Post and comment created successfully'], 200);
        } catch (\Exception $e) {
            Log::error('Error occurred: ' . $e->getMessage());
            // Something went wrong
            DB::rollBack();

            return response()->json(['message' => 'Failed to create post and comment', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(PostComment $postComment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PostComment $postComment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostCommentRequest $request, PostComment $postComment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PostComment $postComment)
    {
        //
    }
}
