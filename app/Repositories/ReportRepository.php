<?php

namespace App\Repositories;

use App\Interfaces\ReportRepositoryInterface;
use App\Models\Report;
use App\Models\ReportCategory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class ReportRepository implements ReportRepositoryInterface
{
    public function getAllReports($sort = 'newest')
    {
        return $this->getReports(null, $sort);
    }

    public function getLatestReports()
    {
        return Report::with('reportStatuses')
            ->latest()
            ->take(3)
            ->get();
    }

    public function getReports($category = null, $sort = 'newest')
    {
        $query = Report::with('reportStatuses');

        // FILTER CATEGORY
        if ($category) {
            $query->whereHas('reportCategory', function ($q) use ($category) {
                $q->where('name', $category);
            });
        }

        // FILTER SORT
        if ($sort === 'oldest') {
            $query->oldest();
        } else {
            $query->latest();
        }

        return $query->paginate(6)->withQueryString();
    }

    public function getReportByCode(string $code)
    {
        return Report::with('reportStatuses')
            ->where('code', $code)
            ->first();
    }

    public function getReportsByCategory(string $category, $sort = 'newest')
    {
        return $this->getReports($category, $sort);
    }

    public function getReportsByResidentId(string $status)
    {
        return Report::where('resident_id', Auth::user()->resident->id)
            ->whereHas('reportStatuses', function (Builder $query) use ($status) {
                $query->where('status', $status)
                    ->whereIn('id', function ($subQuery) {
                        $subQuery->selectRaw('MAX(id)')
                            ->from('report_statuses')
                            ->groupBy('report_id');
                    });
            })->get();
    }

    public function getReportById(int $id)
    {
        return Report::where('id', $id)->first();
    }

    public function createReport(array $data)
    {

        $report = Report::create($data);

        $report->reportStatuses()->create([
            'status' => 'delivered',
            'description' => 'Laporan Berhasil Diterima',
        ]);

        return $report;
    }

    public function updateReport(array $data, int $id)
    {
        $report = $this->getReportById($id);

        return $report->update($data);
    }

    public function deleteReport(int $id)
    {
        $reportCategory = $this->getReportById($id);

        return $reportCategory->delete();
    }
}
