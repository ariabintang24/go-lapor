<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $residentId = $user->resident->id;

        $reports = Report::with(['reportStatuses' => function ($query) {
            $query->latest();
        }])
            ->where('resident_id', $residentId)
            ->get();

        $delivered = 0;
        $in_process = 0;
        $completed = 0;
        $rejected = 0;

        foreach ($reports as $report) {
            $latestStatus = $report->reportStatuses->first();

            if ($latestStatus) {
                switch ($latestStatus->status) {
                    case 'delivered':
                        $delivered++;
                        break;
                    case 'in_process':
                        $in_process++;
                        break;
                    case 'completed':
                        $completed++;
                        break;
                    case 'rejected':
                        $rejected++;
                        break;
                }
            }
        }

        return view('pages.app.profile', [
            'terkirim' => $delivered,
            'diproses' => $in_process,
            'selesai'  => $completed,
            'ditolak'  => $rejected,
        ]);
    }
}
