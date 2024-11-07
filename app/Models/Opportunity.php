<?php

namespace App\Models;

use App\Models\Schema;
use App\Models\Category;
use App\Models\Division;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Opportunity extends Model
{
    use HasFactory, SoftDeletes, HasUuids;

    protected $fillable = [
        'name',
        'description',
        'job_description',
        'job_requirements',
        'clicked',
        'quota',
        'location',
        'division_id',
        'category_id',
        'schema_id',
        'start_date',
        'end_date',
    ];

    public function division(){
        return $this->belongsTo(Division::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function schema(){
        return $this->belongsTo(Schema::class);
    }

    // Query Scope untuk kesempatan aktif
    public function scopeActive($query)
    {
        return $query->where('end_date', '>=', now());
    }

    // Query Scope untuk kesempatan tidak aktif (deactive)
    public function scopeDeactive($query)
    {
        return $query->where('end_date', '<', now());
    }
    public function applicants()
    {
        return $this->hasMany(Applicant::class, 'opportunity_id');
    }
    
}
