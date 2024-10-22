<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $primaryKey="adrs_id";

    protected $guarded = [];

    public function admin(){

        return $this->belongsTo(Admin::class,"adrs_id","address_id");
    }

    function admin2(){

    }
}
