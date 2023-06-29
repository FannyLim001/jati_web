<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class UserProfile extends Model
{
    protected $table = 'user_profile';

    protected $fillable = ['nama', 'no_telp', 'afiliasi', 'bahasa_kerja', 'user_id','gsch_id','scopus_id','sinta_id'];

    public static function storeProfile($data)
    {
        $id = Auth::guard('user')->user()->id;

        // Create a new journal instance
        $profile = self::create([
            'nama' => $data['nama'],
            'no_telp' => $data['no_telp'],
            'afiliasi' => $data['afiliasi'],
            'bahasa_kerja' => $data['bahasa_kerja'],
            'gsch_id' => $data['gsch_id'],
            'scopus_id' => $data['scopus_id'],
            'sinta_id' => $data['sinta_id'],
            'user_id' => $id
        ]);

        return $profile;
    }

    public function editProfile($data)
    {
        $id = Auth::guard('user')->user()->id;

        $profile = $this->where('user_id', $id)->first();

        if ($profile) {
            $profile->update([
                'nama' => $data['nama'],
                'no_telp' => $data['no_telp'],
                'afiliasi' => $data['afiliasi'],
                'bahasa_kerja' => $data['bahasa_kerja'],
                'gsch_id' => $data['gsch_id'],
                'scopus_id' => $data['scopus_id'],
                'sinta_id' => $data['sinta_id'],
            ]);
        }

        return $profile;
    }

    public static function adminStoreProfile($data,$id)
    {
        // Create a new journal instance
        $profile = self::create([
            'nama' => $data['nama'],
            'no_telp' => $data['no_telp'],
            'afiliasi' => $data['afiliasi'],
            'bahasa_kerja' => $data['bahasa_kerja'],
            'gsch_id' => $data['gsch_id'],
            'scopus_id' => $data['scopus_id'],
            'sinta_id' => $data['sinta_id'],
            'user_id' => $id
        ]);

        return $profile;
    }

    public function adminEditProfile($data,$id)
    {

        $profile = $this->where('id', $id)->first();

        if ($profile) {
            $profile->update([
                'nama' => $data['nama'],
                'no_telp' => $data['no_telp'],
                'afiliasi' => $data['afiliasi'],
                'bahasa_kerja' => $data['bahasa_kerja'],
                'gsch_id' => $data['gsch_id'],
                'scopus_id' => $data['scopus_id'],
                'sinta_id' => $data['sinta_id'],
            ]);
        }

        return $profile;
    }
}
