<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Jurnal extends Model
{
    protected $table = 'jurnal';

    protected $fillable = ['judul', 'kata_kunci', 'abstrak', 'file_pdf', 'status_id', 'tanggal_submit','volume_id','user_id'];

    public function kontributors()
    {
        return $this->hasMany(Kontributor::class);
    }

    public function references()
    {
        return $this->hasMany(Reference::class);
    }

    public static function storeJournal($data)
    {
        // Handle the file upload
        $file = $data['file_pdf'];
        $fileName = $file->getClientOriginalName();
        $file->storeAs('public/pdf', $fileName);

        $id = Auth::guard('user')->user()->id;

        // Create a new journal instance
        $journal = self::create([
            'judul' => $data['judul'],
            'kata_kunci' => $data['kata_kunci'],
            'abstrak' => $data['abstrak'],
            'file_pdf' => $fileName,
            'status_id' => 1,
            'tanggal_submit' => now(),
            'volume_id'=> $data['volume_id'],
            'user_id'=>$id
        ]);

        // Store the contributors
        $contributors = $data['contributors'];
        $contributorIds = [];
        foreach ($contributors as $contributorName) {
            $contributor = Kontributor::firstOrCreate([
                'nama' => $contributorName,
                'peran_kontributor' => 'Penulis',
                'jurnal_id' => $journal->id // Set the journal ID in the kontributor record
            ]);
            $contributorIds[] = $contributor->id;
        }

        // Store the references
        $references = $data['references'];
        $referencesIds = [];
        foreach ($references as $referencesText) {
            $reference = Reference::firstOrCreate([
                'referensi' => $referencesText,
                'jurnal_id' => $journal->id // Set the journal ID in the kontributor record
            ]);
            $referencesIds[] = $reference->id;
        }

        return $journal;
    }

    public static function updateJournal($data, $id)
{

    // Find the journal instance
    $journal = self::find($id);

    if (!$journal) {
        // Journal not found, handle the error condition
        // For example, return an error message or redirect back with an error
        return null;
    }

    // Update the journal information
    $journal->judul = $data['judul'];
    $journal->kata_kunci = $data['kata_kunci'];
    $journal->abstrak = $data['abstrak'];
    $journal->volume_id = $data['volume_id'];

    // Handle the file upload if a new file is provided
    if (isset($data['file_pdf'])) {
        $file = $data['file_pdf'];
        $fileName = $file->getClientOriginalName();
        $file->storeAs('public/pdf', $fileName);
        $journal->file_pdf = $fileName;
    }

    // Save the updated journal
    $journal->save();

    // Update the contributors
    $contributors = $data['contributors'];
    foreach ($contributors as $contributorName) {
        $contributor = Kontributor::firstOrCreate([
            'nama' => $contributorName,
            'peran_kontributor' => 'Penulis',
            'jurnal_id' => $journal->id // Set the journal ID in the kontributor record
        ]);
    }

    // Update the references
    $references = $data['references'];
    foreach ($references as $referencesText) {
        $reference = Reference::firstOrCreate([
            'referensi' => $referencesText,
            'jurnal_id' => $journal->id // Set the journal ID in the reference record
        ]);
    }

    return $journal;
}

}
