<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Loans extends Model
{
    protected $table = 'book_loans';
    protected $fillable = [
        'book_id',
        'client_id',
        'quantity',
        'loan_date',
        'return_date',
        'status',
        'name'
    ];

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id', 'id');
    }

    public function client()
    {
        return $this->belongsTo(Clients::class, 'client_id', 'id');
    }
}
