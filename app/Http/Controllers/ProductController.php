<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;


class ProductController extends Controller
{
     public function index(): View
    {
        $products = Product::latest()->paginate(7);
        
        return view('products.index',compact('products'))
                    ->with('i', (request()->input('page', 1) - 1) * 7);
    }
   
  
    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('products.create');
    }
  
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nama_barang' => 'required',
            'detail' => 'required',
            'harga_barang' => 'required',
            'stock' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $input = $request->all();
    
        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
      
        Product::create($input);
       
        return redirect()->route('products.index')
                         ->with('success', 'Produk Berhasil Ditambahkan.');
    }
  
    
  
    
    public function edit(Product $product): View
    {
        return view('products.edit', compact('product'));
    }
  
    
    public function update(Request $request, Product $product): RedirectResponse
    {
        $request->validate([
            'nama_barang' => 'required',
            'detail' => 'required',
            'harga_barang' => 'required',
            'stock' => 'required'
            
        ]);
    
        $input = $request->all();
    
        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }
            
        $product->update($input);
      
        return redirect()->route('products.index')
                         ->with('success', 'Produk Berhasil diubah');
    }
  
   
    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();
         
        return redirect()->route('products.index')
                         ->with('success', 'Produk Berhasil Dihapus');
    }

    public function addToCart(Request $request)
    {
        $id = $request->id;
        $product = \App\Models\Product::find($id); // Sesuaikan dengan nama Model Produk Anda

        if(!$product) {
            return response()->json(['status' => 'error', 'message' => 'Produk tidak ditemukan']);
        }

        $cart = session()->get('cart', []);

        // Jika produk sudah ada di cart, update quantity
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            // Jika belum ada, masukkan data baru
            $cart[$id] = [
                "name" => $product->nama_barang,
                "quantity" => 1,
                "price" => $product->harga_barang,
                "image" => $product->image
            ];
        }

        session()->put('cart', $cart);

        // Kirim balikan jumlah total item ke frontend
        return response()->json([
            'status' => 'success', 
            'total_items' => count($cart),
            'message' => 'Berhasil ditambahkan ke keranjang!'
        ]);
    }
}
