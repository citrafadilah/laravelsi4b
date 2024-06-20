<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(auth()->user()->role == 'D') { // jika role Dosen(D)
            $mahasiswa = Mahasiswa::where('user_id', auth()->user()->id)->get();
            // select * from mahasiswas where user_id = 1
        } else {
            $mahasiswa = Mahasiswa::all(); // select * from mahasiswas
        }
        return view('mahasiswa.index')
                ->with('mahasiswa', $mahasiswa);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $prodi = Prodi::all();
        return view('mahasiswa.create')->with('prodi', $prodi);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $val = $request->validate([
            'npm' => "required|unique:mahasiswas",
            'nama' => "required",
            'tempat_lahir' => "required",
            'tanggal_lahir' => "required|date",
            'alamat' => "required",
            'url_foto' => "required|file|mimes:png,jpg|max:5000",
            'prodi_id' => "required"
        ]);

        // ekstensi file yang di upload
        $ext = $request->url_foto->getClientOriginalExtension();
        // rename misal: npm.extensi 2226240001.png
        $val['url_foto'] = $request->npm.".".$ext;
        // upload ke dalam folder public/foto
        $request->url_foto->move('foto', $val['url_foto']);

        // simpan ke tabel mahasiswas
        Mahasiswa::create($val);

        // redirect ke halaman list prodi
        return redirect()-> route('mahasiswa.index')->with('success', $val['nama'].' berhasil disimpan');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        // dd($mahasiswa);
        $prodi = Prodi::all();
        return view('mahasiswa.edit')->with('prodi', $prodi)->with('mahasiswa', $mahasiswa);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        if(auth()->user()->cannot('delete', $mahasiswa)) {
            abort(403);
        }
        // dd($request);
        if($request->url_foto) { // jika ada file foto yg dilampirkan
            $val = $request->validate([
                // 'npm' => "required|unique:mahasiswas",
                'nama' => "required",
                'tempat_lahir' => "required",
                'tanggal_lahir' => "required|date",
                'alamat' => "required",
                'url_foto' => "required|file|mimes:png,jpg|max:5000",
                'prodi_id' => "required"
            ]);

             // ekstensi file yang di upload
            $ext = $request->url_foto->getClientOriginalExtension();
            // rename misal: npm.extensi 2226240001.png
            $val['url_foto'] = $request->npm.".".$ext;
            // upload ke dalam folder public/foto
            $request->url_foto->move('foto', $val['url_foto']);

        } else { // jika tidak ada file foto
            $val = $request->validate([
                // 'npm' => "required|unique:mahasiswas",
                'nama' => "required",
                'tempat_lahir' => "required",
                'tanggal_lahir' => "required|date",
                'alamat' => "required",
                // 'url_foto' => "required|file|mimes:png,jpg|max:5000",
                'prodi_id' => "required"
            ]);

        }

        // simpan ke tabel mahasiswas
        Mahasiswa::where('id', $mahasiswa['id'])->update($val);

        // redirect ke halaman list prodi
        return redirect()-> route('mahasiswa.index')->with('success', $val['nama'].' berhasil disimpan');
        
    }

    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        if(auth()->user()->cannot('delete', $mahasiswa)) {
            abort(403);
        }
        // dd($mahasiswa);
        File::delete('foto/'. $mahasiswa['url_foto']);
        $mahasiswa->delete(); // hapus data mahasiswa
        return redirect()->route('mahasiswa.index')->with('success', 'Data berhasil dihapus.');
    }
}
