<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CategoryRequest;


class CategoriesController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $categories = Category::withCount('member')->get()->toTree();
        $model = "Category";

        return view('categories.index', compact('categories','model'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('title','id');
//        return $categories;
        return view('categories.create', compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CategoryRequest $categoryRequest
     * @param Category $category
     * @return \Illuminate\Http\Response
     * @internal param Request $request
     */
    public function store(CategoryRequest $categoryRequest, Category $category)
    {
        //
        $category->create($categoryRequest->all());
        flash('New Category Created', 'success')->important();
        return redirect('staff/categories');
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
     * @param Category $category
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function edit(Category $category)
    {
        //
        $categories = Category::whereNotDescendantOf($category)
            ->pluck('title','id')
            ->except([$category->id]);

        return view('categories.edit', compact('category','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CategoryRequest $categoryRequest
     * @param Category $category
     * @return array
     * @internal param Request $request
     * @internal param int $id
     */
    public function update(CategoryRequest $categoryRequest, Category $category)
    {
        //

//        return $categoryRequest->all();
        $category->update($categoryRequest->all());
        flash('Category Updated', 'success')->important();
        return redirect('staff/categories');

    }


    /**
     * @param Category $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function members(Category $category)
    {
//        $members = $category->member;
//        return $members;
        $members =$category->member()
                ->whereIn('membershipstatus_id', [4,5,2])
                ->orderBy('id', 'desc')
                ->paginate(50);
        return view('members.index', compact('members'));
    }

//    public function check()
//    {
//        $data = Category::fixTree();
//        return $data;
//    }
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
