<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBlogRequest;
use App\Models\Blog;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Blog[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return Blog::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateBlogRequest $request
     * @return JsonResponse
     */
    public function store(CreateBlogRequest $request)
    {
        $inputs = $request->all();

        $blog = new Blog();
        $blog->fill($inputs);
        $blog->save();

        return response()->json([
            'message' => 'Added Successfully',
            'blog' => $blog
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param $bla
     * @return Response
     */
    public function show($bla)
    {
        return Blog::where('title', $bla)->first();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, Blog $blog)
    {
        $inputs = $request->all();

        $blog->update($inputs);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Blog::where('id', $id)->delete();
    }
}
