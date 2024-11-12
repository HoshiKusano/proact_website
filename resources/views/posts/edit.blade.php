<x-app-layout>
    <h1 class="title">編集画面</h1>
    <div class="content">
        <form action="/posts/{{ $post->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class='content__title'>
                <h2>タイトル</h2>
                <input type='text' name='post[title]' value="{{ $post->title }}">
            </div>
            <div class='content__body'>
                <h2>本文</h2>
                <input type='text' name='post[body]' value="{{ $post->body }}">
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
            <div class="image">
                <input type="file" name='image'>
            </div>
            <input type="submit" value="保存">
        </form>
    </div>
</x-app-layout>