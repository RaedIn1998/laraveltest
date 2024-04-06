<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Comment $comment): JsonResponse
    {
        try{
            $comment::paginate(10);
            return response()->json(['comment' => $comment]);
        } catch (Exception) {
            return response()->json(['error' => 'Something went wrong !']);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Post $post): JsonResponse
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCommentRequest $request): JsonResponse
    {
        try {
            Comment::create($request->validated());
            return Response::success(data:'Comment Created Successfully !');

        } catch (Exception $e) {
            return Response::fail('Something went wrong !', null, 500, 'COMMENT_CREATION_FAILED');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment): JsonResponse
    {
        try{
            $comment->load('post');
            return response()->json(['comment' => $comment]);

        } catch (Exception) {
            return response()->json(['error' => 'Something went wrong !']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment): JsonResponse
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommentRequest $request, Comment $comment): JsonResponse
    {
        try{
            $comment->update($request->validated());
            return response()->json('Comment Updated Successfully');

        } catch (Exception) {
            return response()->json(['error' => 'Something went wrong !']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment): JsonResponse
    {
        try{
            $comment->delete();
            return response()->json('Post Deleted Successfully');

        } catch (Exception) {
            return response()->json(['error' => 'Something went wrong !']);
        }
    }
}
