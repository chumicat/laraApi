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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $r = $request->toArray();
        $rt = $this->join();
        $tagList = isset($r['tag']) ? explode(',', $r['tag']) : [];

        if ($r != [])
            foreach ($r as $key => $val)
                if ($key != 'tag')
                    $rt = $rt->where($key, $val);

        return view('ntr', ['vars' => 
            [
                'name' => Name::all(),
                'tag' => Tag::all(),
                'resume' => Resume::all(),
                'resumetag' => $this->toNtr($rt, $tagList)
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
        return view('ntr', ['vars' => 
            [
                'name' => [],
                'tag' => Tag::all(),
                'resume' => [],
                'resumetag' => []
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
                'resumetag' => $this->toNtr($rt)
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
