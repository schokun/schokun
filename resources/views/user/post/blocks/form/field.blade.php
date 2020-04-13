<div class="form-group">
    <label for="theme">Тема поста</label>
    <input type="text" class="form-control" name="title" id="theme" placeholder="Тема" value="{{ $post->title ?? '' }}">
</div>
<div class="form-group">
    <label for="theme">Выберите изображение</label>
    <input type="file" class="form-control" name="image" id="theme">
</div>
<div class="form-group">
    <label for="category">Выберите категорию</label>
    <select class="form-control" id="category" name="category_id">
        @if(isset($post->category_id))
            @foreach($categories as $category)
                <option
                    value="{{ $category->id }}"

                    @if( $category->id == $post->category_id) selected @endif
                >{{ $category->name }}</option>
            @endforeach
        @else
            @foreach($categories as $category)
                <option
                    value="{{ $category->id }}"
                >{{ $category->name }}
                </option>
            @endforeach
        @endif
    </select>
</div>
<div class="form-group">
    <label for="body_post">Содержимое поста</label>
    <textarea name="text" class="form-control" id="body_post" rows="3">{{ $post->text ?? '' }}</textarea>
</div>
