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

    <hr/>
    <form class="form" action="/admin/genres/edit" method="POST">
        <div class="form-group">
            <label for="">Название Жанра</label>
            <input type="hidden" name="id" value="<?=$genre[0]['id']?>">
            <input type="text" class="form-control" name="name" placeholder="Жанр" value="<?=$genre[0]['name']?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Сохранить</button>

    </form>
</div>
