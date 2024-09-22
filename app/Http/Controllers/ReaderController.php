<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Book;
use App\Models\Loan;
use App\Models\Reader;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ReaderController extends Controller
{
    public function index($id = null): View{
        $readers = Reader::withCount("loans")->get();
        if($id != null){
            $libros = DB::table("books")->where("disponible", true)->get();
            return view('reader.index', compact('readers', 'libros', 'id'));
        }
        else{
            return view('reader.index', compact('readers', 'id'));
        }
    }

    public function create(): View{
        return view('reader.create');
    }

    public function store(Request $request): RedirectResponse{
        Reader::create($request->all());
        return redirect()->route('reader.index');
    }

    public function edit(Reader $reader): View{
        $libros_leidos = Loan::where("reader_id", $reader->id)->count();
        return view('reader.edit', compact('reader', 'libros_leidos'));
    }

    public function update(Request $request, Reader $reader): View{
        $reader->update($request->all());
        return view('reader.index');
    }

    public function destroy(Reader $reader): RedirectResponse{
        $reader->delete();
        return redirect()->route('reader.index');
    }

}
