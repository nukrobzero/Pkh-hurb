
var request;
$("#pd_name").change(function (event){

    // Prevent default posting of form - put here to work in case of errors
    event.preventDefault();
    if (request) {
        request.abort();
    }
    var $form = $("#show-sub-products");
    var serializedData = $form.serialize();
    // $inputs.prop("disabled", true);
    // alert($("#pd_name").val());
    // Fire off the request to /form.php
    request = $.ajax({
        url: "./process/show-sub-products.php",
        type: "post",
        data: serializedData
    });

    // Callback handler that will be called on success
    request.done(function (response, textStatus, jqXHR){
        // Log a message to the console
        // console.log("Hooray, it worked!");
        // alert("บันทึกข้อมูลแล้ว");
        $("#show-select-sub-products").html(response);
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


$("#cal-manufacture").click(function(event){
    $("#show-table-manufacture").show();
    $("#sub_id").val($("#sp_id").val());
    $("#sub_no").val($("#sp_no").val());
    // alert($("#sp_id").val());
    // Prevent default posting of form - put here to work in case of errors
    event.preventDefault();
    if (request) {
        request.abort();
    }
    var $form = $("#show-table-menu");
    var serializedData = $form.serialize();

    // $inputs.prop("disabled", true);
    // alert($("#pd_name").val());
    // Fire off the request to /form.php
    request = $.ajax({
        url: "./process/show-table-manufacture.php",
        type: "post",
        data: serializedData
    });

    // Callback handler that will be called on success
    request.done(function (response, textStatus, jqXHR){
        // Log a message to the console
        // console.log("Hooray, it worked!");
        // alert("บันทึกข้อมูลแล้ว");
        $("#show-table-manufacture2").html(response);

        
        $("#cost_tmp").val($("#cost").val());
        $("#total_price_tmp").val($("#total_price").val());
        $("#profit_tmp").val($("#profit").val());
        
        if($("#canclick").val()==1){
            $("#add-manufacture").prop("disabled", false);
        }
        else{
            $("#add-manufacture").prop("disabled", true);
        }
    });

    // Callback handler that will be called on failure
    request.fail(function (jqXHR, textStatus, errorThrown){
        // Log the error to the console
        console.error(
            "The following error occurred: "+
            textStatus, errorThrown
        );
        alert("เกิดข้อผิดพลาดบางประการ"+response);
    });

    // Callback handler that will be called regardless
    // if the request failed or succeeded
    request.always(function () {
        // Reenable the inputs
        // $inputs.prop("disabled", false);
    });
  });