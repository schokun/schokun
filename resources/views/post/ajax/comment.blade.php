@if(!$res->parent_id)
    <div class="ful-comment">@endif
        <div data-coment="{{ $res->id }}">
            <div class="user-comment d-flex mb-5 @if ($res->parent_id)  sub_comment @endif">
                <div>
                    <div class="user-photo">
                        <img class="w-100"
                             src="http://1.gravatar.com/avatar/db545eb0352e0b2cd6d15b304783dcc9?s=120&d=mm&r=g"
                             alt="">
                    </div>
                </div>
                <div>
                    <div class="user-name"> {{ $res->user->name }}</div>
                    <div class="comment-time">
                        {{ $res->instanceTime($res->created_at) }}
                    </div>
                    <div class="user-comment mt-1"><p>
                            <span class="answer_name">{{ $res->name }}</span>
                            {{ $res->text }}
                        </p>
                    </div>
                </div>
                <div class="reply">
                    <button
                        type="button"
                        data-id="{{ $res->id }}"
                        data-name="{{ $res->user->name }}"
                        parent-id="{{ $res->parent_id }}"
                        class="reply_btn"
                        onclick="reply_comment(this)"
                    >
                        Ответить
                    </button>
                </div>
                <div class="reply del">
                    <button type="button" parent="{{ $res->parent_id }}" data-id="{{ $res->id }}"
                            onclick="del_comm(this)">Удалить
                    </button>
                </div>
            </div>
        </div>
        @if(!$res->parent_id) </div>@endif

