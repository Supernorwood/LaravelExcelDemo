<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Session;
use Excel;
use File;
use App\Sale;

class SalesController_ extends Controller
{
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

                $path = $request->file->getRealPath();
                $data = Excel::load($path, function($reader) {
                })->get();

                if(!empty($data) && $data->count()){
                    foreach ($data as $key => $value) {
                        $sale = new Sale();
                        $sale->agency_code = $value->agency_code;
                        $sale->agent_last_name = $value->agent_last_name;
                        $sale->agent_first_name = $value->agent_first_name;
                        $sale->agent_code = $value->agent_code;
                        $sale->product_type = $value->product_type;
                        $sale->comp_type = $value->comp_type;
                        $sale->subscriber_last_name = $value->subscriber_last_name;
                        $sale->subscriber_first_name = $value->subscriber_first_name;
                        $sale->subscriber_middle_name = $value->subscriber_middle_name;
                        $sale->app_id = $value->app_id;
                        $sale->member_contract_no = $value->member_contract_no;
                        $sale->original_effective_date = $value->original_effective_date;
                        $sale->benefit_effective_date = $value->benefit_effective_date;
                        $sale->accounting_date = $value->accounting_date;
                        $sale->compensation_date = $value->compensation_date;
                        $sale->cancel_date = $value->cancel_date;
                        $sale->comp_year = $value->comp_year;
                        $sale->prior_carrier_ind = $value->prior_carrier_ind;
                        $sale->prior_plan_type = $value->prior_plan_type;
                        $sale->event_type = $value->event_type;
                        $sale->flat_rate = $value->flat_rate;
                        $sale->comm_amount = $value->comm_amount;
                        $sale->county_name = $value->county_name;
                        $sale->cms_date = $value->cms_date;
                        $sale->cycle_year = $value->cycle_year;
                        $sale->admin_fee = $value->admin_fee;

                        $sale->save();
                    }

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
