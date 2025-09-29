<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\MataKuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Get statistics for each dosen
        $dosenStats = Dosen::select('dosens.nama')
            ->leftJoin('mata_kuliahs', 'dosens.id', '=', 'mata_kuliahs.dosen_id')
            ->groupBy('dosens.id', 'dosens.nama')
            ->selectRaw('COUNT(mata_kuliahs.id) as mata_kuliah_count')
            ->selectRaw('COALESCE(SUM(mata_kuliahs.sks), 0) as total_sks')
            ->get();

        // Prepare data for chart
        $chartData = [
            'labels' => $dosenStats->pluck('nama')->toArray(),
            'data' => $dosenStats->pluck('mata_kuliah_count')->toArray(),
        ];

        return view('dashboard', compact('dosenStats', 'chartData'));
    }
}