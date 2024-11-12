<x-app-layout>
    <body>
        <h1>質問作成</h1>
        <form action="/questions" method="POST" >
            @csrf
            <div class="title">
                <h2>タイトル</h2>
                <input type="text" name="question[title]" placeholder="質問のタイトル" value="{{ old('post.title') }}"/>
                <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>
            </div>
            <div class="body">
                <h2>本文</h2>
                <textarea name="question[body]" placeholder="質問の内容">{{ old('post.body') }}</textarea>
                <p class="title__error" style="color:red">{{ $errors->first('post.body') }}</p>
            </div>
            <select multiple name = 'categories[]'>
                @foreach($categories as $category)
                <option value = {{$category->id}}>{{$category->name}}</option>
                @endforeach
            </select>
            <input type="submit" value="store"/>
        </form>
        
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</x-app-layout>