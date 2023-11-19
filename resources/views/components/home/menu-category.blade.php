<div>
    <section class="text-left">
        <h4 class="ms-3">Categorías</h4>
    </section>

    <section>
        <ul class="list-group list-group-flush" style="cursor: pointer;">

            <li class="list-group-item">
                <a class="btn btn-outline-primary rounded-pill w-100" href="{{route('books-page')}}">Todos</a>
            </li>

            @foreach ($categorys as $category)
            <li class="list-group-item">
                <a  class="btn btn-outline-dark w-100" href="{{ route('filter-serach-category', ['filter' => $category->name]) }}">
                    {{ $category->name }}
                </a>
            </li>
            @endforeach

        </ul>
    </section>
</div>
