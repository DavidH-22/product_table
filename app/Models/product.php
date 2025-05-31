<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;   


class product extends Model
{
   
    use HasFactory, SoftDeletes;
  
    protected $table = 'product';
    protected $dates =['deleted_at'];
    protected $fillable = [
        'Nama',
        'Deskripsi',
        'Harga',
        'Kategori'
    ];

    
}
