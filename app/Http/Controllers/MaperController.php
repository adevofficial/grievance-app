<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Maper;
use App\User;

class MaperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $allMapers = Maper::with("user")->paginate(10);
        $formSideBox = $request->query("form");
        $formSideData = [];

        switch ($formSideBox) {
            case 'create':
                $uid = $request->query("user_id");
                $userData = User::find($uid);
                $formSideData = ["userData" => $userData];
                break;
            default:
                $formSideBox = null;
                break;
        }

        return view("maper.index_maper")->with([
            "allMapers" => $allMapers,
            "formSideBox" => $formSideBox,
            "formSideData" => $formSideData
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
        $newMaper = new Maper($request->only(['type']));
        $newMaper->uid = $request->input('user_id');
        $newMaper->save();
        return redirect()->action("MaperController@index");
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
        Maper::find($id)->delete();
        return redirect()->back();
    }
}
