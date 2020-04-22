@foreach($child as $c)
    <div class="user-comment mb-5 sub_comment" data-coment="{{ $c->id }}">
        <div class="sub_comment-wrap">
            <div class="d-flex">
                <div>
                    <div class="user-photo">
                        <img class="w-100"   src="/storage/{{$comment->user->image->path}}" alt="">
                    </div>
                </div>
                <div>
                    <div class="user-name"> {{ $c->user->name }}</div>
                    <div class="comment-time">
                        {{ $c->Time }}
                    </div>
                    <div class="user-comment mt-1">
                        <p>
                            <span class="answer_name">{{$c->name}}</span>
                            {{$c->text}}
                        </p>
                    </div>
                </div>
                @if (Auth::check())
                    <div class="reply">
                        <button
                            type="submit"
                            data-id="{{ $c->id }}"
                            parent-id="{{ $c->parent_id }}"
                            data-name="{{$c->user->name}}"
                            class="reply_btn"
                            onclick="reply_comment(this)"
                        >
                            Ответить
                        </button>
                    </div>
                @endif
                @if ($post->is_post_author($post->id) || $post->is_comment_author($c->id))
                    <div class="reply del">
                        <button parent="{{$c->parent_id}}" type="button" data-id="{{ $c->id }}" class="del_comment"
                                onclick="del_comm(this)">Удалить
                        </button>
                    </div>
                @endif
            </div>
        </div>
    </div>

    @if (count($c->children) > 0)
        @include('post.blocks.children-comments' , ['child' => $c->children->where('post_id' , $post->id)])
    @endif
@endforeach
