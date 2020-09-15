<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpClient\HttpClient;

use App\Student_mysql;
use App\Student_sqlsrv;
use App\nam2020;
use App\nam2019;
use App\nam2018;
use App\nam2017;
use App\nam2016;
use App\nam2015;
use App\nam2014;
use App\nam2013;
use App\nam2012;
use App\nam2011;
use Goutte\Client;

class DataController extends Controller
{
    //$client = new Client();
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
        $html = file_get_html($request->file('file'));
        //Cach 1
        // $mang = array();
        // foreach($html->find('table[id=MainContent_ctl00_gvItems] tr td') as $td){
        //     $mang[] = $td->innertext;
        // }
        // dd($mang);
        //cach 2
        $html->find('table[id=MainContent_ctl00_gvItems] tr',0)->outertext='';
        $html ->load($html ->save());
        //$mang_cha = array();
        foreach($html->find('table[id=MainContent_ctl00_gvItems] tr') as $tr){
            $mang_con = array();
            foreach($tr->find('td') as $td){
                $mang_con[] = $td->innertext;
            }
            $dt = new nam2020();
            if ($mang_con[0]=='KHE DIÊN') {
                $dt->muctieunam_id = 1;
            } else {
                $dt->muctieunam_id = 2;
            }
            $dt->user_id = 1;
            $dt->date = date('Y-m-d',strtotime(str_replace('/','-',$mang_con[1])));
            $dt->power = str_replace( ',', '.', $mang_con[2]);
            $dt->quantity = str_replace( ',', '.', $mang_con[3]);
            $dt->MNH = str_replace( ',', '.', $mang_con[4]);
            $dt->rain = str_replace( ',', '.', $mang_con[5]);
            $dt->device = 'Tốt, đang hoạt động';
            $dt->status = 1;
            $dt->save();
        }
        // echo $mang_cha[0][0];
        $data = nam2020::orderBy('date','desc')->get();
        return view('data.showfile',compact('data'));

    }
}
