<h1>編集画面</h1>
<form action="{{ route('regist.edit', ['id' => $post->id]) }}" method="POST">
    @csrf
    <div>
        タイトル
        <input type="text" name="title" value="{{ old('title', $post->title) }}">
    </div>

    <div>
        投稿者
        <select name="author_id" id="">
            <option value="">選択してください</option>
            @foreach ($authors as $author)
            <option value="{{ $author->id }}" {{ old('author_id', $post->author_id) == $author->id ? 'selected' : '' }}>
                {{ $author->author_name }}
            </option>
            @endforeach
        </select>
    </div>
    <div>
        本文
        <textarea name="content" id="" cols="30" rows="10">{{ old('content', $post->content) }}</textarea>
    </div>
    @if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <input type="submit" value="更新">
</form>