<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repeat;
use Illuminate\Http\Request;

class RepeatsController extends Controller
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

        if (!empty($keyword)) {
            $repeats = Repeat::where('user', auth()->user()->email)
                ->where(function($where) use($keyword){
                    return $where
                        ->where('word', 'LIKE', "%$keyword%")
                        ->orWhere('trans', 'LIKE', "%$keyword%")
                        ->orWhere('priority', 'LIKE', "%$keyword%");
                })
                ->latest()->paginate($perPage);
        } else {
            $repeats = Repeat::where('user', auth()->user()->email)
                ->latest()
                ->paginate($perPage);
        }

        return view('admin.repeats.index', compact('repeats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.repeats.create');
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
        $requestData['user'] = auth()->user()->email;
        
        Repeat::create($requestData);

        return redirect('/repeats')->with('flash_message', 'Repeat added!');
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
        $repeat = Repeat::findOrFail($id);

        return view('admin.repeats.show', compact('repeat'));
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
        $repeat = Repeat::findOrFail($id);

        return view('admin.repeats.edit', compact('repeat'));
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
        
        $repeat = Repeat::findOrFail($id);
        $repeat->update($requestData);

        return redirect('/repeats')->with('flash_message', 'Repeat updated!');
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
        Repeat::destroy($id);

        return redirect('/repeats')->with('flash_message', 'Repeat deleted!');
    }
}
