<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\User;
use App\Models\Comment;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;

class BlogController extends Controller
{
    public function AllBlogCategory()
    {
        $category = PropertyType::latest()->get();
        return view('backend.category.blog_category', compact('category'));
    } // end function

    public function StoreBlogCategory(Request $request)
    {
        BlogCategory::insert([
            'category_name' => $request->category_name,
            'category_slug' => strtolower(str_replace(' ', '-', $request->category_name)),
        ]);

        $notification = array(
            'message'   => 'Blog category created successfully',
            'alert-type'=> 'success'
        );
        
        return redirect()->route('all.blog.category')->with($notification);
    } // end function

    public function EditBlogCategory()
    {
        $categories = BlogCategory::findOrFail($id);
        return response()->json($categories);
    } // end function

    public function UpdateBlogCategory()
    {
        $cat_id = $request->cat_id;
        return response()->json($categories);
    } // end function

    /*End Amenities All Methods*/
}
