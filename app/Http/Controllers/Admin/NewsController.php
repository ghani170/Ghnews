<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::latest()->get();
        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {
        
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'paragraphs' => 'nullable|array',         
            'paragraphs.*' => 'nullable|string',     
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('news_images', 'public');
        }

        News::create([
            'title' => $data['title'],
            'paragraphs' => $data['paragraphs'],
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.news.index')->with('success', 'News created successfully.');
    }

    public function destroy(News $news)
    {
        if ($news->image) {
            \Storage::disk('public')->delete($news->image);
        }
        $news->delete();
        return redirect()->route('admin.news.index')->with('success', 'News deleted successfully.');
    }

    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    public function update(Request $request, News $news)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'paragraphs' => 'nullable|array',
            'paragraphs.*' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($news->image) {
                \Storage::disk('public')->delete($news->image);
            }
            $data['image'] = $request->file('image')->store('news_images', 'public');
        }
        $news->update($data);
        return redirect()->route('admin.news.index')->with('success', 'News updated successfully.');
    }
}
