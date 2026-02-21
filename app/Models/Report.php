<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Report extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'code',
        'resident_id',
        'report_category_id',
        'title',
        'description',
        'image',
        'latitude',
        'longitude',
        'address',
    ];

    public function resident()
    {
        //Satu laporan dimiliki oleh satu warga
        return $this->belongsTo(Resident::class);
    }

    public function reportCategory()
    {
        //Satu laporan dimiliki oleh satu kategori
        return $this->belongsTo(ReportCategory::class);
    }

    public function reportStatuses()
    {
        //Satu laporan memiliki banyak status
        return $this->hasMany(ReportStatus::class);
    }

    public function getLatestStatusAttribute()
    {
        $status = optional($this->reportStatuses->last())->status;

        $statusMap = [
            'delivered' => [
                'label' => 'Terkirim',
                'class' => 'badge-blue'
            ],
            'in_process' => [
                'label' => 'Diproses',
                'class' => 'badge-yellow'
            ],
            'completed' => [
                'label' => 'Selesai',
                'class' => 'badge-green'
            ],
            'rejected' => [
                'label' => 'Ditolak',
                'class' => 'badge-red'
            ],
        ];

        return $statusMap[$status] ?? null;
    }
}
