<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Import extends Model
{
    use HasFactory;

    protected $fillable = [
        'NUMDIST',
        'NOMDIST',
        'CSALESMAN',
        'LSALESMAN',
        'CUSER',
        'LUSER',
        'CCIVIL',
        'NOM',
        'PRENOM',
        'NUMABO',
        'NUMABONT',
        'DATE',
        'CMOUVMT',
        'MONTANT_TTC',
        'MONTANT_HT',
        'DEVISE',
        'TX_TVA',
        'GROUPE',
        'CSOCIETE',
        'CARTICLE',
        'LARTICLE',
        'DEBABO',
        'FINABO',
        'DUREE',
        'VALIDFULL',
        'NUMCARTE',
        'NUMDECO',
        'NUMSCRATCH',
        'MONTANT_TAXE',
        'IDTRANSACTION_MOBILE',
    ];
}
