<div class="books-container">
    @if ($documents->count() > 0)
        <div class="grid-books">
            @foreach ($documents as $document)
            <x-home.book :document="$document"></x-home.book>
            @endforeach
        </div>
    @else
        <x-home.empty-state-books></x-home.empty-state-books>
    @endif

</div>
