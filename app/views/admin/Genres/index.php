<div class="container">

    <h1>
        Список жанров
    </h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin/">Главная</a></li>
            <li class="breadcrumb-item active" aria-current="page">Жанры</li>
        </ol>
    </nav>

    <a href="/admin/genres/add"class="btn btn-primary float-right"><i class="far fa-plus-square">&nbsp;Добавить</i></a>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Название</th>
            <th colspan="3"><div class="float-right">Действие</div></th>

        </tr>
        </thead>
        <tbody>
        <?php if(isset($genres)):?>
            <?php foreach ($genres as $genre):?>
            <tr>
                <td><?=$genre['name']?></td>
                <td><a class="btn btn-secondary float-right" href="/admin/genres/edit?id=<?=$genre['id']?>"><i class="fas fa-edit"></i>&nbsp;Редактировать</a></td>
                <td class="float-right">
                    <form onsubmit="if(confirm('Удалить?')){return true}else{return false}" action="/admin/genres/delete?id=<?=$genre['id']?>" method="post">

                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i>&nbsp;Удалить</button>
                    </form>
                </td>
            </tr>
            <?php endforeach;?>
        <?php else:?>
        <tr>
            <td colspan="6" class="text-center"><h3>Данные отсутствуют</h3></td>
        </tr>
        <?php endif;?>
        </tbody>
    </table>
</div>
