<x-app-layout>
   <div class="py-12">
       <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           <!-- ヘッダー部分 -->
           <div class="flex justify-between items-center mb-6">
               <h1 class="text-3xl font-bold text-gray-900">Proact日記</h1>
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

           <!-- 投稿一覧 -->
           <div class="space-y-6">
               @foreach ($posts as $post)
                   <div class="bg-white rounded-lg shadow p-6">
                       <div class="flex justify-between items-start">
                           <h2 class="text-xl font-semibold text-gray-900 hover:text-blue-600">
                               <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                           </h2>
                           <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                               @csrf
                               @method('DELETE')
                               <button type="button" onclick="deletePost({{ $post->id }})"
                                   class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg text-sm transition duration-300">
                                   削除
                               </button>
                           </form>
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
