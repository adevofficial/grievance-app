<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $allUsers = User::with('roles')->paginate(10);
        $formSideBox = $request->query("form");
        $formSideData = ["name" => "", "email" => "", "password" => ""];
        switch ($formSideBox) {
            case 'viewer':
            case 'edit':
                $uid = $request->query("user_id");
                $formSideData = User::find($uid);
                break;
            case 'create':

                break;
            default:
                $formSideBox = null;
                break;
        }


        return view("user.index_user")->with([
            "allUsers" => $allUsers,
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

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'role' => 'required|string',
        ]);

        $newUser = new User();
        $newUser->password = bcrypt($request->input('password'));
        $newUser->email = $request->input('email');
        $newUser->name = $request->input('name');
        $newUser->save();

        $newUser->syncRoles([$request->input('role')]);

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
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|exists:users',
        ]);

        if (!empty($request->input('password'))) {
            $this->validate($request, [
                'password' => 'required|string|min:6',
            ]);
        }


        $newUser = User::find($id);
        if (!empty($request->input('password'))) {
            $newUser->password = bcrypt($request->input('password'));
        }
        $newUser->email = $request->input('email');
        $newUser->name = $request->input('name');

        $newUser->save();

        $newUser->syncRoles([$request->input('role')]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->back();
    }
}
