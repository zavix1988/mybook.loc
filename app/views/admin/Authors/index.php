
<div class="container">
    <h2>
        Список авторов
    </h2>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin/">Главная</a></li>
            <li class="breadcrumb-item active" aria-current="page">Авторы</li>
        </ol>
    </nav>

    <a href="/admin/authors/add" class="btn btn-primary float-right"><i class="far fa-plus-square">&nbsp;Добавить</i></a>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Название</th>
        </tr>
        </thead>
        <tbody>
        <?php if (isset($authors)):?>
            <?php foreach ($authors as $author):?>
                <tr>
                    <td><?=$author['name']?></td>
                    <td><a class="btn btn-secondary float-right" href="/admin/authors/edit?id=<?=$author['id']?>"><i class="fas fa-edit"></i>&nbsp;Редактировать</a></td>
                    <td class="float-right">
                        <form onsubmit="if(confirm('Удалить?')){return true}else{return false}" action="/admin/authors/delete?id=<?=$author['id']?>" method="post">
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
</div>
