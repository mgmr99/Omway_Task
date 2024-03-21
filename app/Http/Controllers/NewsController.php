<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $faker = \Faker\Factory::create();
        // for ($i = 0; $i < 5; $i++) {
        //     $news = new News();
        //     $news->category_id = $faker->unique()->randomNumber(8);
        //     $news->id = $faker->unique()->randomNumber(8);
        //     $news->title = $faker->name;
        //     $news->slug = $faker->name;
        //     $news->date = $faker->date;
        //     $news->description = $faker->text;
        //     $news->image = $faker->image;
        //     $news->is_publish = $faker->boolean;
        //     $news->save();
        // }
        //show the news which is published
        // $news = News:: where('is_publish', 1)->get();
        $news = News::all();
        return view('news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the data
        $validatedData = $request->validate([
            'category_id' => 'required',
            'news_id' => 'required',
            'title' => 'required',
            'slug' => 'required',
            'date' => 'required',
            'description' => 'required',
            'image' => 'required',
            'is_publish' => 'required'
        ]);

        // Retrieve the validated data
        $category_id = $validatedData['category_id'];
        $news_id = $validatedData['news_id'];
        $title = $validatedData['title'];
        $slug = $validatedData['slug'];
        $date = $validatedData['date'];
        $description = $validatedData['description'];
        $image = $validatedData['image'];
        $is_publish = $validatedData['is_publish'];

        // Move image to the public folder
        $imagePath = $image->move(public_path('images'), $image->getClientOriginalName());

        // Store the data in the database
        $news = News::create([
            'category_id' => $category_id,
            'id' => $news_id,
            'title' => $title,
            'slug' => $slug,
            'date' => $date,
            'description' => $description,
            'image' => $imagePath,
            'is_publish' => $is_publish
        ]);

        // Attach the category to the news in the pivot table category_news
        $category = Category::find($category_id);
        $news->categories()->attach($category->id);

        // Redirect to the news index page
        return redirect()->route('news.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //show the news details
        $news = News::find($id);
        return view('news.show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //edit the news
        $news = News::find($id);
        return view('news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the data
        $validatedData = $request->validate([
            'category_id' => 'required',
            'news_id' => 'required',
            'title' => 'required',
            'slug' => 'required',
            'date' => 'required',
            'description' => 'required',
            'image' => 'required',
            'is_publish' => 'required'
        ]);

        // Retrieve the validated data
        $category_id = $validatedData['category_id'];
        $news_id = $validatedData['news_id'];
        $title = $validatedData['title'];
        $slug = $validatedData['slug'];
        $date = $validatedData['date'];
        $description = $validatedData['description'];
        $image = $validatedData['image'];
        $is_publish = $validatedData['is_publish'];

        // Find the news by ID
        $news = News::find($id);

        // Update the news data
        $news->update([
            'category_id' => $category_id,
            'id' => $news_id,
            'title' => $title,
            'slug' => $slug,
            'date' => $date,
            'description' => $description,
            'is_publish' => $is_publish
        ]);

        // Move image to the public folder
        $imagePath = $image->move(public_path('images'), $image->getClientOriginalName());
        $news->image = $imagePath;
        $news->save();

        // Redirect to the news index page
        $news = News::all();
        return redirect()->route('news.index', compact('news'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //delete the news
        $news = News::find($id);
        $news->delete();
        return redirect()->route('news.index');
    }

    public function publish(string $id)
    {
        //publish the news
        $news = News::find($id);
        $news->is_publish = true;
        $news->save();
        return redirect()->route('news.index');
    }

    public function unpublish(string $id)
    {
        $news = News::find($id);
        $news->is_publish = false;
        $news->save();
        return redirect()->route('news.index');
    }

    public function search(Request $request)
    {
        $s = $request->input('search');
        $news = News::search($s)->get();
        return redirect()->route('news.index', compact('news'));
    }
}
