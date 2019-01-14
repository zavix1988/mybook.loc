<div class="container">

    <h1>
        Список жанров
    </h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin/">Главная</a></li>
            <li class="breadcrumb-item active" aria-current="page">Авторы</li>
        </ol>
    </nav>

    <hr/>
    <form class="form" action="/admin/authors/add" method="POST">
        <div class="form-group">
            <label for="">Имя автора</label>
            <input type="text" class="form-control" name="name" placeholder="Автор" value="" required>
        </div>
        <button type="submit" class="btn btn-primary">Сохранить</button>

    </form>
</div>
