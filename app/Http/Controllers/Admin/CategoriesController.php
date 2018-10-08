<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Http\Requests\CategoryFormRequest;
use Image;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = 'Admin - List Catgeories';
        $categories = Category::orderBy('id', 'desc')->get();
        return view('admin.categories.index', compact('pageTitle', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = 'Admin - Add Catgeory';
        return view('admin.categories.add', compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryFormRequest $request)
    {
        $data = $request->validated();

        if($request->file('category_image')->isValid()) {
            $file = $key = md5(uniqid(rand(), true));
            $ext = $request->file('category_image')->getClientOriginalExtension();
            $image = $file.'.'.$ext;
            $img = Image::make($request->file('category_image')->getRealPath());

            $img->resize(config('image.large_thumbnail_width'), null, function($constraint) {
                $constraint->aspectRatio();
            })->save(config('image.category_image_path').'/thumbnails/large/'.$image);

            $img->resize(config('image.medium_thumbnail_width'), null, function($constraint) {
                $constraint->aspectRatio();
            })->save(config('image.category_image_path').'/thumbnails/medium/'.$image);

            $img->resize(config('image.small_thumbnail_width'), null, function($constraint) {
                $constraint->aspectRatio();
            })->save(config('image.category_image_path').'/thumbnails/small/'.$image);
            $fileName = $request->file('category_image')->move(config('image.category_image_path'), $image);

        } else {
            return redirect('admin/bussiness/category/create')->with('Error', 'Category image is not uploaded. Please try again');
        }

        $input = $request->input();
        $input['image'] = $image;
        $category = array_intersect_key($input, BussinessCategory::$updatable);
        try{

            $category = new BussinessCategory($category);

            $category->slug = Helper::slug($input['title'], $category->id);
            $category->save();

            return redirect('admin/bussiness/category')->with('success', 'New Bussiness category created successfully');

        }catch(Exception $e)
        {
            return redirect('admin/bussiness/category/create')->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
