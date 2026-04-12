<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>シンプル日記帳</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-2xl mx-auto">
        <h1 class="text-3xl font-bold mb-8 text-center text-blue-600">My Diary</h1>

        <form action="{{ route('diary.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md mb-8">
            @csrf <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">タイトル</label>
                <input type="text" name="title" class="w-full border p-2 rounded" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">内容</label>
                <textarea name="content" class="w-full border p-2 rounded" rows="4" required></textarea>
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white font-bold py-2 rounded hover:bg-blue-600">
                日記を書く
            </button>
        </form>
        
        @foreach ($diaries as $diary)
        <div class="bg-white p-4 rounded-lg shadow border-l-4 border-blue-500 flex justify-between items-start">
            <div>
                <h2 class="font-bold text-xl">{{ $diary->title }}</h2>
                <p class="text-gray-600 mt-2">{{ $diary->content }}</p>
                <p class="text-xs text-gray-400 mt-2">{{ $diary->created_at->format('Y/m/d H:i') }}</p>
            </div>
        
            <form action="{{ route('diary.delete', $diary->id) }}" method="POST" onsubmit="return confirm('本当に消してもいい？');">
                @csrf
                @method('DELETE') <button type="submit" class="font-bold">
                    🗑️
                </button>
            </form>
        </div>
        @endforeach
    </div>
</body>
</html>