<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\kelontong_549;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    public function home()
    {
        return view("home", ["key" => "home"]);
    }

    public function kelontong_549()
    {
        $kelontong_549 = kelontong_549::orderBy('id', 'desc')->get();
        return view("kelontong_549", ["key" => "kelontong_549", "kl" => $kelontong_549]);
    }


    public function formAddKelontong_549()
    {
        return view("form-add", ["key"=>"kelontong_549"]);
    }

    public function savekelontong_549(Request $request)
    {
    $file_name = $request->file('pesanan')->getClientOriginalName();
    $path = $request->file('pesanan')->storeAs('pesanan', $file_name, 'public');

    kelontong_549::create([
        'id' => $request->id,
        'produk' => $request->produk,
        'kategori' => $request->kategori,
        'pesanan' => $path,
        'pelanggan' => $request->pelanggan
    ]);

    return redirect('/kelontong_549')->with('alert', 'Data Berhasil di Simpan');
}
    public function formeditkelontong_549($id)
    {
        $kelontong_549 = kelontong_549::find($id);
        return view("form-edit", ["key" => "kelontong_549", "kl" => $kelontong_549]);
    }

    public function updatekelontong_549($id, Request $request)
    {
        $kelontong_549 = kelontong_549::find($id);

        $kelontong_549->produk = $request->produk;
        $kelontong_549->kategori = $request->kategori;
        $kelontong_549->pelanggan = $request->pelanggan;
        $kelontong_549->pesanan = $request->pesanan;
        
        if($request->pesanan)
        {
            if($kelontong_549->pesanan)
            {
                Storage::disk('public')->delete($kelontong_549->pesanan);
            }

            $file_name = time().'-'.$request->file('pesanan')->getClientOriginalName();
            $path = $request->file('pesanan')->storeAs('pesanan', $file_name, 'public');
            $kelontong_549->pesanan = $path;
        }

        $kelontong_549->save();
        return redirect("/kelontong_549")->with('alert', 'Data Berhasil di Ubah');
    }

    public function deletekelontong_549($id)
    {
        $kelontong_549 = kelontong_549::find($id);
        if ($kelontong_549->pesanan)
        {
            Storage::disk('public')->delete($kelontong_549->pesanan);
        }
        $kelontong_549->delete();

        return redirect("/kelontong_549")->with('alert', 'Data Berhasil di Hapus');
    }

    public function login()
    {
        return view("login");
    }

    public function formedituser()
    {
        return view("formedituser", ["key"=>""]);
    }

    public function updateuser(Request $request)
    {
        if($request -> password_baru == $request->konfirmasi_password)
        {
            $user = Auth::user();
            $user -> password = bcrypt($request->password_baru);
            $user -> save();

            return redirect("/user") -> with("info", "Password Berhasil di Ubah");
        }

        else
        {
            return redirect ("/user")-> with("info", "Password Gagal di Ubah");
        }
    }

}
?>