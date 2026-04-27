<x-layout>
    <h2>Dettaglio dell'autore</h2>
    <div class="container mt-5">
        <h2> L'autore si chiama {{ $author->firstname }} {{ $author->lastname }}</h2>
        <h4>Lista Libri scritti</h4>
        <ul>
            @foreach ($author->books as $book)
                <div class="card" style="width: 18rem;">
                    <img src="{{ Storage::url($book->image) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $book->name }}</h5>

                        <a href="{{ route('books.show', ['book' => $book]) }}" class="btn btn-primary">Dettagli</a>
                        <a href="{{ route('books.edit', ['book' => $book]) }}" class="btn btn-warning">Modifica</a>
                        <form action="{{ route('books.destroy', ['book' => $book]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Elimina</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </ul>
    </div>

</x-layout>
