

$(function () {
    $(document).on('click','.fc-day',function () {

        var date = $(this).attr('data-date'),
        serviceId = params.id;


        $.get('/event/create/',{'date': date, 'service_id': serviceId},function (data) {

            $('#modal').modal('show')
                .find('#modalContent')
                .html(data);
        });
    });
        //get the click the create button

    $('#modalButton').click(function () {
        $('#modal').modal('show')
            .find('#modalContent')
            .load($(this).attr('value'));
    });
});

function getSearchParameters() {
    var prmstr = window.location.search.substr(1);
    return prmstr != null && prmstr != "" ? transformToAssocArray(prmstr) : {};
}

function transformToAssocArray( prmstr ) {
    var params = {};
    var prmarr = prmstr.split("&");
    for ( var i = 0; i < prmarr.length; i++) {
        var tmparr = prmarr[i].split("=");
        params[tmparr[0]] = tmparr[1];
    }
    return params;
}

var params = getSearchParameters();
