<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Student_mysql;
use App\Student_sqlsrv;
use App\nam2019;

class DataController extends Controller
{
    public function show()
    {
        $sinhvien_mysql = Student_mysql::all();
        $sinhvien_sqlsrv = Student_sqlsrv::all();
        return view('data.show',compact('sinhvien_mysql','sinhvien_sqlsrv'));
    }
    public function postshow()
    {
        $sinhvien_sqlsrv = Student_sqlsrv::all();
        //dd($sinhvien_sqlsrv);
        $sinhvien_mysql = new Student_mysql;
        foreach($sinhvien_sqlsrv as $srv){
            $sinhvien_mysql = new Student_mysql();
            $sinhvien_mysql->name = $srv->StudentName;
            $sinhvien_mysql->birthday = $srv->DateOfBirth;
            $sinhvien_mysql->height = $srv->Height;
            $sinhvien_mysql->weight = $srv->Weight;

            $sinhvien_mysql->save();

            //echo($srv);
        }
        return redirect()->route('show');
    }
    public function showthsx()
    {
        $html = file_get_html("C:/Users/VanThu/Downloads/SBA_t5.html");
        //echo $html;
        $ret = $html->find('table[id=MainContent_ctl00_gvItems]',0)->find('tr');
        foreach ($ret as $key) {
            foreach ($key ->find('td') as $td) {
                echo $td.'<br>';
            }
        }
    }

    public function getfile()
    { 
        return view('data.getfile');
    }
    public function postfile(Request $request)
    {
        if($request->hasFile('file')){
            //dd($request->file);
            $html = file_get_html($request->file('file'));
            $hang = $html->find('table[id=MainContent_ctl00_gvItems]',0)->find('tr');
            foreach ($hang as $h) {
                foreach ($h ->find('td') as $cot) {
                    echo $cot;
                    exit();
                    $dt = new nam2019();
                    if ($cot[0]=='KHE DIÊN') {
                        $dt->muctieunam_id = 3;
                    } else {
                        $dt->muctieunam_id = 4;
                    }
                    $dt->user_id = 1;
                    $dt->date = date('Y-m-d',strtotime(str_replace('/','-',$cot[1])));
                    $dt->power = $cot[2];
                    $dt->quantity = $cot[3];
                    $dt->MNH = $cot[4];
                    $dt->rain = $cot[5];
                    $dt->device = $request->device;
                    $dt->status = 'Tốt, đang hoạt động';
                }
            }
        }
        $data = nam2019::orderBy('date','desc')->get();
        return view('data.showfile',compact('data'));
    }
}
