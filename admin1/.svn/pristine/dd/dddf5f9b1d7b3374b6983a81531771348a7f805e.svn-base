var base = controller = action = null;
$(function() {
    base = $('#base').val();
    controller = $('#controller').val();
    action = $('#action').val();

    /**
     * on select of garments dropdown latest status of the garment should displayed
     */

    $('#AlterationsGarmentsStateGarmentId').change(function() {
        $garment_id = $(this).val();
      
        $.get(base + 'AlterationsGarment/latest_state/' + $('#AlterationsGarmentsStateAlterationId').val() + '/' + $garment_id, function(response) {
            //select below option with value
            state_id = response['state_id'];
            alterations_garment_id=response['alterations_garment_id'];
            $('#AlterationsGarmentsStateStateId').find('option:selected').removeAttr('selected');
            $('#AlterationsGarmentsStateStateId option[value=' + state_id + ']').attr('selected', 'selected');
            $('#AlterationsGarmentsStateStateId').trigger('liszt:updated');            
           $('#AlterationsGarmentsStateAlterationsGarmentId').val(alterations_garment_id);
            
        }, 'json');
    });
    if (action === 'add') {
        $('#AlterationsGarmentsStateGarmentId').trigger('change');
    }

});