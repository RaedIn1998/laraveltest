<?php

namespace App\Http\Controllers\Post;

use Exception;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use Illuminate\Support\Facades\Response;
use App\Http\Requests\Post\StorePostRequest;
use App\Http\Requests\Post\UpdatePostRequest;

class PonstController extends Controller
{

    public function index(): JsonResponse
    {
        try{
            $post = Post::paginate(10);
            return PostResource::collection($post);

        } catch (Exception) {
            return response()->json(['error' => 'Something went wrong !']);
        }
    }

    /*
        Store a new post in database
    */

    public function store(StorePostRequest $request): JsonResponse
    {
        try {
            $post = Post::create($request->validated());
            return response()->success('Comment Created Successfully !');

        } catch (Exception $e) {
            return Response::fail('Something went wrong !', null, 500, 'COMMENT_CREATION_FAILED');
        }
    }

    /*  */

    public function show(Post $post): JsonResponse
    {
        try{
            $post->load('comment', 'user');
            return response()->json(['post' => $post]);

        } catch (Exception) {
            return response()->json(['error' => 'Something went wrong !']);
        }
    }

    public function edit(Post $post): JsonResponse
    {
        try{
            return response()->json(['post' => $post]);

        } catch (Exception) {
            return response()->json(['error' => 'Something went wrong !']);
        }
    }

    public function update(UpdatePostRequest $request, Post $post): JsonResponse
    {
        try{
            $post->update($request->validated());
            return response()->json('Post Updated Successfully');

        } catch (Exception) {
            return response()->json(['error' => 'Something went wrong !']);
        }
    }

    public function destroy(Post $post)
    {
        try{

            $post->delete();

            return response()->json('Post Deleted Successfully');

        } catch (Exception) {
            return response()->json(['error' => 'Something went wrong !']);
        }
    }
}
