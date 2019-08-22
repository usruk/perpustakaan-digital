<?php

namespace App\Http\Controllers;

use App\Berita;
use App\Buku;
use App\BukuTransaksi;
use App\Info;
use App\Topik;
use App\User;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $user = User::all()->count();
        $buku = Buku::all()->count();
        $info = Info::all()->first();
        $topik = Topik::orderBy('order', 'ASC')->limit(4)->get();
        $berita =  Berita::latest()->get();
        return view('layouts.app', compact('berita','buku','user','info', 'topik'));
    }

    public function berita($slug)
    {
        $result = Berita::where('slug', $slug)->firstOrFail();
        return view('berita', compact('result')); 
    }

    public function buku($slug)
    {
        $result = Buku::with(['buku_transaksi.pengarang' => function($q){
            $q->select('id', 'nama_pengarang');
        }, 'buku_transaksi.penerbit' => function($q){
            $q->select('id', 'nama_penerbit');
        }, 'buku_transaksi.kota' => function($q){
            $q->select('id', 'nama_kota');
        }, 'buku_transaksi.bahasa' => function($q){
            $q->select('id', 'jenis_bahasa');
        }, 'bibliobigrafi.gmd' => function($q){
            $q->select('id', 'nama_gmd');
        }, 'bibliobigrafi.klasifikasi' => function($q) {
            $q->select('id', 'tipe_klasifikasi');
        }, 'buku_transaksi.topik' => function($q) {
            $q->select('id', 'jenis_topik', 'warna');
        }])->where('slug', $slug)->firstOrFail();
        return view('buku', compact('result'));;
    }

    public function baca($slug)
    {
        $result = Buku::where('slug', $slug)->firstOrFail();
        return view('baca', compact('result'));
    }

    public function random_topik()
    {
        return Topik::orderByRaw("RAND()")->first();
    }

    public function item($id)
    {
        return Buku::with(['buku_transaksi.pengarang' => function($q) {
            $q->select('id', 'nama_pengarang');
        }])->where('topik_id', $id)->limit(4)->get();
    }

    public function cari(Request $request)
    {
        $result = Buku::with(['buku_transaksi.pengarang' => function($q) {
            $q->select('id', 'nama_pengarang');
        }, 'buku_transaksi.penerbit', 'bibliobigrafi.gmd' => function($q) {
            $q->select('id', 'nama_gmd')->first();
        }])->where('judul', 'LIKE' ,"%".$request->cari."%")->get();
        $cari = $request->cari;
        return view('result-topik-search', compact('result', 'cari'));
    }

    public function result($slug)
    {
       $result = Topik::with(['buku', 'buku.buku_transaksi.pengarang' => function($q) {
            $q->select('id', 'nama_pengarang');
        }, 'buku.buku_transaksi.penerbit', 'buku.bibliobigrafi.gmd' => function($q) {
            $q->select('id', 'nama_gmd')->first();
        }])->where('slug', $slug)->first();

        return view('result-topik', compact('result'));
    }


}
