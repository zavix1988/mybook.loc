
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
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Launch demo modal</button>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="send">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('#send').click(function(){
        $.ajax({
            type: "POST",
            url: "/sendmail",
            data: '{data: yayebu}',
            dataType:"text", timeout:30000, async:false,
            error: function(xhr) {
                console.log('Ошибка!'+xhr.status+' '+xhr.statusText);
            },
            success: function(a) {
                document.getElementById("my-content").innerHTML=a;
            }
        });
    });
</script>
