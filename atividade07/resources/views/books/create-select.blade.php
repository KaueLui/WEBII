@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Adicionar Livro (Com Select)</h1>

    <form action="{{ route('books.store.select') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Título</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required>
            @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="publisher_id" class="form-label">Editora</label>
            <select class="form-select @error('publisher_id') is-invalid @enderror" id="publisher_id" name="publisher_id" required>
                <option value="" selected>Selecione uma editora</option>
                @foreach($publishers as $publisher)
                    <option value="{{ $publisher->id }}">{{ $publisher->name }}</option>
                @endforeach
            </select>
            @error('publisher_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="author_id" class="form-label">Autor</label>
            <select class="form-select @error('author_id') is-invalid @enderror" id="author_id" name="author_id" required>
                <option value="" selected>Selecione um autor</option>
                @foreach($authors as $author)
                    <option value="{{ $author->id }}">{{ $author->name }}</option>
                @endforeach
            </select>
            @error('author_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Categoria</label>
            <select class="form-select @error('category_id') is-invalid @enderror" id="category_id" name="category_id" required>
                <option value="" selected>Selecione uma categoria</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="cover_image" class="form-label">Imagem da Capa</label>
            <input type="file" class="form-control @error('cover_image') is-invalid @enderror" id="cover_image" name="cover_image" accept="image/*" onchange="previewImage(event)">
            @error('cover_image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Área de pré-visualização da imagem -->
        <div class="mb-3">
            <label class="form-label">Pré-visualização:</label>
            <div>
                <img id="imagePreview" src="#" alt="Pré-visualização da imagem" style="max-width: 100%; max-height: 300px; display: none;" class="img-fluid">
            </div>
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
</div>

<script>
    function previewImage(event) {
        const imagePreview = document.getElementById('imagePreview');
        const file = event.target.files[0];

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                imagePreview.src = e.target.result;
                imagePreview.style.display = 'block';
            };
            reader.readAsDataURL(file);
        } else {
            imagePreview.src = '#';
            imagePreview.style.display = 'none';
        }
    }
</script>
@endsection