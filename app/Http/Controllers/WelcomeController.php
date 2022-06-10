<?php

namespace App\Http\Controllers;

use App\Models\vouchers;
use App\Models\campaigns;
use App\Models\purchase_transactions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class WelcomeController extends Controller
{ 
    public function index(){ 
        return view('/');
    }
    public function show(){
        $vouchers = DB::table('vouchers')  
            ->where('mode', '=', 0) 
            ->get();
        $events = DB::table('campaigns')  
            ->where('mode', '=', 0) 
            ->get();     
            
            return view('welcome', compact('vouchers','events'))->with('alert', 'Added Successfully!');

    }
    public function store(Request $request){ 
        
    }
    

} 
