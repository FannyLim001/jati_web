<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontributor extends Model
{
    protected $table = 'kontributor';

    protected $fillable = ['nama','peran_kontributor','jurnal_id'];

    public function jurnal()
    {
        return $this->belongsTo(Jurnal::class);
    }
}
