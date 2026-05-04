<?php

namespace App\Http\Controllers;

use App\Models\Spot;
use Illuminate\Http\Request;
use App\Models\Category;

class SpotController extends Controller
{
    public function index(Request $request)
    {
        $categories = category::all();
        if ($request->has('category_id')) {
            $spots = Spot::where('category_id', $request->category_id)->get();
        } else {
            $spots = Spot::all();
        }

        return view('spots.index', compact('spots', 'categories'));
    }


    public function create()
    {
        $categories = Category::all();
        return view('spots.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'image' => 'image|max:2048',
            'category_id' => 'required|exists:categories,id',
            'map_url' => 'nullable|url',
        ]);
        $spot = new Spot();

        $spot->name = $request->name;
        $spot->description = $request->description;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = $image->getClientOriginalName();
            $image->move(public_path('images'), $filename);
            $spot->image_path = 'images/' . $filename;
        }
        $spot->category_id = $request->category_id;
        $spot->map_url = $request->map_url;

        $spot->is_halal_friendly = $request->has('is_halal_friendly');
        $spot->is_private_booking = $request->has('is_private_booking');
        $spot->is_english_friendly = $request->has('is_english_friendly');
        $spot->save();

        return redirect()->route('spots.index');
    }

    public function destroy(Spot $spot)
    {
        $spot->delete();
        return redirect()->route('spots.index');
    }
    public function edit(Spot $spot)
    {
        $categories = Category::all();
        return view('spots.edit', compact('spot', 'categories'));
    }
    public function update(Request $request, Spot $spot)
    {
        // 1. 基本情報の更新
        $spot->name = $request->name;
        $spot->description = $request->description;
        $spot->category_id = $request->category_id;

        // 2. 画像が新しく選ばれた場合「だけ」画像を更新する処理
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = $image->getClientOriginalName(); // ←スペルミス(Orijinal -> Original)を修正しました！
            $image->move(public_path('images'), $filename);
            $spot->image_path = 'images/' . $filename;
        }

        // 3. マップとVIP情報の更新（画像が選ばれても選ばれなくても、毎回必ず更新する！）
        $spot->map_url = $request->map_url;
        $spot->is_halal_friendly = $request->has('is_halal_friendly');
        $spot->is_private_booking = $request->has('is_private_booking');
        $spot->is_english_friendly = $request->has('is_english_friendly');

        // 4. データベースに保存
        $spot->save();

        // 5. 一覧画面へ戻る
        return redirect()->route('spots.index');
    }
    public function show(Spot $spot)
    {
        return view('spots.show', compact('spot'));
    }
}
