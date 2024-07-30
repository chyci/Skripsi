<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DrugOut extends Model
{
    use HasFactory;
    protected $fillabel = ['drug_id', 'quantity'];

    /**
     * Get the drug that owns the DrugEntry
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function drug(): BelongsTo
    {
        return $this->belongsTo(Drug::class, 'drug_id', 'id');
    }
}
