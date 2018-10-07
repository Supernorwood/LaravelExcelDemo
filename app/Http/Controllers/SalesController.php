<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Session;
use Excel;
use File;
use App\Sale;
use App\libs\FloridaBlue\ImportFB2018;
use App\libs\FloridaBlue\ImportFile;

class SalesController extends Controller
{
    private $importer;
    public function __construct(ImportFile $importer)
    {
        $this->importer = $importer;
    }

    public function index()
    {
        return view('add-sale');
    }

    public function sales()
    {

        $sales = Sale::all();
        return view('sales')->with('sales', $sales);
    }

    public function import(Request $request){
        //validate the xls file
        $this->validate($request, array(
            'file'      => 'required'
        ));

        if($request->hasFile('file')){
            $extension = File::extension($request->file->getClientOriginalName());
            if ($extension == "xlsx" || $extension == "xls" || $extension == "csv") {

                // Load the data
                $data = $this->importer->load($request->file);

                if(!empty($data) && $data->count()) {
                    // Parse the data
                    $sales = $this->importer->parse($data);

                    // Save the parsed data
                    $this->importer->save($sales);

                    if (Sale::count() > 0)
                        Session::flash('success', 'Your Data has successfully imported');
                }

                return redirect()->route('sales');

            }else {
                Session::flash('error', 'File is a '.$extension.' file.!! Please upload a valid xls/csv file..!!');
                return back();
            }
        }
    }

}
