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
     *     @OA\Response(response=200, description="successful operation"),
     *     @OA\Response(response=400, description="Bad request"),
     *     @OA\Response(response=404, description="Resource Not Found"),
     *     @OA\Response(response=500, description="server error")
     * )
     * 
     * @OA\Head(
     *     path="/api/name",
     *     operationId="headNameIndex",
     *     tags={"Name"},
     *     summary="index",
     *     description="Display a listing of the name table.",
     *     @OA\Response(response=200, description="successful operation"),
     *     @OA\Response(response=400, description="Bad request"),
     *     @OA\Response(response=404, description="Resource Not Found"),
     *     @OA\Response(response=500, description="server error")
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
     *     @OA\Response(response=200, description="successful operation"),
     *     @OA\Response(response=400, description="Bad request"),
     *     @OA\Response(response=404, description="Resource Not Found"),
     *     @OA\Response(response=500, description="server error")
     * )
     *
     * Store a newly created name in name table.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (isset($request['id']) or isset($request['created_at']) or isset($request['updated_at'])) return 422;
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
     *     @OA\Response(response=200, description="successful operation"),
     *     @OA\Response(response=400, description="Bad request"),
     *     @OA\Response(response=404, description="Resource Not Found"),
     *     @OA\Response(response=500, description="server error")
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
     *     @OA\Response(response=200, description="successful operation"),
     *     @OA\Response(response=400, description="Bad request"),
     *     @OA\Response(response=404, description="Resource Not Found"),
     *     @OA\Response(response=500, description="server error")
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
     *     @OA\Response(response=200, description="successful operation"),
     *     @OA\Response(response=400, description="Bad request"),
     *     @OA\Response(response=404, description="Resource Not Found"),
     *     @OA\Response(response=500, description="server error")
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
     *     @OA\Response(response=200, description="successful operation"),
     *     @OA\Response(response=400, description="Bad request"),
     *     @OA\Response(response=404, description="Resource Not Found"),
     *     @OA\Response(response=500, description="server error")
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
     *     @OA\Response(response=200, description="successful operation"),
     *     @OA\Response(response=400, description="Bad request"),
     *     @OA\Response(response=404, description="Resource Not Found"),
     *     @OA\Response(response=500, description="server error")
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
        return 204;
    }
}
