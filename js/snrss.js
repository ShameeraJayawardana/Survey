$('#fullname').click(function(){
    var name = $(this).text();
    $(this).html('');
    $('<input></input>')
        .attr({
            'type': 'text',
            'name': 'fname',
            'id': 'txt_fullname',
            'size': '30',
            'value': name
        })
        .appendTo('#fullname');
    $('#txt_fullname').focus();
});

$(document).on('blur','#txt_fullname', function(){
    var name = $(this).val();
    $.ajax({
        type: 'post',
        url: 'change-name.xhr?name=' + name,
        success: function(){
            $('#fullname').text(name);
        }
    });
});