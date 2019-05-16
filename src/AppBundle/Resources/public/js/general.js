function setTogglePermisUser() {
    $('#permisOuiNon').bootstrapToggle({
        on: 'Oui',
        off: 'Non',
        onstyle: 'success',
        offstyle: 'danger'
    });

    $('#permisOuiNon').on('change', function () {
        if($(this).is(':checked')) {
            $('#infosPermis').show();
        } else {
            $('#infosPermis').hide();
        }
    })
}

function setOnSubmitFormUser() {
    $('form[name="user"]').on('submit', function () {
        if(!$('#permisOuiNon').is(':checked')) {
            $('#user_permis').val('');
            $('#user_urlpermis').val('');
        }
    });
}