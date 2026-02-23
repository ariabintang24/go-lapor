<?php

namespace App\Interfaces;

interface ReportRepositoryInterface
{
    public function getAllReports($sort = 'newest');

    public function getLatestReports();

    public function getReportByCode(string $code);

    public function getReportsByCategory(string $category, $sort = 'newest');

    public function getReports($category = null, $sort = 'newest');

    public function getReportsByResidentId(string $status);

    public function getReportById(int $id);

    public function createReport(array $data);

    public function updateReport(array $data, int $id);

    public function deleteReport(int $id);
}
