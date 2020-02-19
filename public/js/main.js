
// при открытии модального окна
$('#edite_album').on('show.bs.modal', function (event) {
    // получить кнопку, которая его открыло
    let button = $(event.relatedTarget);
    // извлечь информацию из атрибута data-content

    let content = button.data('content');
    let arr = content.split(',');

    // вывести эту информацию в элемент, имеющий id="content"
    $('#content').val(arr[1]);

    $('form').attr("action","albums/"+jQuery.trim(arr[0])+"/update");
});

