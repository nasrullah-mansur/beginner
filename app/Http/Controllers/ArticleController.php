<?php

namespace App\Http\Controllers;


use App\Article;
use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //return Article::whereYear('created_at', '2020')->get();
        // return Article::whereMonth('created_at', '08')->get();
        //return Article::whereDay('created_at', '18')->get();

        //return Article::whereYear('created_at', '2021')->whereDay('created_at', '18')->toSql();
        //return Article::whereYear('created_at', '2021')->orwhereDay('created_at', '18')->toSql();

        $articles = Article::all();
        $article_count = Article::count();

        return view('article.index', compact('articles', 'article_count'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        // $request->validate([
        //     'title' => 'required',
        //     'description' => 'required'
        // ], [
        //     'title.required' => 'Please write title',
        //     'description.required' => 'Please write description',
        // ]);


        // Validator::make($request->all(), [
        //     'title' => 'required',
        //     'description' => 'required',
        // ], [
        //     'title.required' => 'title is needed',
        // ])->validate();

        // if ($validator->fails()) {
        //     return redirect(route('article.create'))
        //         ->withErrors($validator)
        //         ->withInput();
        // }

        Article::create($request->all());
        return redirect()->route('article.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //$article = Article::findOrfail($id);

        return view('article.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, Article $article)
    {
        //$article = Article::findOrFail($id);

        $article->update([
            'title' => $request->title,
            'description' => $request->description
        ]);

        return redirect()->route('article.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //Article::findOrFail($id)->delete();
        $article->delete();

        return redirect()->route('article.index');
    }
}
