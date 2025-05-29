// Initialize AdminLTE components
$(document).ready(function () {
    // Initialize iCheck plugin
    if ($('.icheck-primary').length) {
        $('.icheck-primary').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    }
});
