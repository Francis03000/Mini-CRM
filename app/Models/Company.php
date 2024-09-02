<?php

namespace App\Models;
use App\Models\Employee;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    use HasFactory;


    protected $fillable = [
        'company_name',
        'email',
        'logo',
        'website'
    ];

    public function employees(): HasMany
    {
        return $this->hasMany(Employee::class);
    }
}
