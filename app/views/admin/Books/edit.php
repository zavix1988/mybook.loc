
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
    <form class="form" action="/admin/books/edit" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?=$book[0]['id']?>">
        <div class="form-group">
            <label for="">Название книги</label>
            <input type="text" class="form-control" name="name" placeholder="Название" value="<?=$book[0]['name']?>" required>
        </div>
        <div class="form-group">
            <label for="">Цена</label>
            <input type="text" class="form-control" name="price" placeholder="Цена" value="<?=$book[0]['price']?>" required>
        </div>
        <div class="form-group">
            <label for="">Дата публикации</label>
            <input type="text" class="form-control" name="pubyear" placeholder="Дата публикации" value="<?=$book[0]['pubyear']?>" required>
        </div>
        <div class="form-group">
            <label for="">Описание</label>
            <textarea class="form-control" rows="8" cols="80" name="description" placeholder="Описание" required><?=$book[0]['description']?></textarea>
        </div>
        <div class="form-group">
            <label for="">Язык</label>
            <select name="lang" class="form-control">
                <option value="RUS" <?php if($book[0]['lang'] == 'RUS') echo 'selected'?»RUS</option>
                <option value="UKR" <?php if($book[0]['lang'] == 'UKR') echo 'selected'?»UKR</option>
                <option value="ENG" <?php if($book[0]['lang'] == 'ENG') echo 'selected'?»ENG</option>
            </select>
        </div>
        <!--
        <div class="form-group">
            <label for="image">Выберите картинку</label>
            <input type="file" class="form-control-file" name="image" id="image">
        </div> -->
        <label for="">Автор</label>
        <select name="authors[]" class="form-control"  multiple="">
            <?php foreach($authors as $author):?>
                <option value="<?=$author['id']?>"
                    <?php foreach($bookAuthors as $bookAuthor):?>
                        <?php if($bookAuthor['author_id'] == $author['id']):?>
                            selected="selected"
                        <?php endif;?>
                    <?php endforeach;?>
                ><?=$author['name']?></option>
            <?php endforeach;?>
        </select>
        <label for="">Жанр</label>
        <select name="genres[]" class="form-control"  multiple="">
            <?php foreach($genres as $genre):?>
                <option value="<?=$genre['id']?>"
                    <?php foreach($bookGenres as $bookGenre):?>
                        <?php if($bookGenre['genre_id'] == $genre['id']):?>
                            selected="selected"
                        <?php endif;?>
                    <?php endforeach;?>
                ><?=$genre['name']?></option>
            <?php endforeach;?>
        </select>
        <button type="submit" class="btn btn-primary">Сохранить</button>

    </form>
</div>
