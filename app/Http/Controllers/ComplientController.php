<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Complient;
use App\ComplientStatus;
use Illuminate\Support\Facades\Auth;
use App\Mail\NewComplaint;
use Illuminate\Support\Facades\Mail;
use App\Maper;

class ComplientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if (Auth::user()->hasRole('admin')) {
            $allComplaints = Complient::with(['status' => function ($query) {
                $query->orderBy('created_at', 'desc');
            }, 'users'])->paginate(10);
        } else {
            $allComplaints = Auth::user()->complients()->with(['status' => function ($query) {
                $query->orderBy('created_at', 'desc');
            }])->paginate(10);
        }



        $formSideBox = $request->query("form");
        $formSideData = [];


        switch ($formSideBox) {
            case 'viewer':
                $cid = $request->query('complaint_id');
                $ViewComplient = Complient::with('status')->find($cid);
                $formSideData["ViewComplient"] = $ViewComplient;
                break;

            default:
                break;
        }
        return view("complaint.index_complaint")->with([
            "allComplaints" => $allComplaints,
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

        $input = $request->only(['subject', 'message', 'category']);

        $newComplient = new Complient($input);

        Auth::user()->complients()->save($newComplient);
        $users = Maper::with(['user'])->get()->pluck(['user']);

        Mail::to($users)->queue(new NewComplaint($newComplient));

        return redirect()->back();
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
        Complient::find($id)->delete();
        return redirect()->back();
    }

    public function status_create(Request $request)
    {
        $newStatus = new ComplientStatus($request->only(['status', 'status_body']));
        $newStatus->cid = $request->input("complient_id");
        $newStatus->save();
        return redirect()->back();
    }
}
