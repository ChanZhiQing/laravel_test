<?php

namespace App\Http\Controllers;

use App\Models\purchase_transactions;
use App\Models\vouchers; 
use App\Models\campaigns; 
 
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
class PhotoController extends Controller
{
    public function index(){
        $days_ago = date('Y-m-d',strtotime("-60 days")); 
        $name = request('name');
        if(!empty($name))
        {
            $transactions = DB::table('purchase_transactions')
            ->where('total_spent', '>=', 100)
            ->where('transaction_at', ">=", $days_ago)  
            ->where('customer_id', '=', $name)
            ->get();
            
            $vouchers = DB::table('vouchers')  
            ->where('mode', '=', 0)
            ->orwhere('customer_id', '=', $name)
            ->get();
            $events = DB::table('campaigns')  
            ->where('mode', '=', 0) 
            ->get();

            
            return view('/upload', compact('transactions','vouchers','events','name'))->with('alert', 'Added Successfully!');

        }
        else
        {
            return back();
            
        }
    }
    public function create(){
        return view('upload');
    }
    
    public function store(Request $request){
        $name = $request->file('photo')->getClientOriginalName();
        $request->file('photo')->store('public/images/');
        
            $id = request('id');
         $customer_id = request('name');
         $redeemed_time = date('Y-m-d H:i:s');
        // $voucher = new vouchers();
        // $voucher->photo = $name;
        // $voucher->customer_id = uniqid(); 
        // $voucher->voucher = uniqid(); 
        // $voucher->redeemed_time = date('Y-m-d H:i:s');
        // $voucher->save();
 
        DB::update('update vouchers set photo = ?,customer_id = ?,redeemed_time = ?,mode = ? where id = ?',[$name,$customer_id, $redeemed_time,'1',$id]);
         
        //return redirect()->back(); 
        $url = "/home?name=".request('name');
        return redirect($url);
    }
   
}