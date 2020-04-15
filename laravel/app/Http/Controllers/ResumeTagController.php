<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ResumeTag;

class ResumeTagController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/resumetag",
     *     operationId="getResumeTagIndex",
     *     tags={"ResumeTag"},
     *     summary="index",
     *     description="Display a listing of the resume_tag table.",
     *     @OA\Response(response=200, description="successful operation"),
     *     @OA\Response(response=400, description="Bad request"),
     *     @OA\Response(response=404, description="Resource Not Found"),
     *     @OA\Response(response=500, description="server error")
     * )
     * 
     * @OA\Head(
     *     path="/api/resumetag",
     *     operationId="headResumeTagIndex",
     *     tags={"ResumeTag"},
     *     summary="index",
     *     description="Display a listing of the resume_tag table.",
     *     @OA\Response(response=200, description="successful operation"),
     *     @OA\Response(response=400, description="Bad request"),
     *     @OA\Response(response=404, description="Resource Not Found"),
     *     @OA\Response(response=500, description="server error")
     * )
     * 
     * Display a listing of the resumetag table.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ResumeTag::all();
    }

    /**
     * @OA\Post(
     *     path="/api/resumetag",
     *     operationId="postResumeTagStore",
     *     tags={"ResumeTag"},
     *     summary="store",
     *     description="Store a newly created resume-tag map data in resume_tag table.",
     *     @OA\Response(response=200, description="successful operation"),
     *     @OA\Response(response=400, description="Bad request"),
     *     @OA\Response(response=404, description="Resource Not Found"),
     *     @OA\Response(response=500, description="server error")
     * )
     * 
     * Store a newly created resume-tag map data in resume_tag table.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (isset($request['id']) or isset($request['created_at']) or isset($request['updated_at'])) return 422;
        return ResumeTag::firstOrCreate($request->all());
    }

    /**
     * @OA\Get(
     *     path="/api/resumetag/{id}",
     *     operationId="getResumeTagShow",
     *     tags={"ResumeTag"},
     *     summary="show",
     *     description="Display the specified resume-tag map data with resumetag id.",
     *     @OA\Parameter(
     *         name="id",
     *         description="ResumeTag ID",
     *         required=true,
     *         in="path",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response=200, description="successful operation"),
     *     @OA\Response(response=400, description="Bad request"),
     *     @OA\Response(response=404, description="Resource Not Found"),
     *     @OA\Response(response=500, description="server error")
     * )
     * 
     * @OA\Head(
     *     path="/api/resumetag/{id}",
     *     operationId="headResumeTagShow",
     *     tags={"ResumeTag"},
     *     summary="show",
     *     description="Display the specified resume-tag map data with resumetag id.",
     *     @OA\Parameter(
     *         name="id",
     *         description="ResumeTag ID",
     *         required=true,
     *         in="path",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response=200, description="successful operation"),
     *     @OA\Response(response=400, description="Bad request"),
     *     @OA\Response(response=404, description="Resource Not Found"),
     *     @OA\Response(response=500, description="server error")
     * )
     * 
     * Display the specified resume-tag map data with resumetag id.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return ResumeTag::find($id); 
    }

    /**
    * @OA\Put(
     *     path="/api/resumetag/{id}",
     *     operationId="putResumeTagUpdate",
     *     tags={"ResumeTag"},
     *     summary="update",
     *     description="Update the specified resume-tag map data in resume_tag table.",
     *     @OA\Parameter(
     *         name="id",
     *         description="ResumeTag ID",
     *         required=true,
     *         in="path",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response=200, description="successful operation"),
     *     @OA\Response(response=400, description="Bad request"),
     *     @OA\Response(response=404, description="Resource Not Found"),
     *     @OA\Response(response=500, description="server error")
     * )
     * 
     * @OA\Patch(
     *     path="/api/resumetag/{id}",
     *     operationId="patchResumeTagUpdate",
     *     tags={"ResumeTag"},
     *     summary="update",
     *     description="Update the specified resume-tag map data in resume_tag table.",
     *     @OA\Parameter(
     *         name="id",
     *         description="ResumeTag ID",
     *         required=true,
     *         in="path",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response=200, description="successful operation"),
     *     @OA\Response(response=400, description="Bad request"),
     *     @OA\Response(response=404, description="Resource Not Found"),
     *     @OA\Response(response=500, description="server error")
     * )
     * 
     * Update the specified resume-tag map data in resume_tag table.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $row = ResumeTag::findOrFail($id);
        $row->update($request->all());
        return $row;
    }

    /**
     * @OA\Delete(
     *     path="/api/resumetag/{id}",
     *     operationId="deleteResumeTagDestroy",
     *     tags={"ResumeTag"},
     *     summary="destroy",
     *     description="Remove the specified resume-tag map data from resume_tag table.",
     *     @OA\Parameter(
     *         name="id",
     *         description="ResumeTag ID",
     *         required=true,
     *         in="path",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response=200, description="successful operation"),
     *     @OA\Response(response=400, description="Bad request"),
     *     @OA\Response(response=404, description="Resource Not Found"),
     *     @OA\Response(response=500, description="server error")
     * )
     * 
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ResumeTag::findOrFail($id)->delete();
        return 204;
    }
}
