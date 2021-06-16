<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use App\Models\Urun;
use App\Models\UrunDetay;
use Illuminate\Http\Request;
use mysqli;

class AnasayfaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $returnArray = kategori::whereRaw('ust_id is null')->get();
        $goster_slider = UrunDetay::with('urun')->where('goster_slider', 1)->OrderBy('id', 'DESC')->take(5)->get();

        $urun_gunun_firsati = Urun::select('uruns.*')
            ->join('urun_detays', 'urun_detays.urun_id', 'uruns.id')
            ->where('urun_detays.goster_gunun_firsati', 1)
            ->orderBy('updated_at', 'desc')
            ->first();

        $goster_one_cikan = Urun::select('uruns.*')
            ->join('urun_detays', 'urun_detays.urun_id', 'uruns.id')
            ->where('urun_detays.goster_one_cikan', 1)
            ->orderBy('updated_at', 'desc')
            ->take(4)
            ->get();

        $goster_cok_satan = Urun::select('uruns.*')
            ->join('urun_detays', 'urun_detays.urun_id', 'uruns.id')
            ->where('urun_detays.goster_cok_satan', 1)
            ->orderBy('updated_at', 'desc')
            ->take(4)
            ->get();

        $goster_indirimli = Urun::select('uruns.*')
            ->join('urun_detays', 'urun_detays.urun_id', 'uruns.id')
            ->where('urun_detays.goster_indirimli', 1)
            ->orderBy('updated_at', 'desc')
            ->take(4)
            ->get();

        // for ($i = 0; $i < count($goster_slider); $i++) {
        //     $urunler[] = $goster_slider[$i]->urun;
        // }
        return response()->json([
            'kategori' => $returnArray,
            'goster_slider' => $goster_slider,
            // 'urunler' => $urunler
            'urun_gunun_firsati' => $urun_gunun_firsati,
            'goster_one_cikan' => $goster_one_cikan,
            'goster_cok_satan' => $goster_cok_satan,
            'goster_indirimli' => $goster_indirimli

        ]);
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
        $returnArray = kategori::where('slug', $id)->get();

        return response()->json($returnArray);
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
