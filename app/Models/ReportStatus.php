<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReportStatus extends Model
{

    use SoftDeletes;
    
    protected $fillable = [
        'report_id',
        'image',
        'status',
        'description'
    ];

    public function report()
    {
        return $this->belongsTo(Resident::class);
    }

    public function category()
    {
        return $this->belongsTo(ReportCategory::class);
    }

    public function statuses()
    {
        return $this->hasMany(ReportStatus::class);
    }
}
