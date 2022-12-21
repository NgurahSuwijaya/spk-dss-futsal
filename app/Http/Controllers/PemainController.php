<?php

namespace App\Http\Controllers;

use App\Models\Pemain;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\CsvFileRequest;
use App\Http\Requests\StorePemainRequest;
use App\Http\Requests\UpdatePemainRequest;
use Illuminate\Support\Facades\Auth;
use App\Exports\PemainExport;
use App\Imports\PemainImport;
use Maatwebsite\Excel\Facades\Excel;
class PemainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pemains = Pemain::where('user_id', Auth::user()->id)->get();
        $type_menu = "";
        return view('pemain.index', compact("type_menu", "pemains"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type_menu = "";
        return view('pemain.store', compact("type_menu"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePemainRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePemainRequest $request)
    {   
        if($request->validated()){
            $pemain = $request->validated();
            $request['user_id'] = Auth::user()->id;
            $new = new Pemain();
            $new->user_id=Auth::user()->id;
            $new->nama=$request->nama;
            $new->nama_team=$request->nama_team;
            $new->position=$request->position;
            $new->usia=$request->usia;
            $new->nomor_punggung=$request->nomor_punggung;
            $new->goal_cleansheet=$request->goal_cleansheet;
            $new->assist_save=$request->assist_save;
            $new->red_card=$request->red_card;
            $new->yellow_card=$request->yellow_card;
            $new->save();

            // dd($pemain);
            // Pemain::create($request->all());
        
            return redirect()->route('pemain')
                            ->with('success','Berhasil menambahkan pemain.');
        }
        return redirect()->route('pemain.store')
                            ->with('error-input','Pastikan Input Anda Sudah Sesuai');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pemain  $pemain
     * @return \Illuminate\Http\Response
     */
    public function show(Pemain $pemain)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pemain  $pemain
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pemain = Pemain::find($id);
        $type_menu = "";
        return view('pemain.edit', compact("type_menu", "pemain"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePemainRequest  $request
     * @param  \App\Models\Pemain  $pemain
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePemainRequest $request, $id)
    {
        $pemainRequest = $request->validated();
        $pemain = Pemain::find($id);
        $pemain->user_id=Auth::user()->id;
        $pemain->nama=$request->nama;
        $pemain->nama_team=$request->nama_team;
        $pemain->position=$request->position;
        $pemain->usia=$request->usia;
        $pemain->nomor_punggung=$request->nomor_punggung;
        $pemain->goal_cleansheet=$request->goal_cleansheet;
        $pemain->assist_save=$request->assist_save;
        $pemain->red_card=$request->red_card;
        $pemain->yellow_card=$request->yellow_card;
        $pemain->save();
       
        return redirect()->route('pemain')
                        ->with('success','Berhasil mengubah data pemain.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pemain  $pemain
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pemain = Pemain::find($id);
        $pemain->delete();
       
        return redirect()->route('pemain')
                        ->with('success','Berhasil menghapus pemain.');

    }
    public function importExcelCSV(Request $request) 
    {   
        $request->validate([
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        $file = $request->file('file');
        $nama_file = rand().$file->getClientOriginalName();
        $file->move('file_pendaftar',$nama_file);
        $datas = Excel::toCollection(new PemainImport, public_path('/file_pemain/'.$nama_file));

        foreach($datas[0] as $data){
            $pemain = new Pemain();
            $pemain->user_id=Auth::user()->id;
            $pemain->nama=$data['nama'];
            $pemain->nama_team=$data['nama_team'];
            $pemain->position=$data['position'];
            $pemain->usia=$data['usia'];
            $pemain->nomor_punggung=$data['nomor_punggung'];
            $pemain->goal_cleansheet=$data['goal_cleansheet'];
            $pemain->assist_save=$data['assist_save'];
            $pemain->red_card=$data['red_card'];
            $pemain->yellow_card=$data['yellow_card'];
            $pemain->save();
        }

        return redirect('pemain')->with('success', 'The file has been excel/csv imported to database');
    }
 
    /**
    * @return \Illuminate\Support\Collection
    */
    public function exportExcelCSV($slug) 
    {
        return Excel::download(new PemainExport, 'users.'.$slug);
    }
}
