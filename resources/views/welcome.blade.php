<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>シンプル日記帳</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-4 md:p-8">
    <div class="max-w-6xl mx-auto">
        <h1 class="text-3xl font-bold mb-8 text-center text-blue-600">My Diary</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-start">

            <section>
                <form action="{{ route('diary.store') }}" method="POST"
                    class="bg-white p-6 rounded-lg shadow-md sticky top-8">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">タイトル</label>
                        <input type="text" name="title" class="w-full border p-2 rounded" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">内容</label>
                        <textarea name="content" class="w-full border p-2 rounded" rows="4" required></textarea>
                    </div>
                    <button type="submit"
                        class="w-full bg-blue-500 text-white font-bold py-2 rounded hover:bg-blue-600">
                        日記を書く
                    </button>
                </form>
            </section>

            <section class="space-y-4 min-h-[400px] p-4 rounded-lg border-2 border-dashed border-gray-300">
                @forelse ($diaries as $diary)
                <div
                    class="bg-white p-4 rounded-lg shadow border-l-4 border-blue-500 flex justify-between items-start transition hover:shadow-md">
                    <div>
                        <h2 class="font-bold text-xl text-gray-800">{{ $diary->title }}</h2>
                        <p class="text-gray-600 mt-2 whitespace-pre-wrap">{{ $diary->content }}</p>
                        <p class="text-xs text-gray-400 mt-2">{{ $diary->created_at->format('Y/m/d H:i') }}</p>
                    </div>
            
                    <form action="{{ route('diary.delete', $diary->id) }}" method="POST" onsubmit="return confirm('本当に消してもいい？');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-xl hover:scale-110 transition-transform">🗑️</button>
                    </form>
                </div>
                @empty
                <div class="flex flex-col items-center justify-center h-full py-20 text-gray-400">
                    <span class="text-6xl mb-4">📖</span>
                    <p class="text-lg font-bold">日記はまだありません</p>
                    <p class="text-sm">最初の日記を書いてみませんか？</p>
                </div>
                @endforelse
            </section>

        </div>
    </div>
</body>
</html>