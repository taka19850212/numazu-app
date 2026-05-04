<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>沼津ローカルガイド　新規登録</title>
</head>

<body style="background-color: #f3f4f6; padding: 50px; text-align: center;">

    <h1 style="color: #333;">新しいスポットを登録</h1>

    <form action="{{ route('spots.store') }}" method="POST" enctype="multipart/form-data" style="...">
        @csrf

        <div style="margin-bottom: 20px;">
            <label style="display: block; font-weight: bold; margin-bottom: 5px;">スポット名:</label>
            <input type="text" name="name" required style="...">
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display: block; font-weight: bold; margin-bottom: 5px;">カテゴリ:</label>
            <select name="category_id" required style="...">
                <option value="">--カテゴリを選択してください--</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display: block; font-weight: bold; margin-bottom: 5px;">説明文:</label>
            <textarea name="description" required style="..."></textarea>
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display: block; font-weight: bold; margin-bottom: 5px;">GoogleマップURL（任意）:</label>
            <input type="url" name="map_url" placeholder="https://maps.app.goo.gl/..." style="...">
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display: block; font-weight: bold; margin-bottom: 5px;">画像:</label>
            <input type="file" name="image" style="...">
        </div>
        <div
            style="margin-bottom: 20px; background-color: #f9f9f9; padding: 15px; border-radius: 5px; border: 1px solid #ddd;">
            <label style="display: block; font-weight: bold; margin-bottom: 10px; color: #d4af37;">✨ Premium Features
                (VIPオプション):</label>

            <label style="display: block; margin-bottom: 5px;">
                <input type="checkbox" name="is_halal_friendly" value="1"> 🕌 Halal Friendly (ハラール対応)
            </label>
            <label style="display: block; margin-bottom: 5px;">
                <input type="checkbox" name="is_private_booking" value="1"> 🗝️ Private Booking (貸切・個室可)
            </label>
            <label style="display: block;">
                <input type="checkbox" name="is_english_friendly" value="1"> 🗣️ English Support (英語対応可)
            </label>
        </div>
        <div style="text-align: center;">
            <button type="submit" style="...">登録する</button>
        </div>
    </form>

    <div style="margin-top: 20px;">
        <a href="{{ route('spots.index') }}" style="color: #666; text-decoration: none;">← 一覧に戻る</a>
    </div>
</body>

</html>