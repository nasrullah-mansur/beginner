<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //return $Tag = Tagoffset(1)->limit(6)->get();
       $tag = Tag::all();
        return view('admin.tag.index', compact('tag'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|unique:tags',

        ]);

        Tag::create($request->all());
        
        //Session::flash('success', 'Tag Created Successfully');
        Alert::toast('Toast Message', 'Toast Type');
        return redirect()->route('tag.index');

    }

 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tag  $Tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view('admin.tag.create', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tag  $Tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $Tag)
    {
       $Tag->update($request->all());
        Session::flash('update', 'Session Updated successfully');
       return redirect()->route('tag.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag  $Tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $Tag)
    {
        $Tag->delete();

        return redirect()->route('tag.index');
    }
}
