// noinspection JSUnresolvedVariable
/**
 * Base script to validate, perform controls and do Ajax form submissions.
 */
(() =>
{
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    const forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.from(forms).forEach(form =>
    {
        form.addEventListener('submit', event =>
        {
            if (!form.checkValidity())
            {
                event.preventDefault()
                event.stopPropagation()
            }

            form.classList.add('was-validated')
        }, false)
    })
})()
(function ($)
{
    'use strict';
    const togglePassword = function (event) {$(this).find('.bi').toggleClass('bi-eye-slash bi-eye').parents().siblings('.password').prop('type', event.type === 'mousedown' ? 'text' : 'password') }
    $('form').on('submit', function (event)
    {
        if (!this.checkValidity())
        {
            $(this).addClass('was-validated')
            return false
        }
    })
    $('.toggle-password').on('mousedown', togglePassword).on('mouseup', togglePassword)
})
(jQuery);
