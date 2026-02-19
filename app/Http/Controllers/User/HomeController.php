<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Interfaces\ReportCategoryRepositoryInterface;
use App\Interfaces\ReportRepositoryInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $reportRepository;
    private $reportCategoryRepository;


    public function __construct(ReportRepositoryInterface $reportRepository, ReportCategoryRepositoryInterface $reportCategoryRepository)
    {
        $this->reportRepository = $reportRepository;
        $this->reportCategoryRepository = $reportCategoryRepository;
    }

    public function index()
{
    $categories = $this->reportCategoryRepository->getAllReportCategories();
    $reports = $this->reportRepository->getLatestReports();

    // Greeting berdasarkan jam
    $hour = now()->hour;

    if ($hour >= 5 && $hour < 12) {
        $greeting = 'Good Morning';
    } elseif ($hour >= 12 && $hour < 17) {
        $greeting = 'Good Afternoon';
    } elseif ($hour >= 17 && $hour < 21) {
        $greeting = 'Good Evening';
    } else {
        $greeting = 'Good Night';
    }

    return view('pages.app.home', compact('categories', 'reports', 'greeting'));
}

}
