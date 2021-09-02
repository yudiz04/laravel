<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = ['bank_id','courier_id','no_invoice', 'alamat', 'total'];

    public function bank(){
        return $this->belongsTo('App\Models\Bank');
    }
    public function courier(){
        return $this->belongsTo('App\Models\Courier');
    }

}
