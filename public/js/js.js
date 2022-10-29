var ar = {
    changeImage: function (input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (o) {
                $('#profile_preview').attr('src', o.target.result);
            }
            reader.readAsDataURL(input.files[0]); //convert to base 64
        }
    },
    _delete: function(event,url,target,type="ajax"){
        var pre_data = $(event.target).html();
        swal({
            title: "Are you sure?",
            icon: "warning",
            buttons: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    var btn = $(event.target).attr('class').split(' ')[0]=="fa"?$(event.target).parent('button'):$(event.target);
                    var html = btn.html();
                    btn.html('<span class="spinner-border spinner-border-sm"></span>').prop('disabled',true);
                    $.ajax({
                        url: url,
                        method: 'DELETE',
                        data: {'_token': $('input[name="_token"]').val()},
                        success: function(data){
                            btn.html(html).removeAttr('disabled');
                            if (type=="http"){
                                if (data.status){
                                    swal({
                                        title: 'success',
                                        icon: 'success',
                                        text: data.message
                                    });
                                    setTimeout(function(){
                                        window.location.href = data.url
                                    },1000);
                                }
                            }else if(type=="ajax"){
                                if (data.status){
                                    swal({
                                        title: 'success',
                                        icon: 'success',
                                        text: data.message
                                    });
                                    $(target).html(data.body);
                                }else {
                                    if (data.show_type === "notify") {
                                        $.notify(data.message, {type: 'info', position: 'top center'});
                                    } else if (data.show_type == "swal") {
                                        swal({
                                            icon: 'error',
                                            title: 'Error',
                                            text: data.message
                                        });
                                    }
                                }
                            }
                        },
                        error: function(){
                            alert('Connection Error');
                            btn.html(html).removeAttr('disabled');
                        }
                    });
                }
            });
    }
}
$(document).ready(function (){
   var active_html = $("#sidenav").find('.active').html();
   $("#logo").html(active_html);
});
