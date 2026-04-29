<x-layout>
    <h2>Aggiungi nuovo libro</h2>
    <div class="container mt-5">
        <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nome</label>
                <input type="text" value="{{ old('name') }}" class="form-control" name="name"
                    id="exampleFormControlInput1" placeholder="Inserisci il nome del libro" />
                @error('name')
                    <div class="alert alert-danger mt-2" role="alert">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Numero di Pagine</label>
                <input type="text" value="{{ old('pages') }}" class="form-control" name="pages"
                    id="exampleFormControlInput1" placeholder="100" />
                @error('pages')
                    <div class="alert alert-danger mt-2" role="alert">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Anno di Uscita</label>
                <input type="text" value="{{ old('year') }}" class="form-control" name="year"
                    id="exampleFormControlInput1" placeholder="2026" />
                @error('year')
                    <div class="alert alert-danger mt-2" role="alert">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Autore</label>
                <select class="form-control" name="author_id">
                    @foreach ($authors as $author)
                        <option value="{{ $author->id }}">{{ $author->firstname }} {{ $author->lastname }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                @foreach ($categories as $category)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="{{ $category->id }}" name="categories[]"
                            id="checkDefault-{{ $category->id }}">
                        <label class="form-check-label" for="checkDefault-{{ $category->id }}">
                            {{ $category->name }}
                        </label>
                    </div>
                @endforeach
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Copertina</label>
                <input class="form-control" type="file" name="image">
            </div>
            <button class="btn btn-info" type="submit">Salva</button>
            <button class="btn btn-warning" type="reset">Reset</button>
            {{-- <button class="btn btn-info" type="button">Invia</button> --}}
        </form>
    </div>

</x-layout>
