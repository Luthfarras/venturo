<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    //
    public function index()
    {
        return view('home');
    }
    
    public function store(Request $request)
    {
        $tahun = $request->tahun;
        $menu = Http::get('http://tes-web.landa.id/intermediate/menu');
        $transaksi = Http::get('http://tes-web.landa.id/intermediate/transaksi?tahun='. $tahun);
        $data1 = json_decode($menu);
        $data2 = json_decode($transaksi);
        $nilai = 0;

        if ($request->tahun) {
            foreach ($data2 as $hasil) {
                $nilai += $hasil->total;
            }
    
            foreach($data1 as $item){
                for ($i=1; $i <= 12 ; $i++) { 
                    $result[$item->menu][$i] = 0;
                }
            }
    
            foreach($data2 as $dt){
                $bulan = date('n', strtotime($dt->tanggal));
                $result[$dt->menu][$bulan] += $dt->total;
            }
    
            foreach ($data2 as $jml) {
                for ($i=1; $i <= 12 ; $i++) { 
                    $jumlah[$i] = 0;
                }
            }
    
            foreach ($data2 as $totalb) {
                $bulans = date('n', strtotime($totalb->tanggal));
                $jumlah[$bulans] += $totalb->total;
            }
    
            foreach($data1 as $totalm){
                $jumlahm[$totalm->menu] = 0;
            }
    
            foreach ($data2 as $trans) {
                $jumlahm[$trans->menu] += $trans->total;
            }
            return view('home', compact('tahun', 'data1', 'data2', 'result', 'nilai', 'jumlah', 'jumlahm'));
        }else {
            return redirect('/');
        }        
    }
}