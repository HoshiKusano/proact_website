<x-app-layout>
    <div class="max-w-4xl mx-auto px-4 py-8">
        <!-- 編集ボタン -->
        <div class="mb-6 flex justify-end">
            <a href="/posts/{{ $post->id }}/edit" class="inline-flex items-center px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-800 rounded-lg transition duration-200">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                </svg>
                編集する
            </a>
        </div>

        <!-- タイトル -->
        <h1 class="text-3xl font-bold text-gray-900 mb-8">
            {{ $post->title }}
        </h1>

        <!-- メインコンテンツ -->
        <div class="bg-white rounded-lg shadow-sm p-6 mb-8">
            <h3 class="text-xl font-semibold text-gray-700 mb-4">本文</h3>
            <p class="text-gray-600 leading-relaxed whitespace-pre-wrap">
                {{ $post->body }}
            </p>
        </div>

        <!-- 画像表示 -->
        @if($post->image_url)
            <div class="mb-8">
                <img 
                    src="{{ $post->image_url }}" 
                    alt="投稿画像" 
                    class="rounded-lg shadow-sm max-w-full h-auto mx-auto"
                >
            </div>
        @endif

        <!-- フッター -->
        <div class="mt-8">
            <a 
                href="{{ route('posts') }}" 
                class="inline-flex items-center text-gray-600 hover:text-gray-900 transition duration-200"
            >
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                一覧に戻る
            </a>
        </div>
    </div>
</x-app-layout>
