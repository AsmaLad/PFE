<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attestation extends Model
{
    //
    protected $table=  'attestations';

    protected $guarded = ['id'];

    protected $fillable = [
        'ref', 'legaliser', 'dateAtt', 'etat', 'id_users', 'is_valid', 'consulter',
    ];

     public function user()
    {
        return $this->belongsTo(User::class);
    }

}
