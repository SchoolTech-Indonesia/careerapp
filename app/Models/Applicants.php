<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicants extends Model
{
    use HasFactory;

    protected $table = 'applicant';
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

    public function opportunities(){
        return $this->belongsTo(Opportunity::class);
    }

}
