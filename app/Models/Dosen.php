<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    protected $table = 'dosens';
    
    protected $fillable = [
        'nip',
        'nama',
        'email',
        'phone'
    ];
    
    protected $guarded = ['id'];

    public function mataKuliahs()
    {
        return $this->hasMany(MataKuliah::class);
    }
}
