<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TurnOverCompany;

class Company extends Model
{
    use HasFactory;

 
        /**
         * Get all of the turn over for the Company
         * 
         */

        public function turnOver()
        {
            return $this->hasMany(TurnOverCompany::class);
        }

}
