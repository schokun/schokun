<div class="ful-comment">
    <div data-coment="{{ $comment->id }}">
        <div class="user-comment d-flex mb-5">
            <div>
                <div class="user-photo">
                    <img class="w-100"
                         src="/storage/{{$comment->user->image->path}}"
                         alt="">
                </div>
            </div>
            <div>
                <div class="user-name"> {{ $comment->user->name }}</div>
                <div class="comment-time">
                    {{ $comment->Time }}
                </div>
                <div class="user-comment mt-1"><p>{{ $comment->text }}</p></div>
            </div>
            @if(Auth::check())
                <div class="reply">
                    <button
                        type="button"
                        data-id="{{ $comment->id }}"
                        data-name="{{ $comment->user->name }}"
                        parent-id="{{ $comment->parent_id }}"
                        class="reply_btn"
                        onclick="reply_comment(this)"
                    >
                        Ответить
                    </button>
                </div>
            @endif
            @if ($post->is_post_author($post->id) || $post->is_comment_author($comment->id))
                <div class="reply del">
                    <button
                        type="button"
                        data-id="{{ $comment->id }}"
                        class="del_comment"
                        onclick="del_comm(this)"
                    >
                        Удалить
                    </button>
                </div>
            @endif
        </div>
    </div>
    @include('post.blocks.children-comments' , ['child' => $comment->children])
</div>
