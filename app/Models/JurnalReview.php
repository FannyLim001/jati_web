<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class JurnalReview extends Model
{
    protected $table = 'jurnal_review';

    protected $fillable = ['jurnal_id', 'user_id', 'review_text'];

    public static function storeJournalReview($data, $id)
    {

        $user_id = Auth::guard('user')->user()->id;

        // Create a new journal instance
        $journal_review = self::create([
            'jurnal_id' => $id,
            'review_text' => $data,
            'user_id'=>$user_id
        ]);

        return $journal_review;
    }
}
