<?php

namespace App\Http\Controllers;

use App\Models\Hasil;
use App\Models\User;
use App\Models\Pemain;
use App\Http\Requests\StoreHasilRequest;
use App\Http\Requests\UpdateHasilRequest;
use Illuminate\Support\Facades\Auth;

class HasilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hasils = Hasil::where('user_id', Auth::user()->id)->orderBy('nilai', 'DESC')->get();
        if($hasils!=null){
            $type_menu = "";
            return view('pemain.hasil', compact("type_menu", "hasils"));
        }
        return redirect()->route('pemain.hasil')
        ->with('error','Belum ada data yang terkalkulasi silahkan pergi ke halaman daftar pemain dan mulai kalkuulasi');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generate()
    {
        $type_menu = "";
        return redirect()->route('pemain.hasilStore');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreHasilRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        Hasil::truncate();
        $pemains = Pemain::where('user_id', Auth::user()->id)->get();
        foreach ($pemains as $pemain)
        {
            $new = new Hasil();
            $new->user_id=Auth::user()->id;
            $new->nama=$pemain->nama;
            $new->nama_team=$pemain->nama_team;
            $new->position=$pemain->position;
            $new->usia=$pemain->usia;
            $new->nomor_punggung=$pemain->nomor_punggung;
            $new->nilai=($pemain->goal_cleansheet*0.34)+($pemain->assist_save*0.16)+($pemain->red_card*0.34)+($pemain->yellow_card*0.16);
            // $nilaiGoal=$pemain->goal_cleansheet;
            // $nilaiAsist=$pemain->assist_save;
            // $nilaiRed->red_card=$pemain->red_card;
            // $nilaiYellow=$pemain->yellow_card;
            $new->save();
        }
        $type_menu = "";
        return redirect()->route('pemain.hasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hasil  $hasil
     * @return \Illuminate\Http\Response
     */
    public function show(Hasil $hasil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hasil  $hasil
     * @return \Illuminate\Http\Response
     */
    public function edit(Hasil $hasil)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateHasilRequest  $request
     * @param  \App\Models\Hasil  $hasil
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHasilRequest $request, Hasil $hasil)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hasil  $hasil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hasil $hasil)
    {
        //
    }
}
