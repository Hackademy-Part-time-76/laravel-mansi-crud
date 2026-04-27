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
            <a href="{{ route('authors.create') }}" class="btn btn-primary">Crea nuovo Autore</a>

        </div>
    @endauth
    <div class="d-flex flex-wrap gap-5 mt-5 container">
        <ul>
            @foreach ($authors as $author)
                <li>
                    <h5 class="card-title">{{ $author->firstname }} {{ $author->lastname }}</h5>

                    <a href="{{ route('authors.show', ['author' => $author]) }}" class="btn btn-primary">Dettagli</a>
                    <a href="{{ route('authors.edit', ['author' => $author]) }}" class="btn btn-warning">Modifica</a>
                    <form action="{{ route('authors.destroy', ['author' => $author]) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Elimina</button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>

</x-layout>
