<div class="container">
    <h1 class="text-center">Книги</h1>
    <hr/>
    <div class="row">
        <div class="col-md-2">

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
                <tfoot>
                <tr>
                    <td colspan="5">
                        <ul class="pagination ">

                        </ul>
                    </td>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
