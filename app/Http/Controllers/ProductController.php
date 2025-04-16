<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::paginate(20); // 20 users per page ::paginate(20)
        return view('products.product', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeProduct(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'image' => 'required|image|max:2048',
            'size' => 'numeric',
            'weight' => 'required|numeric',
            'price' => 'required|numeric',
            'discount_price' => 'nullable|numeric',
            'quantity' => 'required|integer',
            // 'alert_stock' => 'required|integer',
            'sku' => 'required|unique:products,sku',
            'category' => 'nullable|string',
            'description' => 'required|string',
        ]);


        $product = new Product();
        $product->product_name = $request->product_name;
        $product->size = $request->size;
        $product->weight = $request->weight;
        $product->price = $request->price;
        $product->discount_price = $request->discount_price;
        $product->quantity = $request->quantity;
        // $product->alert_stock = $request->alert_stock;
        $product->sku = $request->sku;
        $product->category = $request->category;
        $product->description = $request->description;

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $uploadPath = public_path('/storage/uploads/products');

            // Create the directory if it doesn't exist
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }

            $image->move($uploadPath, $imageName);
            $product->image = '/storage/uploads/products/' . $imageName;
        }

        $product->save();

        return redirect()->route('products.product')->with('success', 'Product Added Successfully');
    }
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try {
            $product = Product::findOrFail($id); // Find the product or fail with 404

            return view('products.product', compact('product'));
        } catch (\Exception $e) {
            Log::error('Failed to load product edit form: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Unable to load product for editing.');
        }
    }



    /**
     * Update the specified resource in storage.
     */
    public function updateProduct(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        // Debugging - check what's coming in the request
        // dd($request->all());

        try {
            $data = [
                'product_name' => $request->product_name,
                'size' => $request->size,
                'weight' => $request->weight,
                'price' => $request->price,
                'discount_price' => $request->discount_price,
                'quantity' => $request->quantity,
                'description' => $request->description,
                'sku' => $request->sku,
                'category' => $request->category
            ];

            $product->update($data);

            // Handle image update
            if ($request->hasFile('image')) {
                // Delete old image if exists
                if ($product->image && file_exists(public_path($product->image))) {
                    File::delete(public_path($product->image));
                }

                $image = $request->file('image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('/storage/uploads/products'), $imageName);

                $product->image = '/storage/uploads/products/' . $imageName;
                $product->save();
            }

            return redirect()->route('products.product') // Update to your correct route name
                ->with('success', 'Product updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Failed to update Product: ' . $e->getMessage());
        }
    }


    /**
     * Remove the specified resource from storage.
     */

    public function destroyProduct($id)
    {
        $product = Product::find($id);
        if (file_exists(public_path($product->image))) {
            File::delete(public_path($product->image));
        }
        $product->delete();
        return redirect()->route('products.product')->with('success', 'Product has been deleted successfully');
    }
}
