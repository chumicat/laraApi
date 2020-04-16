<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Resume;

class ResumeController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/resume",
     *     operationId="getResumeIndex",
     *     tags={"Resume"},
     *     summary="index",
     *     description="Display a listing of the resumes table.",
     *     @OA\Response(response=200, description="successful operation"),
     *     @OA\Response(response=400, description="Bad request"),
     *     @OA\Response(response=404, description="Resource Not Found"),
     *     @OA\Response(response=500, description="server error")
     * )
     * 
     * @OA\Head(
     *     path="/api/resume",
     *     operationId="headResumeIndex",
     *     tags={"Resume"},
     *     summary="index",
     *     description="Display a listing of the resumes table.",
     *     @OA\Response(response=200, description="successful operation"),
     *     @OA\Response(response=400, description="Bad request"),
     *     @OA\Response(response=404, description="Resource Not Found"),
     *     @OA\Response(response=500, description="server error")
     * )
     * 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Resume::all();
    }

    /**
     * @OA\Post(
     *     path="/api/resume",
     *     operationId="postResumeStore",
     *     tags={"Resume"},
     *     summary="store",
     *     description="Store a newly created resume in resumes table.",
     *     @OA\RequestBody(
     *         @OA\JsonContent(
     *             @OA\Property(property="name_id", type="integer", description="name_id of resume", nullable="false"),
     *             @OA\Property(property="resume", type="string", description="resume to store", nullable="false"),
     *             example={"name_id": 2, "resume": "A new resume."}
     *         ),
     *     ),
     *     @OA\Response(response=200, description="Name Id - Resume pair already exist"),
     *     @OA\Response(response=201, description="Successful store"),
     *     @OA\Response(response=400, description="Bad request ('name_id' and 'resume' are necessary)"),
     *     @OA\Response(response=422, description="Unprocessable Entity (Only 'name_id' and 'resume' is acceptable)"),
     *     @OA\Response(response=500, description="Server error"),
     * )
     * 
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!(isset($request['name_id']) and isset($request['resume']))) return response('"name_id" and "resume" are necessary', 400);
        if (count($request->Toarray()) != 2) return response('Only allowed "name_id" and "resume" as Parameter', 422);
        return Resume::firstOrCreate($request->all());
    }

    /**
     * @OA\Get(
     *     path="/api/resume/{id}",
     *     operationId="getResumeShow",
     *     tags={"Resume"},
     *     summary="show",
     *     description="Display the specified resume with resume id.",
     *     @OA\Parameter(
     *         name="id",
     *         description="Resume ID",
     *         required=true,
     *         in="path",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response=200, description="Finish operation"),
     *     @OA\Response(response=500, description="Server error")
     * )
     * 
     * @OA\Head(
     *     path="/api/resume/{id}",
     *     operationId="headResumeShow",
     *     tags={"Resume"},
     *     summary="show",
     *     description="Display the specified resume with resume id.",
     *     @OA\Parameter(
     *         name="id",
     *         description="Resume ID",
     *         required=true,
     *         in="path",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response=200, description="Finish operation"),
     *     @OA\Response(response=500, description="Server error")
     * )
     * 
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Resume::find($id); 
    }

    /**
     * @OA\Put(
     *     path="/api/resume/{id}",
     *     operationId="putResumeUpdate",
     *     tags={"Resume"},
     *     summary="update",
     *     description="Update the specified resume in resumes table.",
     *     @OA\Parameter(
     *         name="id",
     *         description="Resume ID",
     *         required=true,
     *         in="path",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Parameter(
     *         name="resume",
     *         description="Resume",
     *         required=false,
     *         in="query",
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="name_id",
     *         description="Name ID",
     *         required=false,
     *         in="query",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response=200, description="Successful update"),
     *     @OA\Response(response=404, description="ID not in resumes table"),
     *     @OA\Response(response=500, description="Server error")
     * )
     * 
     * @OA\Patch(
     *     path="/api/resume/{id}",
     *     operationId="patchResumeUpdate",
     *     tags={"Resume"},
     *     summary="update",
     *     description="Update the specified resume in resumes table.",
     *     @OA\Parameter(
     *         name="id",
     *         description="Resume ID",
     *         required=true,
     *         in="path",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Parameter(
     *         name="resume",
     *         description="Resume",
     *         required=false,
     *         in="query",
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="name_id",
     *         description="Name ID",
     *         required=false,
     *         in="query",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response=200, description="Successful update"),
     *     @OA\Response(response=404, description="ID not in resumes table"),
     *     @OA\Response(response=500, description="Server error")
     * )
     * 
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $row = Resume::findOrFail($id);
        $row->update($request->all());
        return $row;
    }

    /**
     * @OA\Delete(
     *     path="/api/resume/{id}",
     *     operationId="deleteResumeDestroy",
     *     tags={"Resume"},
     *     summary="destroy",
     *     description="Remove the specified resume from resumes table.",
     *     @OA\Parameter(
     *         name="id",
     *         description="Resume ID",
     *         required=true,
     *         in="path",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response=204, description="Successful delete"),
     *     @OA\Response(response=404, description="ID not in resumes table"),
     *     @OA\Response(response=500, description="Server error")
     * )
     * 
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Resume::findOrFail($id)->delete();
        return response('Delete successfully', 204);
    }
}
