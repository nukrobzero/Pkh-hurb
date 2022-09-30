
var request;
$(".check_license").change(function(){
    // Prevent default posting of form - put here to work in case of errors
    // alert();
    var send = $(this).val();
    var check = 0;
    if($(this). prop("checked") == true){
		check = 1;
	}
    event.preventDefault();
    if (request) {
        request.abort();
    }
    var $form = $("#products-manufacture-add");
    var serializedData = $form.serialize();

    // $inputs.prop("disabled", true);
    // alert($("#pd_name").val());
    // Fire off the request to /form.php
    request = $.ajax({
        url: "./process/check_license.php?s="+send+"&c="+check,
        type: "post",
        data: serializedData
    });

    // Callback handler that will be called on success
    request.done(function (response, textStatus, jqXHR){
        // Log a message to the console
        // console.log("Hooray, it worked!");
        // alert(response);
        // $("#show-select-sub-products").html(response);
        // window.location.href ='./products-manufacture-show_list.php'
    });

    // Callback handler that will be called on failure
    request.fail(function (jqXHR, textStatus, errorThrown){
        // Log the error to the console
        console.error(
            "The following error occurred: "+
            textStatus, errorThrown
        );
        alert("เกิดข้อผิดพลาดบางประการ");
    });

    // Callback handler that will be called regardless
    // if the request failed or succeeded
    request.always(function () {
        // Reenable the inputs
        // $inputs.prop("disabled", false);
    });

  });


