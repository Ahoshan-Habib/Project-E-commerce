<?php
namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories= Category::all();
        return view('admin.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category=new Category();
        $category->id= $request->category;
        $category->name= $request->name;
        $category->description= $request->description;
        $category->image= $request-> image->store('category');

//        if($request->hasFile('image')){
//            $file= $request->file('image');
//            $extension=$file->getClientOriginalExtension();
//            $filename=time().'.'.$extension;
//            $file->move('category',$filename);
//            $category->image= $filename;
//        }
        $category->save();
        return redirect()->back()->with('message','Category Successfully Created');
    }
    /**
     * Display the specified resource.
     */
    public function change_status(Category $category)
    {
        if($category->status==1){
            $category->update(['status'=>0]);
        }else{
            $category->update(['status'=>1]);
        }
        return redirect()->back()->with('message','Status Change Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048', // Adjust validation rules as needed
        ]);

        try {
            $update = $category->update([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                // Handle image upload if a new image is provided
                'image' => $request->hasFile('image')
                    ? $request->file('image')->store('category')
                    : $category->image, // Keep the existing image if no new image is uploaded
            ]);

            if ($update) {
                return redirect('/categories')->with('message', 'Category Updated Successfully');
            }
        } catch (\Exception $e) {
            // Handle any exceptions that occur during the update or file upload process
            return back()->with('error', 'An error occurred during the update.');
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $delete=$category->delete();
        if($delete)
            return redirect()->back()->with('message', 'Category deleted Successfully');
    }
}
