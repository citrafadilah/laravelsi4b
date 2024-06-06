<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    public function Prodi(){
        return $this->belongsTo(Prodi::class,'prodi_id');
        //return $this->belongsTo(Nama_Model::class, 'foreign_key');
        //1 prodi 1 fakultas belongsto()
        //1 fakultas > 1 prodi hasMany()
        
    }
    protected $fillable = ['id','npm','nama','tempat_lahir','tanggal_lahir','alamat','prodi_id','url_foto'];

}
