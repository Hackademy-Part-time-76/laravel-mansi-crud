<x-layout>
    <h2>Modifica libro</h2>
    <div class="container mt-5">
        <form action="{{ route('books.update', ['book' => $book]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nome</label>
                <input type="text" value="{{ $book->name }}" class="form-control" name="name"
                    id="exampleFormControlInput1" placeholder="Inserisci il nome del libro" />
                @error('name')
                    <div class="alert alert-danger mt-2" role="alert">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Numero di Pagine</label>
                <input type="text" value="{{ $book->pages }}" class="form-control" name="pages"
                    id="exampleFormControlInput1" placeholder="100" />
                @error('pages')
                    <div class="alert alert-danger mt-2" role="alert">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Anno di Uscita</label>
                <input type="text" value="{{ $book->year }}" class="form-control" name="year"
                    id="exampleFormControlInput1" placeholder="2026" />
                @error('year')
                    <div class="alert alert-danger mt-2" role="alert">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <img style="width:5rem" src="{{ Storage::url($book->image) }}" class="card-img-top" alt="...">

                <label for="formFile" class="form-label">Copertina Attuale</label>
                <input value="{{ $book->image }}" class="form-control" type="file" name="image">
            </div>
            <button class="btn btn-info" type="submit">Aggiorna</button>
            <button class="btn btn-warning" type="reset">Reset</button>
            {{-- <button class="btn btn-info" type="button">Invia</button> --}}
        </form>
    </div>

</x-layout>
