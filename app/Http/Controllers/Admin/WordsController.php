<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Word;
use Illuminate\Http\Request;

class WordsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 15;

        $words = Word::when($keyword, function($query) use($keyword){
            return $query
                ->where('word', 'LIKE', "%$keyword%")
                ->orWhere('trans', 'LIKE', "%$keyword%");
        })
        ->paginate($perPage);
        
        return view('admin.words.index', compact('words'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.words.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        Word::create($requestData);

        return redirect('/words')->with('flash_message', 'Word added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $word = Word::findOrFail($id);

        return view('admin.words.show', compact('word'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $word = Word::findOrFail($id);

        return view('admin.words.edit', compact('word'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $word = Word::findOrFail($id);
        $word->update($requestData);

        return redirect('/words')->with('flash_message', 'word updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Word::destroy($id);

        return redirect('/words')->with('flash_message', 'Word deleted!');
    }
}
