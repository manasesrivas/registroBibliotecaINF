<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Book;
use App\Models\Reader;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ReaderController extends Controller
{
    public function index(): View{
        $readers = Reader::all();
        return view('reader.index', compact('readers'));
    }

    public function create(): View{
        return view('reader.create');
    }

    public function store(Request $request): RedirectResponse{
        Reader::create($request->all());
        return redirect()->route('reader.index');
    }

    public function edit(Reader $reader): View{
        return view('reader.edit', compact('reader'));
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
