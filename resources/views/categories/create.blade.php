<x-layout>
    <h2>Aggiungi nuova categoria</h2>
    <div class="container mt-5">
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nome</label>
                <input type="text" value="{{ old('name') }}" class="form-control" name="name"
                    id="exampleFormControlInput1" placeholder="Inserisci il nome della categoria" />
                @error('name')
                    <div class="alert alert-danger mt-2" role="alert">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button class="btn btn-info" type="submit">Salva</button>
            <button class="btn btn-warning" type="reset">Reset</button>
            {{-- <button class="btn btn-info" type="button">Invia</button> --}}
        </form>
    </div>

</x-layout>
