<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Jurnal;
use App\Models\JurnalReview;
use App\Models\VolJurnal;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class JurnalController extends Controller
{
    public function index()
    {
        $id = Auth::guard('user')->user()->id;
        $jurnal = DB::table('jurnal')
            ->join('status', 'status.id', '=', 'jurnal.status_id')
            ->select('status.jenis_status as status', 'jurnal.id as id', 'judul', 'kata_kunci', 'tanggal_submit')
            ->where('user_id', $id)
            ->get();

        return view('user.jurnal.jurnal', ['jurnal' => $jurnal]);
    }

    public function editorIndex()
    {
        $jurnal = DB::table('jurnal')
            ->join('status', 'status.id', '=', 'jurnal.status_id')
            ->select('status.jenis_status as status', 'jurnal.id as id', 'judul', 'kata_kunci', 'tanggal_submit')
            ->get();

        return view('editor.jurnal.jurnal', ['jurnal' => $jurnal]);
    }

    public function reviewerIndex()
    {
        $id = Auth::guard('user')->user()->id;

        $jurnal = DB::table('jurnal')
            ->join('status', 'status.id', '=', 'jurnal.status_id')
            ->select('status.jenis_status as status', 'jurnal.id as id', 'judul', 'kata_kunci', 'tanggal_submit')
            ->where('reviewer_id', $id)
            ->get();

        return view('reviewer.jurnal.jurnal', ['jurnal' => $jurnal]);
    }

    public function adminIndex()
    {
        $jurnal = DB::table('jurnal')
            ->join('status', 'status.id', '=', 'jurnal.status_id')
            ->join('users','users.id','=','jurnal.user_id')
            ->select('status.jenis_status as status', 'jurnal.id as id', 'judul', 'kata_kunci', 'tanggal_submit'
            ,'users.username as user')
            ->get();

        return view('admin.jurnal.admin_jurnal', ['jurnal' => $jurnal]);
    }

    public function arsipVolJurnal()
    {
        $jurnal_volume = DB::table('jurnal_volume')
            ->orderBy('tanggal_volume', 'desc')
            ->get()
            ->groupBy(function ($item) {
                return Carbon::parse($item->tanggal_volume)->format('Y');
            });

        return view('guest.arsip', ['jurnal_vol' => $jurnal_volume]);
    }

    public function arsipListJurnal(Request $request)
    {
        $id = $request->route('id');

        $jurnal_volume = DB::table('jurnal_volume')
            ->where('id', $id)
            ->get();

        $list_jurnal = [];
        $list_kontributor = [];

        foreach ($jurnal_volume as $vol) {
            $list_jurnal = DB::table('jurnal')
                ->where('volume_id',$vol->id)
                ->where('status_id', 5)
                ->get();
        }

        foreach ($list_jurnal as $jurnal) {
            $list_kontributor = DB::table('kontributor')
                ->where('jurnal_id', $jurnal->id)
                ->get();
        }

        return view('guest.arsip_volume', [
            'jurnal_vol' => $jurnal_volume, // Update the variable name to 'jurnal_vol'
            'list_jurnal' => $list_jurnal,
            'list_kontributor' => $list_kontributor
        ]);
    }

    public function arsipDetailJurnal(Request $request)
    {
        $id = $request->route('id');

        $jurnal = DB::table('jurnal')
            ->join('status', 'status.id', '=', 'jurnal.status_id')
            ->select(
                'status.jenis_status as status',
                'jurnal.id as id',
                'judul',
                'kata_kunci',
                'abstrak',
                'file_pdf',
                'tanggal_submit'
            )
            ->where('jurnal.id', $id)
            ->where('status_id', 5)
            ->first();
        $kontributor = DB::table('kontributor')
            ->where('jurnal_id', $id)
            ->get();
        $reference = DB::table('references')
            ->where('jurnal_id', $id)
            ->get();

        $data = [
            'jurnal' => $jurnal,
            'kontributor' => $kontributor,
            'reference' => $reference
        ];

        return view('guest.arsip_detail', $data);
    }

    public function arsipListTerkini(Request $request)
    {
        $jurnal_volume = DB::table('jurnal_volume')
            ->latest()
            ->first(); // Use first() instead of get() to retrieve a single row

        if ($jurnal_volume) {

            $list_jurnal = DB::table('jurnal')
                ->where('volume_id', $jurnal_volume->id) // Assuming jurnal_volume_id is the foreign key in the jurnal table
                ->where('status_id', 5)
                ->get();

            $list_kontributor = DB::table('kontributor')
                ->whereIn('jurnal_id', $list_jurnal->pluck('id'))
                ->get();

            return view('guest.terkini', [
                'jurnal_vol' => $jurnal_volume,
                'list_jurnal' => $list_jurnal,
                'list_kontributor' => $list_kontributor
            ]);
        }

        // Handle the case when no jurnal_volume is found
        return view('guest.terkini', [
            'jurnal_vol' => null,
            'list_jurnal' => null,
            'list_kontributor' => null
        ]);
    }

    public function timEditorial()
    {
        $editor = DB::table('user_profile')
            ->join('users', 'users.id', '=', 'user_profile.user_id')
            ->select('nama', 'afiliasi', 'gsch_id', 'scopus_id', 'sinta_id')
            ->where('users.role', 'Editor')
            ->get();

        $reviewer = DB::table('user_profile')
            ->join('users', 'users.id', '=', 'user_profile.user_id')
            ->select('nama', 'afiliasi', 'gsch_id', 'scopus_id', 'sinta_id')
            ->where('users.role', 'Reviewer')
            ->get();

        $data = [
            'editor' => $editor,
            'reviewer' => $reviewer
        ];

        return view('guest.tim_editorial', $data);
    }

    public function volumeJurnal()
    {
        $jurnal_volume = DB::table('jurnal_volume')->get();

        return view('admin.jurnal.admin_jurnal_volume', ['jurnal_vol' => $jurnal_volume]);
    }

    public function tambahJurnal()
    {
        $jurnal_volume = DB::table('jurnal_volume')->get();
        return view('user.jurnal.tambah_jurnal', ['jurnal_vol' => $jurnal_volume]);
    }

    public function tambahVolJurnal()
    {
        return view('admin.jurnal.admin_tambah_jurnal_volume');
    }

    public function storeJurnal(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required',
            'kata_kunci' => 'required',
            'abstrak' => 'required',
            'file_pdf' => 'required|mimes:pdf,doc,docx',
            'contributors.*' => 'required',
            'references.*' => 'required',
            'volume_id' => 'required'
        ]);

        Jurnal::storeJournal($validatedData);

        return redirect()->route('jurnal')->with('success', 'Jurnal Berhasil di buat!');
    }

    public function storeVolJurnal(Request $request)
    {
        $validatedData = $request->validate([
            'nama_vol' => 'required',
            'desc_vol' => 'required',
        ]);

        VolJurnal::storeVolJournal($validatedData);

        return redirect()->route('admin_voljurnal')->with('success', 'Volume Jurnal Berhasil di buat!');
    }

    public function detailJurnal(Request $request)
    {
        $id = $request->route('id');
        $jurnal = DB::table('jurnal')
            ->join('status', 'status.id', '=', 'jurnal.status_id')
            ->select(
                'status.jenis_status as status',
                'jurnal.id as id',
                'judul',
                'kata_kunci',
                'abstrak',
                'file_pdf',
                'tanggal_submit'
            )
            ->where('jurnal.id', $id)
            ->first();
        $kontributor = DB::table('kontributor')
            ->where('jurnal_id', $id)
            ->get();
        $reference = DB::table('references')
            ->where('jurnal_id', $id)
            ->get();
        $jurnal_review = DB::table('jurnal_review')
            ->where('jurnal_id', $id)
            ->get();

        $data = [
            'jurnal' => $jurnal,
            'kontributor' => $kontributor,
            'reference' => $reference,
            'jurnal_review' => $jurnal_review
        ];

        return view('user.jurnal.detail_jurnal', $data);
    }

    public function ubahJurnal(Request $request)
    {
        $id = $request->route('id');
        $jurnal = DB::table('jurnal')
            ->join('status', 'status.id', '=', 'jurnal.status_id')
            ->select(
                'status.jenis_status as status',
                'jurnal.id as id',
                'judul',
                'kata_kunci',
                'abstrak',
                'file_pdf',
                'tanggal_submit'
            )
            ->where('jurnal.id', $id)
            ->first();
        $kontributor = DB::table('kontributor')
            ->where('jurnal_id', $id)
            ->get();
        $reference = DB::table('references')
            ->where('jurnal_id', $id)
            ->get();

        $jurnal_volume = DB::table('jurnal_volume')->get();

        $jurnal_vol_user = DB::table('jurnal')
            ->join('jurnal_volume', 'jurnal_volume.id', '=', 'jurnal.volume_id')
            ->select('jurnal_volume.id as vol_id', 'nama_volume')
            ->where('jurnal.id', $id)
            ->first();

        $data = [
            'jurnal' => $jurnal,
            'kontributor' => $kontributor,
            'reference' => $reference,
            'jurnal_vol' => $jurnal_volume,
            'jurnal_vol_user' => $jurnal_vol_user
        ];

        return view('user.jurnal.revisi_jurnal', $data);
    }

    public function editorDetailJurnal(Request $request)
    {
        $id = $request->route('id');
        $jurnal = DB::table('jurnal')
            ->join('status', 'status.id', '=', 'jurnal.status_id')
            ->select(
                'status.jenis_status as status',
                'jurnal.id as id',
                'judul',
                'kata_kunci',
                'abstrak',
                'file_pdf',
                'tanggal_submit'
            )
            ->where('jurnal.id', $id)
            ->first();
        $kontributor = DB::table('kontributor')
            ->where('jurnal_id', $id)
            ->get();
        $reference = DB::table('references')
            ->where('jurnal_id', $id)
            ->get();

        $jurnal_volume = DB::table('jurnal_volume')->get();

        $jurnal_vol_user = DB::table('jurnal')
            ->join('jurnal_volume', 'jurnal_volume.id', '=', 'jurnal.volume_id')
            ->select('jurnal_volume.id as vol_id', 'nama_volume')
            ->where('jurnal.id', $id)
            ->first();

        $data = [
            'jurnal' => $jurnal,
            'kontributor' => $kontributor,
            'reference' => $reference,
            'jurnal_vol' => $jurnal_volume,
            'jurnal_vol_user' => $jurnal_vol_user
        ];

        return view('editor.jurnal.detail_jurnal', $data);
    }

    public function reviewerDetailJurnal(Request $request)
    {
        $id = $request->route('id');
        $jurnal = DB::table('jurnal')
            ->join('status', 'status.id', '=', 'jurnal.status_id')
            ->select(
                'status.jenis_status as status',
                'jurnal.id as id',
                'judul',
                'kata_kunci',
                'abstrak',
                'file_pdf',
                'tanggal_submit'
            )
            ->where('jurnal.id', $id)
            ->first();
        $kontributor = DB::table('kontributor')
            ->where('jurnal_id', $id)
            ->get();
        $reference = DB::table('references')
            ->where('jurnal_id', $id)
            ->get();
        $jurnal_review = DB::table('jurnal_review')
            ->where('jurnal_id', $id)
            ->get();
        $status = DB::table('status')->where('role', 'reviewer')->get();

        $data = [
            'jurnal' => $jurnal,
            'kontributor' => $kontributor,
            'reference' => $reference,
            'jurnal_review' => $jurnal_review,
            'status' => $status
        ];

        return view('reviewer.jurnal.detail_jurnal', $data);
    }

    public function revisiJurnal(Request $request)
    {
        $id = $request->input('id');

        $validatedData = $request->validate([
            'judul' => 'required',
            'kata_kunci' => 'required',
            'abstrak' => 'required',
            'file_pdf' => 'required|mimes:pdf,doc,docx',
            'contributors.*' => 'required',
            'references.*' => 'required',
            'volume_id' => 'required'
        ]);

        Jurnal::updateJournal($validatedData, $id);

        return redirect()->route('jurnal')->with('success', 'Jurnal Berhasil di edit!');
    }

    public function editorEditJurnal(Request $request)
    {
        $id = $request->input('id');

        $validatedData = $request->validate([
            'judul' => 'required',
            'kata_kunci' => 'required',
            'abstrak' => 'required',
            'file_pdf' => 'required|mimes:pdf,doc,docx',
            'contributors.*' => 'required',
            'references.*' => 'required',
            'volume_id' => 'required'
        ]);

        Jurnal::updateJournal($validatedData, $id);

        return redirect()->route('editorjurnal')->with('success', 'Jurnal Berhasil di edit!');
    }

    public function reviewJurnal(Request $request)
    {
        $id = $request->input('id');
        $status = $request->input('status_jurnal');
        $review = $request->input('review_text');

        if($review && $status){
            JurnalReview::storeJournalReview($review, $id);
            DB::table('jurnal')
                    ->where('id', $id)
                    ->update(['status_id' => $status]);
        } elseif ($status) {
            try {
                DB::table('jurnal')
                    ->where('id', $id)
                    ->update(['status_id' => $status]);
            } catch (\Exception $e) {
                // dd($e->getMessage());
                return redirect(route('reviewerdetailjurnal', $id))->with("error", "Atur Status Review Jurnal gagal, ada yang salah!");
            }
        }

        return redirect()->route('reviewerjurnal')->with('success', 'Jurnal Berhasil di review!');
    }

    public function adminDetailJurnal(Request $request)
    {
        $id = $request->route('id');
        $jurnal = DB::table('jurnal')
            ->join('status', 'status.id', '=', 'jurnal.status_id')
            ->leftJoin('users','users.id','=','jurnal.reviewer_id')
            ->select(
                'status.jenis_status as status', 
                'jurnal.id as id', 
                'judul', 
                'kata_kunci', 
                'tanggal_submit',
                'abstrak',
                'file_pdf',
                'reviewer_id',
                'users.username as reviewer')
            ->where('jurnal.id',$id)
            ->first();
            
        $kontributor = DB::table('kontributor')
            ->where('jurnal_id', $id)
            ->get();
        $reference = DB::table('references')
            ->where('jurnal_id', $id)
            ->get();

        $jurnal_review = DB::table('jurnal_review')
            ->join('users', 'users.id', '=', 'jurnal_review.user_id')
            ->select('users.username as username', 'review_text')
            ->where('jurnal_id', $id)
            ->get();

        $reviewer = DB::table('users')->where('role', 'Reviewer')->get();

        $data = [
            'jurnal' => $jurnal,
            'kontributor' => $kontributor,
            'reference' => $reference,
            'jurnal_review' => $jurnal_review,
            'reviewer' => $reviewer
        ];

        return view('admin.jurnal.admin_detail_jurnal', $data);
    }

    public function detailVolJurnal(Request $request)
    {
        $id = $request->route('id');
        $jurnal_vol = DB::table('jurnal_volume')
            ->where('id', $id)
            ->first();
        return view('admin.jurnal.admin_detail_jurnal_volume', ['jurnal_vol' => $jurnal_vol]);
    }

    public function adminAturStatus(Request $request)
    {
        $id = $request->input('id');
        $reviewer = $request->input('reviewer');
        $status = $request->input('status_jurnal');

        try {
            if ($status) {
                DB::table('jurnal')
                    ->where('id', $id)
                    ->update(['status_id' => $status]);

                return redirect()->intended('admin_jurnal')->with("success", "Atur Status Jurnal berhasil!");
            } elseif ($reviewer) {
                DB::table('jurnal')
                    ->where('id', $id)
                    ->update([
                        'reviewer_id' => $reviewer,
                        'status_id' => 2
                    ]);

                return redirect()->intended('admin_jurnal')->with("success", "Atur Reviewer Jurnal berhasil!");
            }

            // dd($id_wallet,$saldo);
        } catch (\Exception $e) {
            // dd($e->getMessage());
            return redirect(route('admin_detailjurnal', $id))->with("error", "Atur Status / Reviewer Jurnal gagal, ada yang salah!");
        }
    }
}
