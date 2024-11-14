<x-app-layout>
    <div class="min-h-screen bg-gray-50 py-12">
        <div class="max-w-3xl mx-auto bg-white rounded-lg shadow-md p-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-8">質問作成</h1>
            
            <form action="/questions" method="POST" class="space-y-6">
                @csrf
                
                <!-- タイトル入力部分 -->
                <div class="space-y-2">
                    <h2 class="text-xl font-semibold text-gray-700">タイトル</h2>
                    <input 
                        type="text" 
                        name="question[title]" 
                        placeholder="質問のタイトル" 
                        value="{{ old('post.title') }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 placeholder-gray-400"
                    />
                    @error('post.title')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- 本文入力部分 -->
                <div class="space-y-2">
                    <h2 class="text-xl font-semibold text-gray-700">本文</h2>
                    <textarea 
                        name="question[body]" 
                        placeholder="質問の内容"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 placeholder-gray-400 min-h-[200px]"
                    >{{ old('post.body') }}</textarea>
                    @error('post.body')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- カテゴリー選択部分 -->
                <div class="space-y-2">
                    <h3 class="text-xl font-semibold text-gray-700">カテゴリー</h3>
                    <select 
                        multiple 
                        name="categories[]"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 min-h-[120px]"
                    >
                        @foreach($categories as $category)
                            <option value="{{$category->id}}" class="py-1">
                                {{$category->name}}
                            </option>
                        @endforeach
                    </select>
                    <p class="text-sm text-gray-500">※ 複数選択する場合は Ctrl キー（Mac の場合は Command キー）を押しながら選択してください</p>
                </div>
                
                <!-- 送信ボタンと戻るリンク -->
                <div class="flex items-center justify-between pt-4">
                    <a 
                        href="/questions" 
                        class="text-gray-600 hover:text-gray-900 font-medium flex items-center"
                    >
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        戻る
                    </a>
                    <button 
                        type="submit"
                        class="bg-white border border-gray-500 px-6 py-2 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-colors duration-200"
                    >
                        質問を投稿
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>