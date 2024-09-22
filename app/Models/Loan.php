<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Loan extends Model
{

    protected $guarded=[];
    use HasFactory;

    public function reader(): BelongsTo{
        return $this->belongsTo(Reader::class);
        // return $this->belongsToMany(modelo, 'tabla', 'clave-foranea', 'clave-relacionada');
        
    }

    public function book(): belongsTo{
        return $this->belongsTo(Book::class);
    }

}
