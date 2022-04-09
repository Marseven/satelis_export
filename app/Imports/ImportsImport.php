<?php

namespace App\Imports;

use App\Models\Import;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\Importable;
use Cyberduck\LaravelExcel\Contract\ParserInterface;

class ImportsImport implements ParserInterface, ToCollection, SkipsEmptyRows, WithHeadingRow, WithValidation
{

    use Importable, SkipsFailures, SkipsErrors;

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model
    */
    public function model(array $row)
    {

        return new Import([
            'NUMDIST'   => $row['NUMDIST'],
            'NOMDIST'   => $row[ 'NOMDIST'],
            'CSALESMAN' => $row['CSALESMAN'],
            'LSALESMAN'     => $row['LSALESMAN'],
            'CUSER'    => $row['CUSER'],
            'LUSER' => $row['LUSER'],
            'CCIVIL'     => $row['CCIVIL'],
            'NOM'    => $row['NOM'],
            'PRENOM' => $row['PRENOM'],
            'NUMABO'     => $row['NUMABO'],
            'NUMABONT'    => $row['NUMABONT'],
            'DATE' => $row['DATE'],
            'CMOUVMT'     => $row['CMOUVMT'],
            'MONTANT_TTC'    => $row['MONTANT_TTC'],
            'MONTANT_HT' => $row['MONTANT_HT'],
            'DEVISE'     => $row['DEVISE'],
            'TX_TVA'    => $row['TX_TVA'],
            'GROUPE' => $row['GROUPE'],
            'CSOCIETE'     => $row['CSOCIETE'],
            'CARTICLE'    => $row['CARTICLE'],
            'LARTICLE'     => $row['LARTICLE'],
            'DEBABO'    => $row['DEBABO'],
            'FINABO' => $row['FINABO'],
            'DUREE' => $row['DUREE'],
            'VALIDFULL' => $row['VALIDFULL'],
            'NUMCARTE' => $row['NUMCARTE'],
            'NUMDECO' => $row['NUMDECO'],
            'NUMSCRATCH' => $row['NUMSCRATCH'],
            'MONTANT_TAXE' => $row['MONTANT_TAXE'],
            'IDTRANSACTION_MOBILE' => $row['IDTRANSACTION_MOBILE'],
        ]);
    }

    public function transform($row, $header)
    {
        $model = new Import();
        $row = explode(';', $row[0]);
        if($row[0] == "10016") {
            $model->NUMDIST = $row[0];
            $model->NOMDIST = $row[1];
            $model->CSALESMAN = $row[2];
            $model->LSALESMAN = $row[3];
            $model->CUSER = $row[4];
            $model->LUSER = $row[5];
            $model->CCIVIL = $row[6];
            $model->NOM = $row[7];
            $model->PRENOM = $row[8];
            $model->NUMABO = $row[9];
            $model->NUMABONT = $row[10];
            $model->DATE = $row[11];
            $model->CMOUVMT = $row[12];
            $model->MONTANT_TTC = $row[13];
            $model->MONTANT_HT = $row[14];
            $model->DEVISE = $row[15];
            $model->TX_TVA = $row[16];
            $model->GROUPE = $row[17];
            $model->CSOCIETE = $row[18];
            $model->CARTICLE = $row[19];
            $model->LARTICLE = $row[20];
            $model->DEBABO = $row[21];
            $model->FINABO = $row[22];
            $model->DUREE = $row[23];
            $model->VALIDFULL = $row[24];
            $model->NUMCARTE = $row[25];
            $model->NUMDECO = $row[26];
            $model->NUMSCRATCH = $row[27];
            $model->MONTANT_TAXE = $row[28];
            $model->IDTRANSACTION_MOBILE = $row[29];
            return $model;
        }
    }

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $numcarte = Import::where('NUMCARTE', $row['numcarte'])->first();
            $valeur = substr($row['numcarte'], 0, 3);
            if ($valeur == "238" || $valeur == "239" || $valeur == "241" || $valeur == "242") {
                if ($numcarte == null) {
                    Import::create([
                        'NUMDIST' => $row['numdist'],
                        'NOMDIST' => $row['nomdist'],
                        'CSALESMAN' => $row['csalesman'],
                        'LSALESMAN' => $row['lsalesman'],
                        'CUSER' => $row['cuser'],
                        'LUSER' => $row['luser'],
                        'CCIVIL' => $row['ccivil'],
                        'NOM' => $row['nom'],
                        'PRENOM' => $row['prenom'],
                        'NUMABO' => $row['numabo'],
                        'NUMABONT' => $row['numabont'],
                        'DATE' => $row['date'],
                        'CMOUVMT' => $row['cmouvmt'],
                        'MONTANT_TTC' => $row['montant_ttc'],
                        'MONTANT_HT' => $row['montant_ht'],
                        'DEVISE' => $row['devise'],
                        'TX_TVA' => $row['tx_tva'],
                        'GROUPE' => $row['groupe'],
                        'CSOCIETE' => $row['csociete'],
                        'CARTICLE' => $row['carticle'],
                        'LARTICLE' => $row['larticle'],
                        'DEBABO' => $row['debabo'],
                        'FINABO' => $row['finabo'],
                        'DUREE' => $row['duree'],
                        'VALIDFULL' => $row['validfull'],
                        'NUMCARTE' => $row['numcarte'],
                        'NUMDECO' => $row['numdeco'],
                        'NUMSCRATCH' => $row['numscratch'],
                        'MONTANT_TAXE' => $row['montant_taxe'],
                        'IDTRANSACTION_MOBILE' => $row['idtransaction_mobile'],
                    ]);
                }else{
                    if($row['cmouvmt'] == "CREAT"){
                        if($numcarte->CMOUVMT != "CREAT") {
                            $numcarte->CMOUVMT = $row['cmouvmt'];
                            $numcarte->save();
                        }
                    }elseif($row['cmouvmt'] == "VENTMAT"){
                        if($row['cmouvmt'] != $numcarte->CMOUVMT && $numcarte->CMOUVMT != "CREAT") {
                            $numcarte->CMOUVMT = $row['cmouvmt'];
                            $numcarte->save();
                        }
                    }elseif($row['cmouvmt'] == "REAAV"){
                        if($row['cmouvmt'] != $numcarte->CMOUVMT && $numcarte->CMOUVMT != "CREAT" && $numcarte->CMOUVMT != "VENTMAT") {
                            $numcarte->CMOUVMT = $row['cmouvmt'];
                            $numcarte->save();
                        }
                    }elseif ($row['cmouvmt'] == "REAAP"){
                        if($row['cmouvmt'] != $numcarte->CMOUVMT && $numcarte->CMOUVMT != "CREAT" && $numcarte->CMOUVMT != "VENTMAT" && $numcarte->CMOUVMT != "REAAV") {
                            $numcarte->CMOUVMT = $row['cmouvmt'];
                            $numcarte->save();
                        }
                    }elseif ($row['cmouvmt'] == "MODART"){
                        if($row['cmouvmt'] != $numcarte->CMOUVMT && $numcarte->CMOUVMT != "CREAT" && $numcarte->CMOUVMT != "VENTMAT" && $numcarte->CMOUVMT != "REAAV" && $numcarte->CMOUVMT != "REAAP") {
                            $numcarte->CMOUVMT = $row['cmouvmt'];
                            $numcarte->save();
                        }
                    }
                }
            }
        }
    }

    public function rules(): array
    {
        return [
            'numdist' => [
                'required',
            ],
        ];
    }
}
