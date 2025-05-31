<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use App\Models\product;
use Illuminate\Http\Request;
use illuminate\view\view;

class Product_Controller
{
    public function index(Request $request) : view {
    

    $query = product::query();

    if ($request->filled('nama')) {
        $query->where('Nama', 'like', '%' . $request->nama . '%');
    }
    if ($request->filled('kategori')){
        $query->where('Kategori', $request->kategori);
    }
    if ($request->filled('harga_min') && $request->filled('harga_max')) {
        $query->whereBetween('Harga', [$request->harga_min, $request->harga_max]);
    }

     $products = $query->latest()->paginate(3);

    return view('table', compact('products'));
    }
   
    public function create() : view {
        return view('create');
    }

    public function store(Request $request): RedirectResponse{
        $request->validate([
            'Nama' => 'required',
            'Deskripsi' => 'required',
            'Harga' => 'required',
            'Kategori' => 'required',
        ]);
        
        product::create([
            'Nama' => $request->Nama,
            'Deskripsi'=> $request-> Deskripsi,
            'Harga'=> $request-> Harga,
            'Kategori'=> $request-> Kategori
        ]);
        return redirect()->route('product.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

        public function show(string $id): view{
            $product = product::findorFail($id);

            return view('show', compact('product'));        
        }

        public function edit(string $id): view{

            $product = product::findorFail($id);

             return view('edit', compact('product'));   
        }
        
        public function update(Request $request, string $id):RedirectResponse{

             $request->validate([
            'Nama' => 'required',
            'Deskripsi' => 'required',
            'Harga' => 'required',
            'Kategori' => 'required',
        ]);

         $product = product::findorFail($id);

        $product->update($request->all());

         return redirect()->route('product.index')->with(['success' => 'Data Berhasil Diubah!']);

        }

        public function destroy($id): RedirectResponse{
            
             $product = product::findorFail($id);

             $product->delete();

             return redirect()->route('product.index')->with(['success'=>'Data Berhasil Dihapus']);

        }

        
}   
