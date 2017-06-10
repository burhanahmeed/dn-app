$(document).ready(function(){
$('button#smt').click(function(e){
        e.preventDefault();
        var link = $('#daftar').attr('action');
        var isi = $('#daftar').serialize();
        // alert(isi);
        $('#notifi').html('<p><strong>Submitting Your Form..</strong></p>');
        $.ajax({
                url: link,
                dataType: 'text',
                type: 'post',
                contentType: 'application/x-www-form-urlencoded',
                data: isi,
                success: function( data, textStatus, jQxhr ){
                    var arr = JSON.parse(data);
                    if (arr.res == 1 ) {
                        $('#notifi').html(
                            '<div class="alert alert-success alert-dismissable">'+
                              '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+
                              arr.msg+
                            '</div>'
                            );
                        window.location = arr.url;
                    }else if(arr.res == 0){
                        $('#notifi').html(
                            '<div class="alert alert-danger alert-dismissable">'+
                              '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+
                              arr.msg+
                            '</div>'
                            );
                    }
                },
                error: function( jqXhr, textStatus, errorThrown ){
                    console.log( errorThrown );
                }
            });
                return false;
    });
});
       
