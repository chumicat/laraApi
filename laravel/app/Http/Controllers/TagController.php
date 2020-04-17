<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;

class TagController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/tag",
     *     operationId="getTagIndex",
     *     tags={"Tag"},
     *     summary="index",
     *     description="Display a listing of the tags table.",
     *     @OA\Response(response=200, description="successful operation"),
     *     @OA\Response(response=400, description="Bad request"),
     *     @OA\Response(response=404, description="Resource Not Found"),
     *     @OA\Response(response=500, description="server error")
     * )
     * 
     * @OA\Head(
     *     path="/api/tag",
     *     operationId="headTagIndex",
     *     tags={"Tag"},
     *     summary="index",
     *     description="Display a listing of the tags table.",
     *     @OA\Response(response=200, description="successful operation"),
     *     @OA\Response(response=400, description="Bad request"),
     *     @OA\Response(response=404, description="Resource Not Found"),
     *     @OA\Response(response=500, description="server error")
     * )
     *
     * Display a listing of the tags table.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Tag::all();
    }

    /**
     * @OA\Post(
     *     path="/api/tag",
     *     operationId="postTagStore",
     *     tags={"Tag"},
     *     summary="store",
     *     description="Store a newly created tag in tags table.",
     *     @OA\RequestBody(
     *         @OA\JsonContent(
     *             @OA\Property(property="tag", type="string", description="tag to store", nullable="false"),
     *             example={"tag": "Hero"}
     *         ),
     *     ),
     *     @OA\Response(response=200, description="Tag already exist"),
     *     @OA\Response(response=201, description="Successful store"),
     *     @OA\Response(response=400, description="Bad request ('tag' is necessary)"),
     *     @OA\Response(response=422, description="Unprocessable Entity (Only 'tag' is acceptable)"),
     *     @OA\Response(response=500, description="Server error"),
     * )
     * 
     * Store a newly created tag in tags table.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!isset($request['tag'])) return response('"tag" are necessary', 400);
        if (count($request->Toarray()) != 1) return response('Only allowed "tag" as Parameter', 422);
        return Tag::firstOrCreate($request->all());
    }

    /**
     * @OA\Get(
     *     path="/api/tag/{id}",
     *     operationId="getTagShow",
     *     tags={"Tag"},
     *     summary="show",
     *     description="Display the specified tag with tag id.",
     *     @OA\Parameter(
     *         name="id",
     *         description="Tag ID",
     *         required=true,
     *         in="path",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response=200, description="Finish operation"),
     *     @OA\Response(response=500, description="Server error")
     * )
     * 
     * @OA\Head(
     *     path="/api/tag/{id}",
     *     operationId="headTagShow",
     *     tags={"Tag"},
     *     summary="show",
     *     description="Display the specified tag with tag id.",
     *     @OA\Parameter(
     *         name="id",
     *         description="Tag ID",
     *         required=true,
     *         in="path",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response=200, description="Finish operation"),
     *     @OA\Response(response=500, description="Server error")
     * )
     * 
     * Display the specified tag with tag id.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Tag::find($id); 
    }

    /**
     * @OA\Put(
     *     path="/api/tag/{id}",
     *     operationId="putTagUpdate",
     *     tags={"Tag"},
     *     summary="update",
     *     description="Update the specified tag in tags table.",
     *     @OA\Parameter(
     *         name="id",
     *         description="Tag ID",
     *         required=true,
     *         in="path",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Parameter(
     *         name="tag",
     *         description="Tag",
     *         required=true,
     *         in="query",
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(response=200, description="Successful update"),
     *     @OA\Response(response=404, description="ID not in tags table"),
     *     @OA\Response(response=500, description="Server error")
     * )
     * 
     * @OA\Patch(
     *     path="/api/tag/{id}",
     *     operationId="patchTagUpdate",
     *     tags={"Tag"},
     *     summary="update",
     *     description="Update the specified tag in tags table.",
     *     @OA\Parameter(
     *         name="id",
     *         description="Tag ID",
     *         required=true,
     *         in="path",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Parameter(
     *         name="tag",
     *         description="Tag",
     *         required=true,
     *         in="query",
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(response=200, description="Successful update"),
     *     @OA\Response(response=404, description="ID not in tags table"),
     *     @OA\Response(response=500, description="Server error")
     * )
     * 
     * Update the specified tag in tags table.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $row = Tag::findOrFail($id);
        $row->update($request->all());
        return $row;
    }

    /**
     * @OA\Delete(
     *     path="/api/tag/{id}",
     *     operationId="deleteTagDestroy",
     *     tags={"Tag"},
     *     summary="destroy",
     *     description="Remove the specified tag from tags table.",
     *     @OA\Parameter(
     *         name="id",
     *         description="Tag ID",
     *         required=true,
     *         in="path",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response=204, description="Successful delete"),
     *     @OA\Response(response=404, description="ID not in tags table"),
     *     @OA\Response(response=500, description="Server error")
     * )
     * 
     * Remove the specified tag from tags table.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tag::findOrFail($id)->delete();
        return response('Delete successfully', 204);
    }
}
