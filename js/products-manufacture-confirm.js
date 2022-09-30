
var request;
$("#add-manufacture4").click(function(){
// if($("#sp_no").val()!="" && $("#sp_id").val()!="0"){
    // Prevent default posting of form - put here to work in case of errors
    event.preventDefault();
    if (request) {
        request.abort();
    }
    var $form = $("#pd_confirm");
    var serializedData = $form.serialize();
    // var pmm_id =$("#pmm_id").val()
    // $inputs.prop("disabled", true);
    // alert($("#pd_name").val());
    // Fire off the request to /form.php
    request = $.ajax({
        url: "./process/products-manufacture-confirm.php",
        type: "post",
        data: serializedData
    });

    // Callback handler that will be called on success
    request.done(function (response, textStatus, jqXHR){
        // Log a message to the console
        // console.log("Hooray, it worked!");
        alert("บันทึกข้อมูลแล้ว");
        // $("#show-select-sub-products").html(response);
        //alert(response);
        window.location.href ='./products-manufacture-show_list.php';
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
// }

  });


