<x-app-layout>
    <div class="max-w-4xl mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-900">{{ $question->title }}</h1>
            <div class="flex gap-4">
                @auth
                  @if(Auth::id() === $question->user_id || (Auth::user()->authority  ?? false))
                    <a href="/questions/{{ $question->id }}/edit" class="text-blue-600 hover:text-blue-800 font-medium">
                        <span class="flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                            編集
                        </span>
                    </a>
                     
                    <form action="/questions/{{ $question->id }}" id="form_{{ $question->id }}" method="post">
                           @csrf
                           @method('DELETE')
                           <button type="button" onclick="deleteQuestion({{ $question->id }})"
                               class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg text-sm transition duration-300">
                               削除
                           </button>
                    </form>
                  @endif
                @endauth
             </div>
        </div>

        <div class="mb-6">
            <h3 class="text-lg font-semibold text-gray-700 mb-2">カテゴリー</h3>
            <div class="flex flex-wrap gap-2">
                @foreach ($question->categories as $category)
                    <span class="px-3 py-1 bg-gray-100 text-gray-800 rounded-full text-sm">
                        {{ $category->name }}
                    </span>
                @endforeach
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-sm p-6 mb-8">
            <h3 class="text-lg font-semibold text-gray-700 mb-4">質問内容</h3>
            <p class="text-gray-600 whitespace-pre-wrap">{{ $question->body }}</p>
        </div>

        <div class="mb-8">
            <h3 class="text-lg font-semibold text-gray-700 mb-4">返答一覧</h3>
            <div class="space-y-4">
                @foreach ($answers as $answer)
                    <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-blue-400">
                        <p class="text-gray-600">{{ $answer->body }}</p>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="flex justify-between items-center">
         
            <a href="{{ route('questions') }}" class="text-gray-600 hover:text-gray-800 font-medium">
                <span class="flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    戻る
                </span>
            </a>
            <a href="{{ route('answers.create', ['question' => $question->id]) }}" 
               class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition-colors font-medium">
                返答する
            </a>
        </div>
       
    </div>
    <script>
    function deleteQuestion(id) {
        'use strict'
        if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
            document.getElementById(`form_${id}`).submit();
        }
    }
    </script>
</x-app-layout>