<x-app-layout>
    <form action = "/questions" method = "GET">
        @csrf
        <input type = "text" name = "search_text" value = ""/>
        <button type="submit">送信</button>
    </form>
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