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
            <a href="{{ route('categories.create') }}" class="btn btn-primary">Crea nuova categoria</a>

        </div>
    @endauth
    <div class="d-flex flex-wrap gap-5 mt-5 container">
        <ul>
            @foreach ($categories as $category)
                <li>
                    <h5 class="card-title">{{ $category->name }}</h5>

                    <a href="{{ route('categories.show', ['category' => $category]) }}"
                        class="btn btn-primary">Dettagli</a>
                    <a href="{{ route('categories.edit', ['category' => $category]) }}"
                        class="btn btn-warning">Modifica</a>
                    <form action="{{ route('categories.destroy', ['category' => $category]) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Elimina</button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>

</x-layout>
