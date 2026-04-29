<x-layout>
    <h2>Modifica Categoria</h2>
    <div class="container mt-5">
        <form action="{{ route('categories.update', ['category' => $category]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nome</label>
                <input type="text" value="{{ $category->name }}" class="form-control" name="name"
                    id="exampleFormControlInput1" placeholder="Inserisci il nome dell'autore" />
                @error('name')
                    <div class="alert alert-danger mt-2" role="alert">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button class="btn btn-info" type="submit">Aggiorna</button>
            <button class="btn btn-warning" type="reset">Reset</button>
            {{-- <button class="btn btn-info" type="button">Invia</button> --}}
        </form>
    </div>

</x-layout>
