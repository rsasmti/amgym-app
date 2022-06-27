<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $jumlahCustomers = DB::table('customers')->count();
        $jumlahMemberCardio = DB::table('transactions')
        ->where('nama_product', 'LIKE', '%Cardio%')
        ->count();
        $jumlahMemberGym = DB::table('transactions')
        ->where('nama_product', 'LIKE', '%Gym%')
        ->count();
        $jumlahproducts = DB::table('products')->count();

        // return view('transaction.index');
        return view('dashboard.home', compact('jumlahCustomers','jumlahMemberCardio','jumlahMemberGym','jumlahproducts'));

    }
}
