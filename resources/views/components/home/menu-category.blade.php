<div>
    <section class="text-left">
        <h4 class="ms-3">Categorías</h4>
    </section>

    <section>
        <ul class="list-group list-group-flush" style="cursor: pointer;">

            @foreach ($categorys as $category)
            <li class="list-group-item">{{ $category->name }}</li>
            @endforeach

        </ul>
    </section>
</div>
