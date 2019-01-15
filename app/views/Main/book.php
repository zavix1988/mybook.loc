
<div class="container">

    <hr/>
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
        <tr>
            <td><?=$book[0]['name']?></td>
            <td><?=$book[0]['price']?></td>
            <td><?=$book[0]['lang']?></td>
            <td>
                <?php foreach($bookGenres as $bookGenre):?>
                    <?=$bookGenre['name']?>,&nbsp
                <?php endforeach;?>
            </td>
            <td>
                <?php foreach($bookAuthors as $bookAuthor):?>
                    <?=$bookAuthor['name']?>,&nbsp
                <?php endforeach;?>
            </td>
        </tr>
        <tr>
            <td colspan="6"><?=$book[0]['description']?></td>
        </tr>
        </tbody>
    </table>
</div>
