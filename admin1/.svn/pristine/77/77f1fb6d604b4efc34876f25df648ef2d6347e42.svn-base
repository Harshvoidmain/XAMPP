var base = controller = action = null;
$(function() {
    base = $('#base').val();
    controller = $('#controller').val();
    action = $('#action').val();

    $('#EnquiryStatus').change(function() {
        $('.should_be_hidden').val('').closest('.control-group').hide();
        $val = $(this).val().toString().replace(new RegExp(' ', 'g'), '_');
        if ($val === '') {
            return;
        }
        $('.' + $val).closest('.control-group').show();
    });

    $('#EnquiryType').change(function() {
        $('.should_be_hidden_type').val('').closest('.control-group').hide();
        $val = $(this).val().toString().replace(new RegExp(' ', 'g'), '_');
        if ($val === '') {
            return;
        }
        $('.' + $val).closest('.control-group').show();
    });
    $('#EnquiryStatus,#EnquiryType').trigger('change');
});