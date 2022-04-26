<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturnModel extends Model
{
    use HasFactory;
	protected $fillable = [
			'date',
            'reference',
            'designation',
			'quantite',
			'bc',
			'bl',
			'motif',
			'observation',
			'entreprise',
			'fournisseur',
	];
	
}
