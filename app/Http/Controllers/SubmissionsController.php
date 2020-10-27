<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Throwable;

use App\Models\Submission;

class SubmissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $submissions = Submission::all();
        return response()->json($submissions);
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
        // dd($request->all());
        $s = new Submission($request->all());
        $s->save();
        return response()->json(['result' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!$s = Submission::find($id)){
            return response()->json(['message' => 'not found!'], 404);
        }
        return response()->json($s);


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
        //dd($request->all());
        if(!$s = Submission::find($id)){
            return response()->json(['message' => 'not found!'], 404);
        }
        $s->fill($request->all());
        $s->save();
        return response()->json($s);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!$s = Submission::find($id)){
            return response()->json(['message' => 'not found!'], 404);
        }
        $s->destroy($id);
        return response()->json(['message' => 'submission deleted'], 200);
    }
}
