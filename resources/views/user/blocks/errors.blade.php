@if ($errors->any())
    <div class="container-fluid">
        <div>
            <ul class="list-inline">
                @foreach ($errors->all() as $error)
                    <li class="alert alert-danger mb-2">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
