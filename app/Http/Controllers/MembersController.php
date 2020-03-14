<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;

class MembersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = Member::orderBy('name','asc')->paginate(10);
        return view('members.index')->with('members',$members);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('members.create');
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
            'name' => 'required',
            'father' => 'required',
            'phone' => 'required',
            'dob' => 'required',
            'address' => 'required',
            'section' => 'required',
            'valid' => 'required',
        ]);

        $member = new Member;
        $member->name = $request->input('name');
        $member->father = $request->input('father');
        $member->phone = $request->input('phone');
        $member->dob = $request->input('dob');
        $member->address = $request->input('address');
        $member->section = $request->input('section');
        $member->valid = $request->input('valid');
        $member->user_id = auth()->user()->id;

        $member->save();

        return redirect('/members')->with('success','Member Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $member = Member::find($id);
        return view('members.show')->with('member',$member);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $member = Member::find($id);
        return view('members.edit')->with('member',$member);
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
            'name' => 'required',
            'father' => 'required',
            'phone' => 'required',
            'dob' => 'required',
            'address' => 'required',
            'section' => 'required',
            'valid' => 'required',
        ]);

        $member = Member::find($id);
        $member->name = $request->input('name');
        $member->father = $request->input('father');
        $member->phone = $request->input('phone');
        $member->dob = $request->input('dob');
        $member->address = $request->input('address');
        $member->section = $request->input('section');
        $member->valid = $request->input('valid');

        $member->save();

        return redirect('/members')->with('success','Member Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $member = Member::find($id);
        $member->delete();
        return redirect('/members')->with('success','Member Removed');

    }
}
