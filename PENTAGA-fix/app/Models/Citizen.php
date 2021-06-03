<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Citizen extends Model
{
    use HasFactory;
    protected $fillable = [
    'nama',
    'noKK',
    'tempatLahir',
    'tanggalLahir',
    'dusun',
    'lorong',
    'noRumah',
    'luasPetakRumah',
    'jumlahTanggungan',
    'noHP',
    'profesi',
    'penghasilan',
    'jumlahKendaraan',
    'kepemilikanRumah',
    'pernahMenerimaBantuan',
    'tagihanListrikPerbulan',
    'tagihanListrikPerbulanBukti',
    'tagihanAirPerbulan',
    'tagihanAirPerbulanBukti',
    'konstruksiRumah',
    'konstruksiRumahBukti',
    'golongan'];
}
