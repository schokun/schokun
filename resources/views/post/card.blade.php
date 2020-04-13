<div class="project-box" data-id='{{ $post->id}}'>
    <a href="{{route('post.show' , $post->slug)}}" class="project-link"></a>
    <div class="project-img"><img
            src="/storage/{{ $post->image->path }}"
            alt=""></div>
    <div class="project-footer">
        <div class="project-title">
            {{ $post->title }}
        </div>
        <div class="d-flex align-items-center">
            <div class="user-photo d-flex">
                <img
                    src="/storage/{{$post->user->image->path}}"
                    alt="">
            </div>
            <div class="user-name">
                {{ $post->user->name }}
            </div>
            <div class="post-date">
                <i class="far fa-calendar-alt"></i> {{ $post->instanceTime($post->created_at) }}
            </div>
            @if($post->isLike($post->id) == 'like')
                <div class="like-action like">
                    <span>{{ $post->likes->count() }}</span>
                    <div class="heart click-heart"></div>
                </div>
            @else
                <div class="like-action dislike">
                    <span>{{ $post->likes->count() }}</span>
                    <div class="heart click-heart animated-heart"></div>
                </div>
            @endif
            <div class="comments">
                {{ $post->comments_count()}} <i class="fas fa-comments"></i>
            </div>
            <div class="total_views">
                {{ $post->total_views }}  <i class="far fa-eye"></i>
            </div>
        </div>
    </div>
</div>
