<?php

namespace App\Http\Controllers;

use App\Models\Transaction;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {

        $income = Transaction::where('transaction_status','SUCCESS')->sum('transaction_total');
        $sales = Transaction::count();
        $items = Transaction::orderBy('id','DESC')->take(5)->get();
        $pie = [
            'pending' => Transaction::where('transaction_Status','PENDING')->count(),
            'success' => Transaction::where('transaction_Status','SUCCESS')->count(),
            'failed' => Transaction::where('transaction_Status','FAILED')->count()
        ];
        
        return view('dashboard')->with([
            'income' => $income,
            'sales' => $sales,
            'items' => $items,
            'pie' => $pie,
        ]);
    }
}
