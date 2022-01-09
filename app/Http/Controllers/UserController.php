<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Contracts\Session\Session as SessionSession;
use Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.list');
    }

    public function listData()
    {   
        $data = User::get();
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                return '<a href="'.route('users.edit', $row->id).'" class="btn btn-info"><i class="fa fa-edit"></i></a><form action="'.route('users.destroy', $row->id).'" method="POST"><input type="hidden" name="_method" value="DELETE">'.csrf_field().'<button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button></form>';
            })
            ->editColumn('dob', function($row){
                return $row->dob->format('d-m-Y');
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        $data = $request->validated();
        $user = User::create($data);
        Session::flash('message', 'User Created.');
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        $data = $request->validated();
        $user->update($data);
        Session::flash('message', 'User Updated.');
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        Session::flash('message', 'User Deleted.');
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('users.index');
    }
}
