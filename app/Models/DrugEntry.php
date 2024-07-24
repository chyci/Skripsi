<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DrugEntry extends Model
{
    use HasFactory;
    protected $fillabel= ['quantity','entry_date'];
}
