window.confimDelete = function(formId, msg) {
    const form = document.getElementById(formId);

    let confirmacao = confirm(msg);

    if (confirmacao) {
        form.submit();
    }
};