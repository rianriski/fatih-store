jQuery(document).ready(function($) {
    $("#create_invoice_user_id").on("change", function() {
        let user_id = $(this).val();
        console.log(user_id);

        $("#create_invoice_transaction_uuid").empty();
        $("#create_invoice_transaction_uuid").append(
            `<option value="0" disabled selected>Processing...</option>`
        );

        // ajax
        $.ajax({
            type: "GET",
            url: "/invoices/create/" + user_id,
            success: function(response) {
                var response = JSON.parse(response);
                console.log(response);
                $("#create_invoice_transaction_uuid").empty();
                $("#create_invoice_transaction_uuid").append(
                    `<option value="0" disabled selected>-- Select Transaction --</option>`
                );
                response.forEach(element => {
                    $("#create_invoice_transaction_uuid").append(
                        `<option value="${element}">${element}</option>`
                    );
                });
            }
        });
    });

    let total = $("#transaction_total").html();
    let po_numb = $("#po_numb").html();
    // console.log(po_numb);

    $("#hiddenForm").submit(function() {
        $.ajax({
            type: "POST",
            url: "/invoices/store/total/" + po_numb + "/" + total
        });
    });
});
