function checkValidation(input) {
    if (input.value.length === 0 || input.value === ' ') {
        input.classList.add('warning');
    }
}
function submitForm(form) {
    // $(form).ajax({
    //     data: $(form).serialize(),
    //     method: "POST",
    //     url: $(form).attr('action'),
    //     success: function (data) {
    //     }
    // })
    $('#modal-success').iziModal('open');
}
$('#modal-success').iziModal({
    headerColor: 'rgb(0, 175, 102)',
    width: 400,
    timeout: 10000,
    overlayColor: 'rgba(0, 0, 0, 0)',
    bottom: 0,
    top: null,
    zindex: 999999999,
    pauseOnHover: true,
    transitionIn: 'fadeInDown',
    transitionOut: 'fadeOutDown',
    timeoutProgressbar: true,
    attached: 'bottom'
});
$('form').submit(function (event) {
    event.preventDefault();
    var form = event.target;
    var requiredInputs = form.querySelectorAll('.required');
    var checkPromise = new Promise(function (resolve, reject) {
        requiredInputs.forEach(function (item) { return checkValidation(item); });
    });
    checkPromise.then();
    if ($('.warning').length == 0) {
        submitForm(form);
    }
});
var i = 0;
$("input, textarea").on('keypress', function (e) {
    $(this).removeClass('warning');
    if ($(this).val().length < 1) {
        if (e.which == 32) {
            return false;
        }
    }
    else {
        if (e.which == 32) {
            if (i != 0) {
                return false;
            }
            i++;
        }
        else {
            i = 0;
        }
    }
});
