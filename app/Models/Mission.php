<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    use HasFactory;
    protected $table = 'missions';
    protected $fillable = ['operation_name', 'mission_details', 'deployment_area', 'unit_name'];
}
