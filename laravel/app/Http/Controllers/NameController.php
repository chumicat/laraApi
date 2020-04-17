<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Name;

class NameController extends Controller
{

    /**
     * @OA\Get(
     *     path="/api/name",
     *     operationId="getNameIndex",
     *     tags={"Name"},
     *     summary="index",
     *     description="Display a listing of the name table.",
     *     @OA\Response(response=200, description="Successful get all data"),
     *     @OA\Response(response=500, description="Server error")
     * )
     * 
     * @OA\Head(
     *     path="/api/name",
     *     operationId="headNameIndex",
     *     tags={"Name"},
     *     summary="index",
     *     description="Display a listing of the name table.",
     *     @OA\Response(response=200, description="Successful get all data"),
     *     @OA\Response(response=500, description="Server error")
     * )
     *
     * Display a listing of the name table.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Name::all();
    }

    /**
     * @OA\Post(
     *     path="/api/name",
     *     operationId="postNameStore",
     *     tags={"Name"},
     *     summary="store",
     *     description="Store a newly created name in name table.",
     *     @OA\RequestBody(
     *         @OA\JsonContent(
     *             @OA\Property(property="name", type="string", description="name to store", nullable="false"),
     *             example={"name": "Flowey"}
     *         ),
     *     ),
     *     @OA\Response(response=200, description="Name already exist"),
     *     @OA\Response(response=201, description="Successful store"),
<<<<<<< HEAD
     *     @OA\Response(response=400, description="Bad request ('name' are necessary)"),
=======
     *     @OA\Response(response=400, description="Bad request ('name' is necessary)"),
>>>>>>> ce0ccfd6c6a003b5147ed10f571e3861eb00e24e
     *     @OA\Response(response=422, description="Unprocessable Entity (Only 'name' is acceptable)"),
     *     @OA\Response(response=500, description="Server error"),
     * )
     *
     * Store a newly created name in name table.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!isset($request['name'])) return response('"name" are necessary', 400);
        if (count($request->Toarray()) != 1) return response('Only allowed "name" as Parameter', 422);
        return Name::firstOrCreate($request->all());
    }

    /**
     * @OA\Get(
     *     path="/api/name/{id}",
     *     operationId="getNameShow",
     *     tags={"Name"},
     *     summary="show",
     *     description="Display the specified name with name id.",
     *     @OA\Parameter(
     *         name="id",
     *         description="Name ID",
     *         required=true,
     *         in="path",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response=200, description="Finish operation"),
     *     @OA\Response(response=500, description="Server error")
     * )
     * 
     * @OA\Head(
     *     path="/api/name/{id}",
     *     operationId="headNameShow",
     *     tags={"Name"},
     *     summary="show",
     *     description="Display the specified name with name id.",
     *     @OA\Parameter(
     *         name="id",
     *         description="Name ID",
     *         required=true,
     *         in="path",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response=200, description="Finish operation"),
     *     @OA\Response(response=500, description="Server error")
     * )
     * 
     * Display the specified name with name id.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Name::find($id); 
    }

    /**
     * @OA\Put(
     *     path="/api/name/{id}",
     *     operationId="putNameUpdate",
     *     tags={"Name"},
     *     summary="update",
     *     description="Update the specified name in name table.",
     *     @OA\Parameter(
     *         name="id",
     *         description="Name ID",
     *         required=true,
     *         in="path",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Parameter(
     *         name="name",
     *         description="Name",
     *         required=true,
     *         in="query",
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(response=200, description="Successful update"),
     *     @OA\Response(response=404, description="ID not in names table"),
     *     @OA\Response(response=500, description="Server error")
     * )
     * 
     * @OA\Patch(
     *     path="/api/name/{id}",
     *     operationId="patchNameUpdate",
     *     tags={"Name"},
     *     summary="update",
     *     description="Update the specified name in name table.",
     *     @OA\Parameter(
     *         name="id",
     *         description="Name ID",
     *         required=true,
     *         in="path",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Parameter(
     *         name="name",
     *         description="Name",
     *         required=true,
     *         in="query",
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(response=200, description="Successful update"),
     *     @OA\Response(response=404, description="ID not in names table"),
     *     @OA\Response(response=500, description="Server error")
     * )
     * 
     * Update the specified name in name table.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $row = Name::findOrFail($id);
        $row->update($request->all());
        return $row;
    }

    /**
     * @OA\Delete(
     *     path="/api/name/{id}",
     *     operationId="deleteNameDestroy",
     *     tags={"Name"},
     *     summary="destroy",
     *     description="Remove the specified name from name table.",
     *     @OA\Parameter(
     *         name="id",
     *         description="Name ID",
     *         required=true,
     *         in="path",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response=204, description="Successful delete"),
     *     @OA\Response(response=404, description="ID not in names table"),
     *     @OA\Response(response=500, description="Server error")
     * )
     * 
     * Remove the specified name from name table.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Name::findOrFail($id)->delete();
        return response('Delete successfully', 204);
    }
}
