<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function guestIndex(Request $request)
    {
        $jurnal_volume = DB::table('jurnal_volume')
            ->latest()
            ->first(); // Use first() instead of get() to retrieve a single row

        if ($jurnal_volume) {

            $list_jurnal = DB::table('jurnal')
                ->where('volume_id', $jurnal_volume->id) // Assuming jurnal_volume_id is the foreign key in the jurnal table
                ->where('status_id', 2)
                ->get();

            $list_kontributor = DB::table('kontributor')
                ->whereIn('jurnal_id', $list_jurnal->pluck('id'))
                ->get();

            return view('guest.dashboard', [
                'jurnal_vol' => $jurnal_volume,
                'list_jurnal' => $list_jurnal,
                'list_kontributor' => $list_kontributor
            ]);
        }

        // Handle the case when no jurnal_volume is found
        return view('guest.dashboard', [
            'jurnal_vol' => null,
            'list_jurnal' => null,
            'list_kontributor' => null
        ]);
    }

    public function adminIndex()
    {
        $total_jurnal = DB::table('jurnal')->count();
        $total_author = DB::table('users')->where('role', 'Penulis')->count();
        $total_editor = DB::table('users')->where('role', 'Editor')->count();
        $total_reviewer = DB::table('users')->where('role', 'Reviewer')->count();

        $jurnal = DB::table('jurnal')
            ->join('status', 'status.id', '=', 'jurnal.status_id')
            ->select('status.jenis_status as status', 'jurnal.id as id', 'judul', 'kata_kunci', 'tanggal_submit')
            ->get();

        $monthlyData = DB::table('jurnal')
            ->select(DB::raw('MONTH(tanggal_submit) as month'), DB::raw('COUNT(*) as total'))
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $labels = [];
        $chartData = [];

        // Initialize an array with 12 months
        $allMonths = range(1, 12);

        foreach ($allMonths as $month) {
            $monthData = $monthlyData->firstWhere('month', $month);

            if ($monthData) {
                $labels[] = DateTime::createFromFormat('!m', $monthData->month)->format('M');
                $chartData[] = $monthData->total;
            } else {
                $labels[] = DateTime::createFromFormat('!m', $month)->format('M');
                $chartData[] = 0;
            }
        }

        $data = [
            'total_jurnal' => $total_jurnal,
            'total_author' => $total_author,
            'total_editor' => $total_editor,
            'total_reviewer' => $total_reviewer,
            'jurnal' => $jurnal,
            'label' => $labels,
            'chartData' => $chartData
        ];

        return view('admin.dashboard', $data);
    }
}
