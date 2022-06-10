<?php

namespace App\Http\Controllers;

use App\Models\purchase_transactions;
use App\Models\vouchers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
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
            ->where('customer_id', '=', $name)
            ->get();
            
            return view('/Home', compact('transactions','vouchers','name'))->with('alert', 'Added Successfully!');

        }
        else
        {
            return back();
            
        }

        
    }
    public function store(){
         
    }
} 
