<x-app-layout>
    <div class="max-w-2xl mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold text-gray-900 mb-6">編集画面</h1>
        
        <div class="bg-white rounded-lg shadow p-6">
            <form action="/posts/{{ $post->id }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')
                
                <!-- タイトル入力 -->
                <div>
                    <h2 class="text-lg font-medium text-gray-700 mb-2">タイトル</h2>
                    <input 
                        type="text" 
                        name="post[title]" 
                        value="{{ $post->title }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    >
                </div>
                
                <!-- 本文入力 -->
                <div>
                    <h2 class="text-lg font-medium text-gray-700 mb-2">本文</h2>
                    <textarea 
                        name="post[body]" 
                        rows="4"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    >{{ $post->body }}</textarea>
                </div>
                
                <!-- 現在の画像表示 -->
                @if($post->image_url)
                    <div class="mt-4">
                        <h2 class="text-lg font-medium text-gray-700 mb-2">現在の画像</h2>
                        <img 
                            src="{{ $post->image_url }}" 
                            alt="投稿画像" 
                            class="max-w-full h-auto rounded-lg shadow-sm"
                        >
                    </div>
                @endif
                
                <!-- 画像アップロード -->
                <div class="mt-4">
                    <h2 class="text-lg font-medium text-gray-700 mb-2">画像を変更</h2>
                    <input 
                        type="file" 
                        name="image"
                        class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-medium file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"
                    >
                </div>
                
                <!-- 送信ボタン -->
                <div class="flex justify-end pt-6">
                    <input 
                        type="submit" 
                        value="保存"
                        class="px-6 py-2 bg-blue-600 text-green rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 cursor-pointer transition-colors duration-200"
                    >
                </div>
            </form>
        </div>
    </div>
</x-app-layout>