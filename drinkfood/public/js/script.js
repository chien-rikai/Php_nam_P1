$('document').ready(function(){
    /* Function change category when click choose type*/
    $('#select_type').on('change', function() {
        var type = this.value;

        $.ajax({
            url: "/Php_nam_P1/drinkfood/public/admin/product/change_cat/"+type,
            cache: false
        })
        .done(function( data ) {
            var optionCategory = "";
            var i;
            for(i = 0; i < data.length; i++)
            {
                optionCategory += "<option value='" + data[i]['id'] + "'>" + data[i]['name'] + "</option>";
            }
            $("#category").html(optionCategory);
        });
    });
});

/* Function change status of product when click to switch */
function changeStatus(uid)
{
    var idSwitchButton = $('#customSwitch'+uid);
    var idMessageStatus = $('#msg_status_'+uid);
    currentStatus = $(idSwitchButton).attr('status');
    
    /* Check current status of product */
    if(currentStatus == 1) status = 2;
    else status = 1;

    /* Call ajax function update status of product*/
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        method: "POST",
        url: "/Php_nam_P1/drinkfood/public/admin/product/change_status/"+uid,
        data: { status: status, uidProduct: uid }
      }).done(function( msg ) {
          if(msg['sttUpdate'] == true){
            $(idSwitchButton).attr('status', status);
            $(idMessageStatus).html(msg['message']);
          }
        });

}

/* Function display image when user choose image from computer */
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('.img_form')
                .attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}