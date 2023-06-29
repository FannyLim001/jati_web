<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $table = 'admins';

    protected $fillable = [
        'username',
        'email',
        'password',
    ];

    public function username()
    {
        return 'username';
    }

    public static function storeAdmin($data)
    {
        // Create a new journal instance
        $admin = self::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        return $admin;
    }

    public function editAdmin($data, $id)
    {

        $admin = $this->where('id', $id)->first();

        if ($admin) {
            $admin->update([
                'username' => $data['username'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
            ]);
        }

        return $admin;
    }
}
