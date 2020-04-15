<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Name;

class NameController extends Controller
{

    /**
     * @OA\Get(
     *     path="/api/name",
     *     operationId="nameIndex",
     *     tags={"Name"},
     *     summary="index",
     *     description="Display a listing of the name table.",
     *     @OA\Response(response=200, description="successful operation"),
     *     @OA\Response(response=500, description="server error")
     * )
     * @OA\Head(
     *     path="/api/name",
     *     operationId="nameIndex",
     *     tags={"Name"},
     *     summary="index",
     *     description="Display a listing of the name table.",
     *     @OA\Response(response=200, description="successful operation"),
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
     *     operationId="nameStore",
     *     tags={"Name"},
     *     summary="store",
     *     description="Display a listing of the name table.",
     *     @OA\Response(response=200, description="successful operation"),
     *     @OA\Response(response=500, description="server error")
     * )
     *
     * Store a newly created resource in storage.
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Name::find($id); 
    }

    /**
     * Update the specified resource in storage.
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
     * Remove the specified resource from storage.
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
