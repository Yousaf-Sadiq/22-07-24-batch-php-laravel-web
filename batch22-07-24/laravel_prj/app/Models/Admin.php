<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    // protected $table="addresses";
    protected $primaryKey = "admin_id";

    // protected $fillable = ["Username", "email", "password", "ptoken"];
    protected $guarded = [];


    public function address()
    {
        return $this->hasOne(Address::class, "user_id", "admin_id")

            ->withDefault([
                "image" => "upload/default.jpg",
                "address" => "NOT DEFINED",
                "phone_no" => "NOT DEFINED"
            ]);
    }

}
