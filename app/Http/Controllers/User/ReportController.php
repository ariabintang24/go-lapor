<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReportRequest;
use App\Interfaces\ReportCategoryRepositoryInterface;
use App\Interfaces\ReportRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\HttpCache\Store;

class ReportController extends Controller
{
    private $reportRepository;
    private $reportCategoryRepository;

    public function __construct(ReportRepositoryInterface $reportRepository, ReportCategoryRepositoryInterface $reportCategoryRepository)
    {
        $this->reportRepository = $reportRepository;
        $this->reportCategoryRepository = $reportCategoryRepository;
    }

    public function index(Request $request)
    {
        if ($request->category) {
            $reports = $this->reportRepository->getReportsByCategory($request->category);
        } else {
            $reports = $this->reportRepository->getAllReports();
        }

        return view('pages.app.report.index', compact('reports'));
    }

    public function myReport(Request $request)
    {
        $status = $request->status ?? 'delivered';

        $reports = $this->reportRepository
            ->getReportsByResidentId($status);

        $totalReports = \App\Models\Report::where(
            'resident_id',
            auth()->user()->resident->id
        )->count();

        return view('pages.app.report.my-report', compact('reports', 'totalReports'));
    }

    public function show($code)
    {
        $report = $this->reportRepository
            ->getReportByCode($code)
            ->load('resident.user');

        return view('pages.app.report.show', compact('report'));
    }

    public function take()
    {
        return view('pages.app.report.take');
    }

    public function preview()
    {
        return view('pages.app.report.preview');
    }

    public function create()
    {
        $categories = $this->reportCategoryRepository->getAllReportCategories();
        return view('pages.app.report.create', compact('categories'));
    }

    public function store(StoreReportRequest $request)
    {
        $data = $request->validated();

        $data['code'] = 'GO' . mt_rand(100000, 999999);

        // ambil resident id dari relasi
        $data['resident_id'] = Auth::user()->resident->id;

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')
                ->store('assets/report/image', 'public');
        }

        $this->reportRepository->createReport($data);

        return redirect()->route('report.success');
    }

    public function success()
    {
        return view('pages.app.report.success');
    }
}
