<?php

namespace App\Exports;

use App\Models\Import;
use Cyberduck\LaravelExcel\Contract\SerialiserInterface;
use Maatwebsite\Excel\Concerns\FromCollection;

class ImportExport implements FromCollection, SerialiserInterface
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Import::all();
    }

    public function getData($data)
    {
        $row = [];

        $row[] = $data->NUMDIST;
        $row[] = $data->NOMDIST;
        $row[] = $data->CSALESMAN;
        $row[] = $data->LSALESMAN;
        $row[] = $data->CUSER;
        $row[] = $data->LUSER;
        $row[] = $data->CCIVIL;
        $row[] = $data->NOM;
        $row[] = $data->PRENOM;
        $row[] = $data->NUMABO;
        $row[] = $data->NUMABONT;
        $row[] = $data->DATE;
        $row[] = $data->CMOUVMT;
        $row[] = $data->MONTANT_TTC;
        $row[] = $data->MONTANT_HT;
        $row[] = $data->DEVISE;
        $row[] = $data->TX_TVA;
        $row[] = $data->GROUPE;
        $row[] = $data->CSOCIETE;
        $row[] = $data->CARTICLE;
        $row[] = $data->LARTICLE;
        $row[] = $data->DEBABO;
        $row[] = $data->FINABO;
        $row[] = $data->DUREE;
        $row[] = $data->VALIDFULL;
        $row[] = $data->NUMCARTE;
        $row[] = $data->NUMDECO;
        $row[] = $data->NUMSCRATCH;
        $row[] = $data->MONTANT_TAXE;
        $row[] = $data->IDTRANSACTION_MOBILE;

        return $row;
    }

    public function getHeaderRow()
    {
        return [
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
            'IDTRANSACTION_MOBILE'
        ];
    }
}
