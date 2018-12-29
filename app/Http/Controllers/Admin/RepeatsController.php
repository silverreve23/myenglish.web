<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repeat;
use App\Models\Synonyms;
use Illuminate\Http\Request;

class RepeatsController extends Controller{
    
    public function index(Request $request){
        $keyword = $request->get('search');
        $perPage = 15;
        if (!empty($keyword)) {
            $repeats = Repeat::where('user', auth()->user()->email)
                ->where(function($where) use($keyword){
                    return $where
                        ->where('word', 'LIKE', "%$keyword%")
                        ->orWhere('trans', 'LIKE', "%$keyword%")
                        ->orWhere('priority', 'LIKE', "%$keyword%");
                })
                ->with('synonyms')
                ->latest()->paginate($perPage);
        } else {
            $repeats = Repeat::where('user', auth()->user()->email)
                ->with('synonyms')
                ->latest()
                ->paginate($perPage);
        }
        return view('admin.repeats.index', compact('repeats'));
    }

    public function create(){
        return view('admin.repeats.create');
    }

    public function store(Request $request){
        $requestData = $request->all();
        $requestData['user'] = auth()->user()->email;
        Repeat::create($requestData);
        return redirect('/repeats')->with('flash_message', 'Repeat added!');
    }

    public function show($id){
        $repeat = Repeat::findOrFail($id);
        return view('admin.repeats.show', compact('repeat'));
    }

    public function edit($id){
        $repeat = Repeat::findOrFail($id);
        $synonyms = Synonyms::getSynonyms($repeat->word);
        $synonyms = implode(',', $synonyms->all());
        return view('admin.repeats.edit', compact('repeat', 'synonyms'));
    }

    public function update(Request $request, $id){
        $requestData = $request->all();
        $word = $requestData['word'];
        $synonym = $requestData['synonyms'];
        $repeat = Repeat::findOrFail($id);
        $repeat->update($requestData);
        $synissets = Synonyms::getSynonyms($word);
        $synonyms = explode(',', $synonym);
        $synonyms = collect($synonyms);
        $synonyms = $synonyms->diff($synissets);
        $synonyms = $synonyms->map(function ($item) use($word){
            return ['synonym' => $item, 'word' => $word];
        });
        Synonyms::insert($synonyms->all());

        return redirect('/repeats')->with('flash_message', 'Repeat updated!');
    }

    public function destroy($id){
        Repeat::destroy($id);

        return redirect('/repeats')->with('flash_message', 'Repeat deleted!');
    }
    
}
