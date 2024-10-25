<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;
    protected $table = 'applicants';

    protected $fillable = [
        'id',
        'opportunity_id',
        'name',
        'email',
        'phone_number',
        'gender_id',
        'birth_date',
        'domicile_address',
        'religion_id',
        'marital_id',
        'education_id',
        'education_institution',
        'majority',
        'gpa',
        'graduate_status',
        'graduate_year',
        'information_from',
        'portfolio_link',
        'cv_file',
    ];

    public $incrementing = false; // Since 'id' is a varchar and not an auto-incrementing integer

    public function opportunity()
{
    return $this->belongsTo(Opportunity::class, 'opportunity_id');
}
}
