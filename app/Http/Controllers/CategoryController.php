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
        // $faker = \Faker\Factory::create();
        // for ($i = 0; $i < 5; $i++) {
        //     $category = new Category();
        //     $category->id = $faker->unique()->randomNumber(8);
        //     $category->name = $faker->name;
        //     $category->save();
        // }
        $categories = Category::all();
        return view('categories.index', compact('categories'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // validate the datas
        $request->validate([
            'id' => 'required',
            'name' => 'required',
        ]);

        // store the category data in the database
        $id = $request->id;
        $name = $request->name;

        // store the data in the database
        $category = new Category();
        $category->id = $id;
        $category->name = $name;
        $category->save();

        // redirect to the categories index
        $categories = Category::all();
        return redirect()->route('categories.index', compact('categories'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // get the category data from the database
        $category = Category::find($id);
        return view('categories.show', compact('category'));
    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // get the category data from the database
        $category = Category::find($id);
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // update the category data in the database
        $id = $id;
        $name = $request->name;

        // validate the datas
        $request->validate([
            'id' => 'required',
            'name' => 'required',
        ]);

        // store the data in the database
        $category = Category::find($id);
        $category->id = $id;
        $category->name = $name;
        $category->save();

        // redirect to the categories index
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // delete the category data from the database
        $category = Category::find($id);
        $category->delete();

        // redirect to the categories index
        return redirect()->route('categories.index');
    }
}
