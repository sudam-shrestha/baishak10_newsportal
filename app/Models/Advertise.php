<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advertise extends Model
{
    protected $fillable = ['banner', 'redirect_url', 'company_name', 'contact', 'status'];

}
