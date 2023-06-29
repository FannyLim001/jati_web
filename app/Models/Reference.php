<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reference extends Model
{
    protected $table = 'references';

    protected $fillable = ['referensi','jurnal_id'];

    public function jurnal()
    {
        return $this->belongsTo(Jurnal::class);
    }
}
