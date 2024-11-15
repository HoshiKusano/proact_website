<x-app-layout>
   <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-6">
        <form action="/questions" method="GET" class="mb-8">
            @csrf
            <div class="flex gap-2">
                <input 
                    type="text" 
                    name="search_text" 
                    placeholder="質問を検索"
                    class="flex-1 rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                />
                <button 
                    type="submit"
                    class="inline-flex items-center px-4 py-2 bg-gray-800 rounded-lg font-semibold text-sm text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-colors duration-200"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    検索
                </button>
            </div>
        </form>

        <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 mb-8">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm text-yellow-700">
                        情報が古い場合もありますので、正当な回答を得たい場合は学務に問い合わせましょう。
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- 質問するボタン -->
            <div class="mb-4">
                <a href="/questions/create" style="
                    display: inline-block;
                    background-color: #1e40af;
                    color: white;
                    font-weight: bold;
                    padding: 12px 24px;
                    border-radius: 8px;
                    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                    transition: all 0.3s ease;
                " onmouseover="this.style.backgroundColor='#1e3a8a'" 
                   onmouseout="this.style.backgroundColor='#1e40af'">
                    <span style="display: flex; align-items: center;">
                        <svg xmlns="http://www.w3.org/2000/svg" style="width: 20px; height: 20px; margin-right: 8px;" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                        </svg>
                        質問する
                    </span>
                </a>
            </div>

            <!-- 未回答の質問 -->
            <div class="mb-12">
                <h1 class="text-2xl font-bold mb-6">
                    未回答の質問
                    <span class="text-sm font-normal text-gray-500 ml-2">
                        回答を募集中の質問です
                    </span>
                </h1>
                <div class="space-y-4">
                    @foreach ($questions as $question)
                        @unless($question->has_reply)
                            <div class="bg-white p-6 rounded-lg shadow hover:shadow-md transition border-l-4 border-yellow-400">
                                <a href="/questions/{{ $question->id }}" class="block">
                                    <h2 class="text-lg font-semibold text-gray-900 hover:text-blue-500">
                                        {{ $question->title }}
                                    </h2>
                                    <div class="mt-2 text-sm text-gray-500">
                                        <time>{{ $question->created_at->format('Y/m/d H:i') }}</time>
                                    </div>
                                </a>
                            </div>
                        @endunless
                    @endforeach
                </div>
            </div>

            <!-- 回答済みの質問 -->
            <div>
                <h1 class="text-2xl font-bold mb-6">
                    回答済みの質問
                    <span class="text-sm font-normal text-gray-500 ml-2">
                        回答が付いた質問です
                    </span>
                </h1>
                <div class="space-y-4">
                    @foreach ($questions as $question)
                        @if($question->has_reply)
                            <div class="bg-white p-6 rounded-lg shadow hover:shadow-md transition border-l-4 border-green-400">
                                <a href="/questions/{{ $question->id }}" class="block">
                                    <h2 class="text-lg font-semibold text-gray-900 hover:text-blue-500">
                                        {{ $question->title }}
                                    </h2>
                                    <div class="mt-2 flex items-center text-sm text-gray-500">
                                        <time class="mr-4">{{ $question->created_at->format('Y/m/d H:i') }}</time>
                                        <span class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                                            </svg>
                                            {{ $question->answer_count ?? 0 }} 件の回答
                                        </span>
                                    </div>
                                </a>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>

            <div class="mt-6">
                {{ $questions->links() }}
            </div>
        </div>
    </div>
</x-app-layout>