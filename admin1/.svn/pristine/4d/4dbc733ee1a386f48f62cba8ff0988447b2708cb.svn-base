var base = controller = action = null;
$(function() {
    base = $('#base').val();
    controller = $('#controller').val();
    action = $('#action').val();

    $('#EnquiryStatus').change(function() {
        $('#EnquiryConfirmedProjectId').empty().closest('.control-group').hide();
        if ($(this).val() === 'Awesome,  we did it') {
            $('#EnquiryConfirmedProjectId').closest('.control-group').show();
        }
    });
    $('#EnquiryStatus').trigger('change');

    /**
     * saving client on fancy box
     * @returns {undefined}
     */
    $('.fancybox-inner form').live('submit', function() {
        var data = {};
        data['Client'] = {
            institute_id: $('#ClientInstituteId').val(),
            full_name: $('#ClientFullName').val(),
            contact_number_1: $('#ClientContactNumber1').val(),
            email_address_1: $('#ClientEmailAddress1').val()
        };
        $.post(base + 'Clients/add', {
            data: data
        }, function(response) {
            if (response === -1) {
                alert('try again');

            } else {
                $('#ClientClient').append('<option value=' + response.id + ' selected="selected">' + response.full_name + '</option>').trigger('liszt:updated');
                $.fancybox.close();
            }
        }, 'json');
        return false;

    });
    /**
     * To add new followups
     */
    $("#enquiryFollowup").click(function() {
        $(".hidethis").toggle();
    });
});
fancybox_ajax_on_complete = function() {
    $('.fancybox-inner form').find('.not-required').closest('.control-group').remove();
    $('.fancybox-inner form').validationEngine();
    $('.fancybox-inner form').find('select').chosen();
};

