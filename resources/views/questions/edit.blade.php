<x-app-layout>
    <div class="max-w-2xl mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold text-gray-900 mb-6">編集画面</h1>
        
        <div class="bg-white rounded-lg shadow p-6">
            <form action="/questions/{{ $question->id }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')
                
                <!-- タイトル入力 -->
                <div>
                    <h2 class="text-lg font-medium text-gray-700 mb-2">タイトル</h2>
                    <input 
                        type="text" 
                        name="question[title]" 
                        value="{{ $question->title }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    >
                </div>
                
                <!-- 本文入力 -->
                <div>
                    <h2 class="text-lg font-medium text-gray-700 mb-2">本文</h2>
                    <textarea 
                        name="question[body]" 
                        rows="4"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    >{{ $question->body }}</textarea>
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