<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Session;
use Excel;
use File;
use App\Student;


class StudentController extends Controller
{
    public function index()
    {
        return view('add-student');
    }

    public function students()
    {

        $students = Student::all();
        return view('students')->with('students', $students);
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
                        $insert[] = [
                            'name' => $value->the_name,
                            'email' => $value->emails,
                            'phone' => $value->phones,
                        ];
                    }

                    if(!empty($insert)){

                        $insertData = DB::table('students')->insert($insert);
                        if ($insertData) {
                            Session::flash('success', 'Your Data has successfully imported');
                        }else {
                            Session::flash('error', 'Error inserting the data..');
                            return back();
                        }
                    }
                }

                return redirect()->route('students');

            }else {
                Session::flash('error', 'File is a '.$extension.' file.!! Please upload a valid xls/csv file..!!');
                return back();
            }
        }
    }
}
