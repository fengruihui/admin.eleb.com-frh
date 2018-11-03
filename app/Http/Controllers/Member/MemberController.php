<?php

namespace App\Http\Controllers\Member;

use App\Models\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MemberController extends Controller
{
    public function index(){
        $members=Member::all();
        return view('member.index',['members'=>$members]);
    }
    public function show(Member $member){
        return view('member.show',['member'=>$member]);
    }
}
