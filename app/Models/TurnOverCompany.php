<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Company;

class TurnOverCompany extends Model
{
    use HasFactory;


       /**
        * Get the company that owns the TurnOver
        */

       public function company()
       {
           return $this->belongsTo(Company::class);
       }

}
