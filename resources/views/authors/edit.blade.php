<x-layout>
    <h2>Modifica libro</h2>
    <div class="container mt-5">
        <form action="{{ route('authors.update', ['author' => $author]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nome</label>
                <input type="text" value="{{ $author->firstname }}" class="form-control" name="firstname"
                    id="exampleFormControlInput1" placeholder="Inserisci il nome dell'autore" />
                @error('firstname')
                    <div class="alert alert-danger mt-2" role="alert">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Cognome</label>
                <input type="text" value="{{ $author->lastname }}" class="form-control" name="lastname"
                    id="exampleFormControlInput1" placeholder="Inserisci il Cognome dell'autore" />
                @error('lastname')
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
