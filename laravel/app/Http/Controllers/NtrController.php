<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Name;
use App\Resume;
use App\Tag;
use App\ResumeTag;

class NtrController extends Controller
{
    private function join(){
        return ResumeTag::join('tags', 'tag_id', '=', 'tags.id')
            ->join('resumes', 'resume_id', '=', 'resumes.id')
            ->join('names', 'name_id', '=', 'names.id')
            ->select('resume_id', 'tag', 'resume', 'name');
    }

    private function toNtr($rt, $tagList = []){
        $ntr = [];
        foreach ($rt->get() as $r) {
            $id = $r['resume_id'];
            if (! isset($ntr[$id]))
                $ntr[$id] = ['resume' => $r['resume'], 'name' => $r['name'], 'tag' => []];
            $ntr[$id]['tag'][] = $r['tag'];
        }


        foreach ($ntr as &$r) {
            foreach ($tagList as $tag) {
                if ( !in_array($tag, $r['tag']) ) {
                    $r = null;
                    break;
                }
            }
        }
        $ntr = array_filter($ntr);

        foreach ($ntr as &$r) {
            $r['tag'] = implode(', ', $r['tag']);
        }
        return $ntr;
    }

    private function ntrsearch(Request $request) {
        $r = $request->toArray();
        $rt = $this->join();
        $tagList = isset($r['tag']) ? explode(',', $r['tag']) : [];

        if ($r != [])
        foreach ($r as $key => $val)
            if ($key != 'tag')
                $rt = $rt->where($key, $val);

        return $this->toNtr($rt, $tagList);
    }

    /**
     * @OA\Get(
     *     path="/ntr",
     *     operationId="getNtrIndex",
     *     tags={"NTR"},
     *     summary="index (Please open in browser)",
     *     description="Display listing of names, resumes, tags, resume_tag table. (Please open in browser)",
     *     @OA\Parameter(
     *         name="name",
     *         description="Name",
     *         required=false,
     *         in="query",
     *         @OA\Schema(type="string"),
     *         example="Chumicat"
     *     ),
     *     @OA\Parameter(
     *         name="tag",
     *         description="Tag",
     *         required=false,
     *         in="query",
     *         @OA\Schema(type="string"),
     *         example="Cat,Dog"
     *     ),
     *     @OA\Parameter(
     *         name="resume",
     *         description="Resume",
     *         required=false,
     *         in="query",
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(response=200, description="Successful get all data"),
     *     @OA\Response(response=500, description="Server error")
     * )
     * 
     * @OA\Head(
     *     path="/ntr",
     *     operationId="headNtrIndex",
     *     tags={"NTR"},
     *     summary="index (Please open in browser)",
     *     description="Display listing of names, resumes, tags, resume_tag table. (Please open in browser)",
     *     @OA\Parameter(
     *         name="name",
     *         description="Name",
     *         required=false,
     *         in="query",
     *         @OA\Schema(type="string"),
     *         example="Chumicat"
     *     ),
     *     @OA\Parameter(
     *         name="tag",
     *         description="Tag",
     *         required=false,
     *         in="query",
     *         @OA\Schema(type="string"),
     *         example="Cat,Dog"
     *     ),
     *     @OA\Parameter(
     *         name="resume",
     *         description="Resume",
     *         required=false,
     *         in="query",
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(response=200, description="Successful get all data"),
     *     @OA\Response(response=500, description="Server error")
     * )
     * 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        return view('ntr', ['vars' => 
            [
                'name' => Name::all(),
                'tag' => Tag::all(),
                'resume' => Resume::all(),
                'ntr' => $this->ntrsearch($request)
            ]
        ]);
    }

    /**
     * @OA\Get(
     *     path="/ntr/create",
     *     operationId="getNtrCreate",
     *     tags={"NTR"},
     *     summary="create (Please open in browser)",
     *     description="Add name, resume, tag, resume_rag with form.",
     *     @OA\Parameter(
     *         name="name",
     *         description="Name",
     *         required=false,
     *         in="query",
     *         @OA\Schema(type="string"),
     *         example="Chumicat"
     *     ),
     *     @OA\Parameter(
     *         name="tag",
     *         description="Tag",
     *         required=false,
     *         in="query",
     *         @OA\Schema(type="string"),
     *         example="Cat,Dog"
     *     ),
     *     @OA\Parameter(
     *         name="resume",
     *         description="Resume",
     *         required=false,
     *         in="query",
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(response=200, description="Finish operation"),
     *     @OA\Response(response=500, description="Server error")
     * )
     * 
     * @OA\Head(
     *     path="/ntr/create",
     *     operationId="headNtrCreate",
     *     tags={"NTR"},
     *     summary="create (Please open in browser)",
     *     description="Add name, resume, tag, resume_rag with form.",
     *     @OA\Parameter(
     *         name="name",
     *         description="Name",
     *         required=false,
     *         in="query",
     *         @OA\Schema(type="string"),
     *         example="Chumicat"
     *     ),
     *     @OA\Parameter(
     *         name="tag",
     *         description="Tag",
     *         required=false,
     *         in="query",
     *         @OA\Schema(type="string"),
     *         example="Cat,Dog"
     *     ),
     *     @OA\Parameter(
     *         name="resume",
     *         description="Resume",
     *         required=false,
     *         in="query",
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(response=200, description="Finish operation"),
     *     @OA\Response(response=500, description="Server error")
     * )
     * 
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('ntrCreate', ['vars' => 
            [
                'name' => Name::all(),
                'tag' => Tag::all(),
                'resume' => Resume::all(),
                'ntr' => $this->ntrsearch($request)
            ]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * @OA\Get(
     *     path="/ntr/{id}",
     *     operationId="getNtrShow",
     *     tags={"NTR"},
     *     summary="show (Please open in browser)",
     *     description="Display the specified name, tag, resume with its id. (Please open in browser)",
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
     *     path="/ntr/{id}",
     *     operationId="headNtrShow",
     *     tags={"NTR"},
     *     summary="show (Please open in browser)",
     *     description="Display the specified name, tag, resume with its id. (Please open in browser)",
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
        $rt = $this->join()->where('resume_id', $id);

        return view('ntr', ['vars' => 
            [
                'name' => Name::all(),
                'tag' => Tag::all(),
                'resume' => Resume::all(),
                'ntr' => $this->toNtr($rt)
            ]
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
