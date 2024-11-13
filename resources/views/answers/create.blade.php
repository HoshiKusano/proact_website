<x-app-layout>
    <div style="margin-top: 0; padding-top: 0;">
        <form action="/questions/{{ $question->id }}/answer" method="POST" >
            @csrf
            </div>
            <div class="body">
                <h1>返信作成</h1>
                <textarea name="answer[body]" placeholder="返信の内容">{{ old('Answer.body') }}</textarea>
                <p class="title__error" style="color:red">{{ $errors->first('Answer.body') }}</p>
            </div>
            <input type="submit" value="store"/>
        </form>
        
        <div class="footer">
            <a href="questions/{{ $question->id }}">戻る</a>
        </div>
    </div>
</x-app-layout>