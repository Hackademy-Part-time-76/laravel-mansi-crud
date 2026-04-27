<x-layout>
    <section class="mt-5">
        <h2 class="text-center ">Gestionale BookLab</h2>
    </section>

    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    @auth
        <div class="container">
            <a href="{{ route('books.create') }}" class="btn btn-primary">Crea nuovo Libro</a>
            <a href="{{ route('authors.index') }}" class="btn btn-success">Lista Autori</a>

        </div>
    @endauth
    <div class="d-flex flex-wrap gap-5 mt-5 container">

        @foreach ($books as $book)
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

    </div>

</x-layout>
