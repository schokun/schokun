<div class="category-link">
    <div class="container">
        @foreach($categories as $category)
            <a  class="btn category_btn" href="{{ route('category.home.index' , $category->name) }}"> {{ $category->name }}</a>
        @endforeach
    </div>
</div>
