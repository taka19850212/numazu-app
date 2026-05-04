<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>沼津ローカルガイド　</title>
</head>

<body style="background-color: #f3f4f6; padding: 50px; text-align: center;">

    <h1 style="color: #333;">スポット編集</h1>

    <form action="{{ route('spots.update', $spot->id) }}" method="POST" enctype="multipart/form-data"
        style="background-color: white; padding: 30px; border-radius: 10px; display: inline-block; box-shadow: 0 4px 15px rgba(0,0,0,0.1); width: 400px; text-align: left;">
        @csrf
        @method('PUT')

        <div style="margin-bottom: 20px;">
            <label style="display: block; font-weight: bold; margin-bottom: 5px;">スポット名:</label>
            <input type="text" name="name" value="{{ $spot->name }}" required
                style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box;">
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display: block; font-weight: bold; margin-bottom: 5px;">カテゴリ:</label>
            <select name="category_id" required
                style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box;">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $spot->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display: block; font-weight: bold; margin-bottom: 5px;">説明文:</label>
            <textarea name="description" required
                style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box; height: 100px;">{{ $spot->description }}</textarea>
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display: block; font-weight: bold; margin-bottom: 5px;">画像（変更する場合のみ選択）:</label>
            <input type="file" name="image" style="width: 100%;">
        </div>
        <!-- ★ココを追加！VIPオプション (編集用) -->
        <div
            style="margin-bottom: 20px; background-color: #f9f9f9; padding: 15px; border-radius: 5px; border: 1px solid #ddd;">
            <label style="display: block; font-weight: bold; margin-bottom: 10px; color: #d4af37;">✨ Premium Features
                (VIPオプション):</label>

            <label style="display: block; margin-bottom: 5px;">
                <input type="checkbox" name="is_halal_friendly" value="1" {{ $spot->is_halal_friendly ? 'checked' : '' }}> 🕌 Halal Friendly (ハラール対応)
            </label>
            <label style="display: block; margin-bottom: 5px;">
                <input type="checkbox" name="is_private_booking" value="1" {{ $spot->is_private_booking ? 'checked' : '' }}> 🗝️ Private Booking (貸切・個室可)
            </label>
            <label style="display: block;">
                <input type="checkbox" name="is_english_friendly" value="1" {{ $spot->is_english_friendly ? 'checked' : '' }}> 🗣️ English Support (英語対応可)
            </label>
        </div>
        <!-- ★追加ココまで -->
        <div style="text-align: center;">
            <button type="submit"
                style="padding: 10px 30px; background-color: #2c3e50; color: white; border: none; border-radius: 4px; font-weight: bold; cursor: pointer; letter-spacing: 1px;">
                上書き保存する
            </button>
        </div>
    </form>

    <div style="margin-top: 20px;">
        <a href="{{ route('spots.index') }}" style="color: #666; text-decoration: none;">← 一覧に戻る</a>
    </div>
</body>

</html>