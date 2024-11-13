<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- 質問するボタン -->
            <div class="mb-4">
                <a href="/questions/create" style="
                    display: inline-block;
                    background-color: #1e40af; /* 濃い青色 */
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
                        軌跡を記す
                    </span>
                </a>
            </div>

            <div class="questions">
                <h1 class="text-2xl font-bold mb-6">多文化社会学部のみんな</h1>
                    
                <div class="space-y-4">
                    @foreach ($question as $question)
                        <div class="bg-white p-6 rounded-lg shadow hover:shadow-md transition">
                            <a href="/questions/{{ $question->id }}" class="block">
                                <h2 class="text-lg font-semibold text-gray-900 hover:text-blue-500">
                                    {{ $question->title }}
                                </h2>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="mt-6">
                {{ $questions->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
