<?php

namespace App\Http\Controllers;

use App\Http\Resources\ApiResource;
use App\Models\Book;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Spatie\FlareClient\Api;

class ApiController extends Controller
{
    public function index():JsonResource{
        return ApiResource::collection(Book::all());
    }

    public function store(Request $request): JsonResponse{
        $book = Book::create($request->all());
        return response()->json(
            [
                'succes'=>true,
                'data'=> new ApiResource($book)
            ], 201);
    }
    public function show($id):JsonResource
    {
        $book = Book::find($id);
        return new ApiResource($book);
        // return response()->json($note, 200);
    }

    public function update(Request $request, $id):JsonResponse
    {
        $book = Book::find($id);
        $book->update($request->all());
        return response()->json(
            [
                'success' => true,
                'data' => new ApiResource($book)
            ], 200);
    }

  
    public function destroy($id):JsonResponse
    {
        book::find($id)->delete();
        return response()->json(['success' => true], 200);
    }
}
