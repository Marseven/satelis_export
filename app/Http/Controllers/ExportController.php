<?php

namespace App\Http\Controllers;

use App\Exports\ImportExport;
use App\Imports\ImportsImport;
use App\Models\Import;
use Illuminate\Http\Request;
use Importer;
use Exporter;

class ExportController extends Controller
{
    //
    public function index()
    {
        return view('export.index');
    }

    public function import(Request $request)
    {
        // 1. Validation du fichier uploadé. Extension ".xlsx" autorisée
        $this->validate($request, [
            'fichier' => 'required|file'
        ]);

        $collections = Importer::make('Csv')->load($request->file('fichier'))->setParser(new ImportsImport)->getCollection();
        $ajoute = 0;
        $maj = 0;

        foreach ($collections as $row) {
            if($row != null) {
                //dd($row);
                $numcarte = Import::where('NUMCARTE', $row->NUMCARTE)->first();
                $valeur = substr($row->NUMCARTE, 0, 3);
                if ($valeur == "238" || $valeur == "239" || $valeur == "241" || $valeur == "242") {
                    if ($numcarte == null) {
                        $row->save();
                        $ajoute++;
                    } else {
                        if ($row->CMOUVMT == "CREAT") {
                            if ($numcarte->CMOUVMT != "CREAT") {
                                $numcarte->CMOUVMT = $row->CMOUVMT;
                                $numcarte->save();
                                $maj++;
                            }
                        } elseif ($row->CMOUVMT == "VENTMAT") {
                            if ($row->CMOUVMT != $numcarte->CMOUVMT && $numcarte->CMOUVMT != "CREAT") {
                                $numcarte->CMOUVMT = $row->CMOUVMT;
                                $numcarte->save();
                                $maj++;
                            }
                        } elseif ($row->CMOUVMT == "REAAV") {
                            if ($row->CMOUVMT != $numcarte->CMOUVMT && $numcarte->CMOUVMT != "CREAT" && $numcarte->CMOUVMT != "VENTMAT") {
                                $numcarte->CMOUVMT = $row->CMOUVMT;
                                $numcarte->save();
                                $maj++;
                            }
                        } elseif ($row->CMOUVMT == "REAAP") {
                            if ($row->CMOUVMT != $numcarte->CMOUVMT && $numcarte->CMOUVMT != "CREAT" && $numcarte->CMOUVMT != "VENTMAT" && $numcarte->CMOUVMT != "REAAV") {
                                $numcarte->CMOUVMT = $row->CMOUVMT;
                                $numcarte->save();
                                $maj++;
                            }
                        } elseif ($row->CMOUVMT == "MODART") {
                            if ($row->CMOUVMT != $numcarte->CMOUVMT && $numcarte->CMOUVMT != "CREAT" && $numcarte->CMOUVMT != "VENTMAT" && $numcarte->CMOUVMT != "REAAV" && $numcarte->CMOUVMT != "REAAP") {
                                $numcarte->CMOUVMT = $row->CMOUVMT;
                                $numcarte->save();
                                $maj++;
                            }
                        }
                    }
                }
            }
        }

        // 6. Retour vers le formulaire avec un message $msg
        return back()->with("success", "Importation réussie ! ".$ajoute." ajout & ".$maj." mise à jour.");
    }

    public function export()
    {
        return view('export.export');

    }

    public function download(){
        // 2. Le nom du fichier avec l'extension : .xlsx ou .csv
        $file_name = "Satelis_consolider_".date('YmdHis').".csv";
        return Exporter::make('Csv')->load(Import::all())->setSerialiser(new ImportExport)->stream($file_name);
    }

    public function reset(){
        Import::truncate();
        return back()->with("success", "Réinitialisation réussie ! ");
    }


}
