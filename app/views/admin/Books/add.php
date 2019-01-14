
<div class="container">
    <h1>
        Список книг
    </h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin/">Главная</a></li>
            <li class="breadcrumb-item active" aria-current="page">Книги</li>
        </ol>
    </nav>

    <hr/>
    <form class="form" action="/admin/books/add" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="">Название книги</label>
            <input type="text" class="form-control" name="name" placeholder="Название" value="" required>
        </div>
        <div class="form-group">
            <label for="">Цена</label>
            <input type="text" class="form-control" name="price" placeholder="Цена" value="" required>
        </div>
        <div class="form-group">
            <label for="">Дата публикации</label>
            <input type="text" class="form-control" name="pubyear" placeholder="Дата публикации" value="" required>
        </div>
        <div class="form-group">
            <label for="">Описание</label>
            <textarea class="form-control" rows="8" cols="80" name="description" placeholder="Описание" required></textarea>
        </div>
        <div class="form-group">
            <label for="">Язык</label>
            <select name="lang" class="form-control">
                <option value="RUS">RUS</option>
                <option value="UKR">UKR</option>
                <option value="ENG">ENG</option>
            </select>
        </div>
        <!--
        <div class="form-group">
            <label for="image">Выберите картинку</label>
            <input type="file" class="form-control-file" name="image" id="image">
        </div> -->
        <label for="">Автор</label>
        <select name="authors[]" class="form-control"  multiple="">
            <option value="{{$author->id}}"
                    @if (isset($book->authors))
                @foreach($book->authors as $bookauthor)
                @if ($author->id == $bookauthor->id)
                selected="selected"
                @endif
                @endforeach
                @endif
                >{{$author->name}}</option>
            @endforeach

        </select>
        <label for="">Жанр</label>
        <select name="genres[]" class="form-control"  multiple="">
            @foreach ($genres as $genre)
            <option value="{{$genre->id}}"
                    @if (isset($book->genres))
                @foreach($book->genres as $bookgenre)
                @if ($genre->id == $bookgenre->id)
                selected="selected"
                @endif
                @endforeach
                @endif
                >{{$genre->name}}</option>
            @endforeach

        </select>
        <button type="submit" class="btn btn-primary">Сохранить</button>

    </form>
</div>
