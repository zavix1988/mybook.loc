<div class="container">
    <h2>
        Список книг
    </h2>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin/">Главная</a></li>
            <li class="breadcrumb-item active" aria-current="page">Книги</li>
        </ol>
    </nav>
    <hr/>

    <a href="/admin/books/add" class="btn btn-primary float-right"><i class="far fa-plus-square">&nbsp;Добавить книгу</i></a>
    <table class="table table-striped">
        <thead>
        <th>Название</th>
        <th>Цена</th>
        <th>Дата публикации</th>
        <th>Язык</th>
        </thead>
        <tbody>
        <?php if (isset($books)):?>
            <?php foreach ($books as $book):?>
            <tr>
                <td><?=$book['name']?></td>
                <td><?=$book['price']?></td>
                <td><?=$book['pubyear']?></td>
                <td><?=$book['lang']?></td>
                <td><a class="btn btn-secondary float-right" href="/admin/books/edit?id=<?=$book['id']?>"><i class="fas fa-edit"></i>&nbsp;Редактировать</a></td>
                <td class="float-right">
                    <form onsubmit="if(confirm('Удалить?')){return true}else{return false}" action="/admin/books/delete?id=<?=$book['id']?>" method="post">
                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i>&nbsp;Удалить</button>
                    </form>
                </td>
            </tr>
            <?php endforeach;?>
        <?php else:?>
            <tr>
                <td colspan="6" class="text-center"><h3>Данные отсутствуют</3></td>
            </tr>
        <?php endif;?>
        </tbody>

    </table>
</div>