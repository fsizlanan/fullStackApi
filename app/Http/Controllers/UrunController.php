<?php

namespace App\Http\Controllers;

use App\Models\Urun;
use Illuminate\Http\Request;

class UrunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $urun = Urun::all();


        return response()->json($urun);
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
        $returnData = Urun::where('slug', $id)->get();
        $kategoriler = $returnData[0]->kategoriler;


        return response()->json(
            [
                'urun' => $returnData,
                'kategoriler' => $kategoriler,
            ]
        );
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

    public function search($search)
    {
        $search = Urun::where('urun_adi', 'like', "%$search%")
            ->orWhere('aciklama', 'like', "%$search%")
            ->paginate(8);
        
            return response()->json($search);
    }
}
