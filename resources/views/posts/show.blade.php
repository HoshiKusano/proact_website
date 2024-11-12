<x-app-layout>
    <body>
        <div class="edit"><a href="/posts/{{ $post->id }}/edit">edit</a></div>
        <h1 class="title">
            {{ $post->title }}
        </h1>
        <div class="content">
            <div class="content__post">
                <h3>本文</h3>
                <p>{{ $post->body }}</p>    
            </div>
        </div>
        @if($post->image_url)
        <!--if[post->image_url]と書くことで$post->image_urlが存在するときに限りifからendifで囲まれた領域を表示することができます。-->
        <div>
                <img src="{{ $post->image_url }}" alt="画像が読み込めません。">
                <!-- imgタグはsrc属性に画像のURLを指定することで、その画像を画面に表示することができます。
                  また、alt属性には画像が表示されなかった時に代わりに表示させたい文字を指定することができます
                -->
         </div>
        @endif
        <div class="footer">
            <a href="{{ route('posts') }}">戻る</a>
        </div>
    </body>
</x-app-layout>
