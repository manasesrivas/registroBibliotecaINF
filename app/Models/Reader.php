<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Loan;


class Reader extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function loans(): BelongsToMany{
        return $this->belongsToMany(Loan::class, "loans");
    }

}
