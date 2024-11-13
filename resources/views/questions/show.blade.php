<x-app-layout>
    <body>
        <div class="edit"><a href="/questions/{{ $question->id }}/edit">edit</a></div>
        <h1 class="title">
            <h2>質問タイトル</h2>
            {{ $question->title }}
        </h1>
        <div class="categories">
            <h3>カテゴリー</h3>
            @foreach ($question->categories as $category)
                <div class="category">
                    <p>{{ $category->name }}</p>    
                </div>
            @endforeach
        </div>
        <div class="content">
            <div class="content_question">
                <h3>質問内容</h3>
                <p>{{ $question->body }}</p>    
            </div>
        </div>
        <div class="Answers">
        <h3>返答一覧</h3>
            @foreach ($answers as $answer)
                <div class="answer">
                    <p>{{ $answer->body }}</p>    
                </div>
            @endforeach
        </div>
        <a href="{{ route('answers.create', ['question' => $question->id]) }}">返答する</a>
        <div class="footer">
            <a href="{{ route('questions') }}">戻る</a>
        </div>
    </body>
</x-app-layout>
