<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.             
     
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        $kategori = kategori::where('slug', $id)->get();
        $alt_kategori = kategori::where('ust_id', $kategori[0]->id)->get();

        $fiyati = request('fiyati');
        if ($fiyati == null) {
            $fiyati = 0;
        }
        if ($fiyati <= 10) {
            $fiyati = $fiyati;
            $operator = "<";
            $filter = $kategori[0]->urunler()
                ->where('fiyati', "<", $fiyati)
                ->get();
        } else if ($fiyati >= 10) {
            $fiyati = $fiyati;
            $operator = '>';
            $filter = $kategori[0]->urunler()
                ->where('fiyati', $operator, $fiyati)
                ->get();
        }

        $order = request('order');
        if ($order == "coksatanlar") {
            $urunler = $kategori[0]->urunler()
                ->join('urun_detays', 'urun_detays.urun_id', 'uruns.id')
                ->orderByDesc('urun_detays.goster_cok_satan')
                ->get();
        } else if ($order == 'yeni') {
            $urunler = $kategori[0]->urunler()
                ->orderBy('id', 'desc')
                ->get();
        } else {
            $urunler = $kategori[0]->urunler;
        }
    

        return response()->json([
            'alt_kategoriler' => $alt_kategori,
            'urunler' => $urunler,
            'filter' => $filter
        ]);
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
        //
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
    }
}
