<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;

class CrudController extends Controller
{
    function createUser(Request $request) {
        if ($request->password !== $request->confirmPassword) {
            return back()->with('error','konfirmasi password berbeda');
        }
        $data = [
            'nama' => $request->name,
            'email' => $request->email,
            'no_hp' => $request->noHp,
            'password' => $request->password
        ];
        User::create($data);
        return redirect()->intended();
    }
    function updateUser(Request $request) {
        $user = User::where('id',session()->get('user_id'))->first();
        if ($user->password !== $request->password) {
            return back()->with('error','password salah');
        }
        $data = [
            'nama' => $request->name,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'no_hp' => $request->noHp,
        ];
        $user->update($data);
        return back()->with('error', 'Berhasil update profile');
    }

    function createPesanan(Request $request){
        $data = [
            'titik_ambil' => $request->titikAmbil,
            'tujuan' => $request->tujuan,
            'tanggal_pengambilan' => $request->tanggalPengambilan,
            'deskripsi' => $request->deskripsi,
            'user_id' => session()->get('user_id')
        ];
        Pesanan::create($data);
        return redirect()->intended('pesanan');
    }

    function updatePesanan(Request $request){
        $data = [
            'ongkos_kirim' => $request->ongkosKirim,
            'biaya_tambahan' => $request->biayaTambahan,
            'total' => $request->ongkosKirim + $request->biayaTambahan
        ];
        Pesanan::where('id', $request->id)->update($data);
        return redirect()->intended('pesanan');
    }

    function updatePembayaran(Request $request) {
        if (session()->get('role') == 2) {
            $data = [
                'status' => 2,
            ];
        }
        else {
            $data = [
                'status' => 3,
            ];
        }
        Pesanan::where('id',$request->id)->update($data);
        return redirect()->intended('pesanan');
    }
    
    function createReview(Request $request){
        $data = [
            'pesanan_id' => $request->layanan,
            'user_id' => session()->get('user_id'),
            'review' => $request->review, 
        ];
        Review::create($data);
        return back()->with('error','Berhasil menambahkan review');
    }
}
