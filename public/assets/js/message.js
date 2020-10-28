$(document).ready(function () {
    $('.btn-success').on('click', function (e) {
        e.preventDefault();
        var $link = $(e.currentTarget);
        var content = $('#message_content').val();
        console.log(content);
        // $link.toggleClass('btn-info').toggleClass('btn-block');
        console.log($link.attr('href'))
        $.ajax({
            method: 'POST',
            url: $link.attr('href'),
            data:{'content':content},
            dataType:'json'
        })
        // alert("Dodałeś produkt do koszyka!!!!")
    });
});