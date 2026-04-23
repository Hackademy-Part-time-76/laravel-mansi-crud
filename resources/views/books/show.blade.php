<x-layout>
    <h2>Dettaglio del libro</h2>
    <div class="container mt-5">
        <h2> Il libro in quetsione si chiama {{ $book->name }}</h2>
        <p>Il libro ha pagine: {{ $book->pages }}</p>
        <p>Il libro è stato scritto nel : {{ $book->year }}</p>
        <img src="{{ Storage::url($book->image) }}" class="card-img-top" alt="...">

    </div>

</x-layout>
