<?php

namespace App\Http\Controllers;

use App\Models\Spot;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\ReserveConsultationRequest;

class SpotController extends Controller
{
    public function index(Request $request)
{
    // 1. カテゴリー一覧を取得
    $categories = Category::all();

    // 2. スポット一覧のクエリを準備
    $query = Spot::query();

    // 3. カテゴリーで絞り込みがある場合
    if ($request->filled('category_id')) {
        $query->where('category_id', $request->category_id);
    }

    $spots = $query->get();

    // ★ 4. ここが重要！DBから「ユーザーID:1」のお気に入りスポットIDだけを抜き出します
    // pluck('spot_id') は「spot_idの列だけを引っこ抜く」という便利な命令です
    $bookmarkedSpotIds = \App\Models\Bookmark::where('user_id', 1)
                            ->pluck('spot_id')
                            ->toArray();

    // 5. すべてのデータをビューに渡す
    return view('spots.index', compact('spots', 'categories', 'bookmarkedSpotIds'));
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
    public function reserve(ReserveConsultationRequest $request, Spot $spot)
    {
        // ※将来はここでデータベースに保存したり、メールを送ったりします
        // 今回は「成功しました」というメッセージと共に、元のページに戻す処理だけ書きます

        return back()->with('success', 'ご相談リクエストを承りました。後ほど、担当ガイドより特別なご提案をお送りいたします。');
    }
}

