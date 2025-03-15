var base = controller = action = null;
$(function() {
    base = $('#base').val();
    controller = $('#controller').val();
    action = $('#action').val();
    
    $('#EnquiryTailFollowupActionId').change(function(){
        $val = $(this).val();
        $.get(base+'FollowupActions/get_email_sms_content/'+$val, function(response){
            $('#EnquiryTailFinalizedEmailContent').val(response.FollowupAction.action_email_content);
            $('#EnquiryTailFinalizedSmsContent').val(response.FollowupAction.action_sms_content);
            if(response.FollowupAction.action_sms_content){
                $('#EnquiryTailNextFollowupTimestamp').addClass('validate[required]');
            }else{
                $('#EnquiryTailNextFollowupTimestamp').removeClass('validate[required]');
            }
            $('form').validationEngine();
        }, 'json');
    });
    if(action == 'add'){
        $('#EnquiryTailFollowupActionId').trigger('change');
    }
    $('.fancybox-inner form#PatientEditForm').live('submit', function(){
        var data = {};
        data['Patient'] = {
            id:$('#PatientId').val(),
            full_name:$('#PatientFullName').val(),
            age:$('#PatientAge').val(),
            email_address_1:$('#PatientEmailAddress1').val(),
            contact_number_1:$('#PatientContactNumber1').val(),
            blood_group:$('#PatientBloodGroup').val()
        }
        $.post(base+'patients/edit/'+$('#PatientId').val(), {
            data:data
        }, function(response){
            if(response){
                alert('saved');
                $.fancybox.close();
            }else{
                alert('er');
            }
        },'json');
        return false; 
        
    });
    $('.fancybox-inner form#LocationAddForm').live('submit', function(e){
        e.preventDefault();
        var data = {};
        data['Location'] = {
            latitude:$('#LocationLatitude').val(),
            langitude:$('#LocationLangitude').val()         
        }
        $.post(base+'DiagnosticCenters/near_by_location/', {
            data:data
        }, function(response){
            $('#searchDiagnosticCenter').remove();
            $('.fancybox-inner form#LocationAddForm').after(response);
            
        });
        return false; 
    });

    $('#EnquiryTailStatus').change(function() {
        var selected = $(this).val();
        if(selected == 'Diagnostic Centre allocated'){
            $('#EnquiryTailDiagnosticCenterId').closest('.control-group').show();
        }
        else{
            $('#EnquiryTailDiagnosticCenterId').closest('.control-group').hide();
        }
    });
    $('#EnquiryTailStatus').trigger('change');
    $('#EnquiryTailFinalizedEmailContent').closest('.control-group').hide();
    $('#EnquiryTailEmailRequired').click(function(){
        if($('#EnquiryTailEmailRequired').is(':checked')){
            $('#EnquiryTailFinalizedEmailContent').closest('.control-group').show();                 
        } else {
            $('#EnquiryTailFinalizedEmailContent').closest('.control-group').hide();
        }
    });
    $('#EnquiryTailEmailRequired').trigger('change');
    /**
     * 
     */
    $('#EnquiryTailFinalizedSmsContent').closest('.control-group').hide();
    $('#EnquiryTailSmsRequired').click(function(){
        if($('#EnquiryTailSmsRequired').is(':checked')){
            $('#EnquiryTailFinalizedSmsContent').closest('.control-group').show();                 
        } else {
            $('#EnquiryTailFinalizedSmsContent').closest('.control-group').hide();
        }
    });
    $('#EnquiryTailEmailRequired').trigger('change');
});
ajax_fancybox_after_show = function(){
    $('.fancybox-inner form').find('.not-required').closest('.control-group').remove();
    $('.fancybox-inner form').validationEngine();
    $('.fancybox-inner form').find('select').chosen();
    location_autocomplete();
}
