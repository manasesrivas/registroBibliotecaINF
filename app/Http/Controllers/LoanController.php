<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loan;


class LoanController extends Controller
{
    public function index(){
        $laons = Loan::all();
        return view('loan.index', compact('loans'));
    }
    
    public function create(){
        return view('loan.create');
    }
    
    public function show(Loan $loan){
        return view('loan.show', compact('loan'));
    }
}
