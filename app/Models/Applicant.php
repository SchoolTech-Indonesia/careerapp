<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;
    
    protected $table = 'applicants';
    protected $fillable = [
        'fullname',
        'email',
        'phone_number',
        'portfolio_link',
        'id_opportunity',
        'cv_path',
        'gender',
        'birthdate',
        'address',
        'religion',
        'marital_status',
        'last_education',
        'education_name',
        'major_name',
        'gpa',
        'graduate_status',
        'graduate_year',
        'know_opportunity_form',
    ];

    public function opportunity()
{
    return $this->belongsTo(Opportunity::class, 'opportunity_id');
}

}
