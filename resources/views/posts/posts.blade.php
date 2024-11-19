<x-app-layout>
   <div class="py-12">
       <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           <!-- ヘッダー部分 -->
           <h1 class="text-3xl font-bold text-gray-900">Proact日記</h1>
           @auth
              @if(Auth::user()->authority)
                   <div class="flex justify-between items-center mb-6">
                       
                       <a href='/posts/create' style="
                           display: inline-block;
                           background-color: #166534;
                           color: white;
                           font-weight: bold;
                           padding: 12px 24px;
                           border-radius: 8px;
                           box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                           transition: all 0.3s ease;
                           text-decoration: none;
                           "
                           onmouseover="this.style.backgroundColor='#14532d'"
                           onmouseout="this.style.backgroundColor='#166534'"
                       >
                           <span style="display: flex; align-items: center;">
                               <svg xmlns="http://www.w3.org/2000/svg" style="width: 20px; height: 20px; margin-right: 8px;" viewBox="0 0 20 20" fill="currentColor">
                                   <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                               </svg>
                               新規作成
                           </span>
                       </a>
                   </div>
              @endif
           @endauth
           <!-- 投稿一覧 -->
           <div class="space-y-6">
               @foreach ($posts as $post)
                   <div class="bg-white rounded-lg shadow p-6">
                       <div class="flex justify-between items-start">
                           <div>
                               <h2 class="text-xl font-semibold text-gray-900 hover:text-blue-600">
                                   <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                               </h2>
                               <!-- 日時を追加 -->
                               <div class="flex items-center space-x-4 mt-2 text-sm text-gray-500">
                                   <div class="flex items-center">
                                       <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                       </svg>
                                       <span>作成: {{ $post->created_at->format('Y年m月d日 H:i') }}</span>
                                   </div>
                                   @if($post->updated_at != $post->created_at)
                                   <div class="flex items-center">
                                       <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                       </svg>
                                       <span>更新: {{ $post->updated_at->format('Y年m月d日 H:i') }}</span>
                                   </div>
                                   @endif
                               </div>
                           </div>
                           @auth
                              @if(Auth::user()->authority)
                               <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                                   @csrf
                                   @method('DELETE')
                                   <button type="button" onclick="deletePost({{ $post->id }})"
                                       class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg text-sm transition duration-300">
                                       削除
                                   </button>
                               </form>
                              @endif
                            @endauth
                       </div>
                       <p class="mt-3 text-gray-600">{{ $post->body }}</p>
                   </div>
               @endforeach
           </div>
           <!-- ページネーション -->
           <div class="mt-6">
               {{ $posts->links() }}
           </div>
       </div>
   </div>
   <script>
       function deletePost(id) {
           'use strict'
           if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
               document.getElementById(`form_${id}`).submit();
           }
       }
   </script>
</x-app-layout>