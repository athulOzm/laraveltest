<?php

namespace App\Http\Controllers;

use App\Events\MemberRegistered;
use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{

    public function index(){

        return view('members.index', [$members => Member::all()]);
    }


    public function store(Request $request){

        Member::create($this->validateReq($request));

        MemberRegistered::dispatch();

        return redirect(route('member.index'));
    }


    public function validateReq($request){

        return $request->validate([
            'name'  => 'required',
            'age'   =>  "numeric",
            'email' =>  'required|unique:members'
        ]);
    }
}
