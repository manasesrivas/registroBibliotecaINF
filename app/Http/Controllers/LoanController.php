<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loan;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class LoanController extends Controller
{
    public function index(): View{
        $loans = Loan::all();
        $pendientes=Loan::where("estado", true)->count();
        return view("loan.index", compact("loans", "pendientes"));
    }
    public function edit(Loan $loan): View{
        return view('loan.edit', compact("loan"));
    }

    public function store(Request $request): RedirectResponse{
        Loan::create($request->all());
        return redirect()->route('loan.index'); 
    }

    public function loanComeBack($id): RedirectResponse{
        DB::table("loans")->where('id', $id)->update(['estado' => false, 'prestamo_completado'=>DB::raw("CURRENT_DATE")]);
        return redirect()->route('loan.index');
    }

}
