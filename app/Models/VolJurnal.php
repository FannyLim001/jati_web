<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VolJurnal extends Model
{
    protected $table = 'jurnal_volume';

    protected $fillable = ['nama_volume', 'desc_volume', 'tanggal_volume'];

    public static function storeVolJournal($data)
    {
        // Create a new journal instance
        $vol_journal = self::create([
            'nama_volume' => $data['nama_vol'],
            'desc_volume' => $data['desc_vol'],
            'tanggal_volume' => now()
        ]);

        return $vol_journal;
    }
}
