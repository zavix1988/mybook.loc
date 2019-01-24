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
                <?php foreach($bookAuthors as $bookAuthor):?>
                    <?=$bookAuthor['name']?>,&nbsp
                <?php endforeach;?>
            </td>
            <td>
                <?php foreach($bookGenres as $bookGenre):?>
                    <?=$bookGenre['name']?>,&nbsp
                <?php endforeach;?>
            </td>
        </tr>
        <tr>
            <td colspan="6"><?=$book[0]['description']?></td>
        </tr>
        </tbody>
    </table>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#bayModal">Заказать книгу</button>
    <!-- Bay Modal -->
    <div class="modal fade" id="bayModal" tabindex="-1" role="dialog" aria-labelledby="bayModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bayModalLabel">Заказать книгу</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="bayForm">
                        <input name="idBookBay" value="<?=$book[0]['name']?> (<?=$book[0]['id']?>)" type="hidden">
                        <label for="FIO">Ф.И.О</label>
                        <input id="FIO" name="FIO" type="text" class="form-control"><br>
                        <label for="post">Адрес</label>
                        <input id="post" name="post" type="text" class="form-control"><br>
                        <label for="col">Количество экземпляров </label>
                        <input id="col" name="col" type="text" class="form-control"><br>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                    <button type="button" class="btn btn-primary" id="send">Отправить заказ</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Success Modal -->
    <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">Успешно</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Заказ отправлен успешно</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $("#send").click(function(){
        var book = $("input[name='idBookBay']").val();
        var fio = $("input[name='FIO']").val();
        var post = $("input[name='post']").val();
        var count = $("input[name='col']").val();
        $.ajax({
            type: "POST",
            dataType: "text",
            url: "/sendmail",
            data: {
                book: book,
                name: fio,
                address: post,
                count: count,
            },
            success: function(res){
                $('#bayModal').modal('hide');
                $('#bayForm').trigger('reset');
                $('#successModal').modal('show');
            },
        });
    });
</script>
