<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Loan extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function loan(): BelongsToMany{
        return $this->belongsToMany(Book::class, "loans", "reader_id", "book_id");
    }


}
