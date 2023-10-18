<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\Brand;
use App\Models\Unit;
use App\Models\Size;
use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.Product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::all();
        $subcategories=SubCategory::all();
        $brands=Brand::all();
        $units=Unit::all();
        $sizes=Size::all();
        $colors=Color::all();
        return view('admin.product.create',compact('categories','subcategories','brands','units','sizes','colors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = new Product;
        $product->cat_id = $request->category;
        $product->subcat_id = $request->subcategory;
        $product->brand_id = $request->brand;
        $product->unit_id = $request->unit;
        $product->size_id = $request->size;
        $product->color_id = $request->color;
        $product->code = $request->code;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;

        $images = array();
        if ($files = $request->file('file')) {
            $i = 0;
            foreach ($files as $file) {
                $name = $file->getClientOriginalName();
                $fileNameExtract = explode('.', $name);
                $fileName = $fileNameExtract[0];
                $fileName .= time();
                $fileName .= $i;
                $fileName .= '.';
                $fileName .= $fileNameExtract[1];

                $file->move('image', $fileName);
                $images[] = $fileName;
                $i++;
            }
            $product['image'] = implode("|", $images);

            $product->save();
            return redirect()->back()->with('message','Product Added Successfully');
        } else {
            echo "error";
        }
    }
    /**
     * Display the specified resource.
     */
    public function change_status(Product $product)
    {
        $newStatus = $product->status == 1 ? 0 : 1;
        $product->update(['status' => $newStatus]);
        return redirect()->back()->with('message', 'Product Changed Successfully');
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories=Category::all();
        $subcategories=SubCategory::all();
        $brands=Brand::all();
        $units=Unit::all();
        $sizes=Size::all();
        $colors=Color::all();
        return view('admin.product.edit',compact('product','categories','subcategories','brands','units','sizes','colors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $update=$product->update([
            'code'=>$request->code,
            'name'=>$request->name,
            'cat_id'=>$request->category,
            'subcat_id'=>$request->subcategory,
            'brand_id'=>$request->brand,
            'unit_id'=>$request->unit,
            'size_id'=>$request->size,
            'color_id'=>$request->color,
            'description'=>$request->description,
            'price'=>$request->price,
        ]);
        if($update)
            return redirect('/products')->with('message','Product Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $delete=$product->delete();
        if($delete)
            return redirect()->back()->with('message', 'Product deleted Successfully');
    }
}
