<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\Review;
use App\Models\User;
use Carbon\PHPStan\LazyMacro;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    function index() {
        if (session()->get('role') == 1) {
            $data = Pesanan::where('status','<=',2)->orderBy('updated_at','desc')->get();
        } else {
            $data = Pesanan::where('user_id',session()->get('user_id'))->where('status','<=',2)->orderBy('updated_at','desc')->get();
        }
        return view("pesanan", [
            'data' => $data
        ]);
    } 
    function pesanLayanan() {
        return view("pesanLayanan");
    } 

    function review(){
        if (session()->get('role') == 1) {
            $review = Review::limit(10)->get();
        } else {
            $review = Review::where('user_id',session()->get('user_id'))->limit(10)->get();
        }
        $layanan = Pesanan::select('id','titik_ambil','tujuan')->where('user_id',session()->get('user_id'))->where('status',3)->get();
        return view("review",[
            'review' => $review,
            'layanan' => $layanan
        ]);
    }

    function history() {
        if (session()->get('role') == 1) {
            $data = Pesanan::orderBy('updated_at','desc')->get();
        } else {
            $data = Pesanan::where('user_id', session()->get('user_id'))->orderBy('updated_at','desc')->get();
        }
        return view("history",[
            'data' => $data
        ]);
    }

    function edit(Request $request) {
        $data = Pesanan::where('id', $request->id)->first();
        return view("edit",[
            'data' => $data
        ]);
    }

    function profile() {
        $data = User::where('id',session()->get('user_id'))->first();
        return view("profile",[
            'data' => $data
        ]);
    }

}
