<?php

namespace App\Http\Controllers;

use App\Exports\ImportExport;
use App\Models\Import;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    //
    public function index()
    {
        return view('export.index');
    }

    public function import(Request $request)
    {
        //Excel::import(new Import(), $request->file('file')->store('temp'));
        return back();
    }

    public function export()
    {
        return view('export.export');

    }

    public function download(){
        return Excel::download(new ImportExport, 'users-collection.xlsx');
    }
}
