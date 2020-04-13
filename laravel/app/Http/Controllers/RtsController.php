<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Name;
use App\Resume;
use App\Tag;
use App\ResumeTag;

class RtsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $nrt = [];
        $rt = ResumeTag::join('tags', 'tag_id', '=', 'tags.id')
            ->join('resumes', 'resume_id', '=', 'resumes.id')
            ->join('names', 'name_id', '=', 'names.id')
            ->select('resume_id', 'tag', 'resume', 'name')
            ->get();
        foreach ($rt as $r) {
            $id = $r['resume_id'];
            if (! isset($nrt[$id]))
                $nrt[$id] = ['resume' => $r['resume'], 'name' => $r['name'], 'tag' => ''];
            $nrt[$id]['tag'] .= $r['tag'].', ';
        }
        return view('ntr', ['vars' => 
            [
                'name' => Name::all(),
                'tag' => Tag::all(),
                'resume' => Resume::all(),
                'resumetag' => $nrt
            ]
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
