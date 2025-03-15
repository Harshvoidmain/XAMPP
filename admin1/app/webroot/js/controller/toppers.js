var base = controller = action = null;
$(function() {
    base = $('#base').val();
    controller = $('#controller').val();
    action = $('#action').val();

    $('#TopperType').on('change', function() {
        if ($(this).val() == 'General') {
            $('#TopperDepartment').closest('.control-group').show();
        }
        else 
        {
            $('#TopperDepartment').closest('.control-group').hide();
        }
    }).trigger('change');

    $('#TopperType').on('change', function() {
        if ($(this).val() == 'General') {
            $('#TopperPercentile').closest('.control-group').hide();
        }
        else 
        {
            $('#TopperPercentile').closest('.control-group').show();
        }
    }).trigger('change');

});