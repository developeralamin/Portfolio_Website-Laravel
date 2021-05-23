<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BannerText extends Model
{
    use HasFactory;

    protected $fillable =['benner_title','benner_sub','benner_sub_title'];
}
