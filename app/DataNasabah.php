<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataNasabah extends Model
{
    protected $table = "data_nasabah";

    protected $fillable = ['nama', 'tlp', 'alamat', 'email'];
}
