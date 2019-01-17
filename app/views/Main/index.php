<div class="container">
    <h1 class="text-center">Книги</h1>
    <hr/>
    <div class="row">
        <div class="col-md-2">
            <h4>Фильтр</h4>
            <form class="form" action="/filter" method="get">
                <div class="form-group">
                    <label for="author">Автор</label>
                    <select name="author" class="form-control" id="lang">
                        <option value="0" selected>Автор</option>
                        <?php foreach ($authors as $author):?>
                            <option value="<?=$author['id']?>"><?=$author['name']?></option>
                        <?php endforeach;?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="genre">Жанр</label>
                    <select name="genre" class="form-control" id="lang">
                        <option value="0" selected>Жанр</option>
                        <?php foreach ($genres as $genre):?>
                            <option value="<?=$genre['id']?>"><?=$genre['name']?></option>
                        <?php endforeach;?>
                    </select>
                </div>
                <button type="submit" class="btn btn-secondary">Посмотреть</button>
            </form>
        </div>
        <div class="col-md-10">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Название</th>
                    <th>Цена</th>
                    <th>Язык</th>
                    <th>Авторы</th>
                    <th>Жанры</th>
                </tr>

                </thead>
                <tbody>
                <?php foreach($newBooks as $book):?>
                <tr>
                    <td><a href="/Book/<?=$book['slug']?>"><?=$book['name']?></a></td>
                    <td><?=$book['price']?></td>
                    <td><?=$book['lang']?></td>
                    <td>
                        <?php foreach ($book['bookAuthors'] as $bookAuthor):?>
                            <?php if($bookAuthor['book_id'] == $book['id']):?>
                                <span><?=$bookAuthor['name']?>, </span>
                            <?php endif;?>
                        <?php endforeach;?>
                    </td>
                    <td>
                        <?php foreach ($book['bookGenres'] as $bookGenre):?>
                            <?php if($bookGenre['book_id'] == $book['id']):?>
                                <span><?=$bookGenre['name']?>, </span>
                            <?php endif;?>
                        <?php endforeach;?>
                    </td>
                </tr>
                <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
</div>
