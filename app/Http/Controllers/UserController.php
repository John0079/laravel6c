<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        return User::all();
        $users = DB::table('users')->paginate(10);
        return $users;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $requestData = \request()->all();
        $info = User::forceCreate([
            'name' => $requestData['name'],
            'email' => $requestData['email'],
            'password' => password_hash($requestData['password'], PASSWORD_DEFAULT),
            'level' => $requestData['level'],
        ]);


        return response($info);
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
        //1. 判断当前登陆用户
        $user = Auth::user();
        $userId = $user['id'];
        if ($userId == 4) {
            $user = \App\User::find($id);
            return $user;
        } else {
            return $user;
        }
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
        $password = $request['password'];
        if($password){
            $rs = DB::table('users')
                ->where('id', $id)
                ->update([
                    'name' => $request['name'],
                    'email' => $request['email'],
                    'password' => password_hash($request['password'], PASSWORD_DEFAULT),
                    'level' => $request['level'],
                ]);
            return $rs;
        }else{
            $rs = DB::table('users')
                ->where('id', $id)
                ->update([
                    'name' => $request['name'],
                    'email' => $request['email'],
                    'level' => $request['level'],
                ]);
            return $rs;
        }
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
        $rs = DB::table('users')
            ->where('id', $id)
            ->delete();

        return $rs;

    }

    /**
     * search user
     *
     * @param
     * @return \Illuminate\Http\Response
     */
    public function search()
    {
        //
        $requestData = \request()->all();

        $likeEmail = '%'.$requestData['email'].'%';
        $likeName = '%'.$requestData['name'].'%';
        $level = $requestData['level'];
        $minDate = $requestData['date'];

        $users = DB::table('users')
            ->where('email', 'like', $likeEmail)
            ->where('name', 'like', $likeName)
            ->when($level,
                    function ($query, $level) {
                        return $query->where('level', $level);
                    }
                )
            ->when($minDate,
                function ($query, $minDate) {
                    return $query->where('level', '>', $minDate);
                }
            )
            ->paginate(10);

        return $users;
    }
}
