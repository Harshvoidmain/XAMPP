var base = controller = action = null;
$(function() {
    base = $('#base').val();
    controller = $('#controller').val();
    action = $('#action').val();
    /**/
    $count = 0;
    $prev = new Array();
    $now = new Array();
    /**
     * on change of garment
     */
    $prev = [];
    $('#GarmentGarment').change(function() {
        $val = $(this).val();
        if ($val === null) {
            $val = [];
        }
        $id = 0;
        $name = '';
        if ($prev.length < $val.length) {//new added
            $id = $.grep($val, function(x) {
                return $.inArray(x, $prev) < 0
            });
            $this = $(this).find('option').filter('[value="' + $id + '"]');
            $name = $this.text();
            $no_of_existing = $this.attr('no_of_existing');
            if ($no_of_existing === null || $no_of_existing === undefined) {
                $no_of_existing = 0;
            }
            //making ajax call and adding it
            $.get(base + 'alterations/get_tab/' + $id + '/' + $no_of_existing, function(response) {
                $('#garmentsTab').find('ul').find('li').filter('.active').removeClass('active');
                $('#garmentsTab').find('ul').append('<li gid="#tab_' + $id + '_' + $no_of_existing + '"><a data-toggle="tab" class="active" href="#tab_' + $id + '_' + $no_of_existing + '">' + $name + '</a> <button type="button" class="btn red mini tabClose" gid="#tab_' + $id + '_' + $no_of_existing + '">close</button></li>');

                $('#garmentsTab').find('.tab-content').filter('.active').removeClass('active');
                $('#garmentsTab').find('.tab-content').append('<div  gid="#tab_' + $id + '_' + $no_of_existing + '" id="tab_' + $id + '_' + $no_of_existing + '" class="tab-pane active">' + response + '</div>');
                //showing tab
                $('#garmentsTab a[href="#tab_' + $id + '_' + $no_of_existing + '"]').tab('show');

                //incrementing no of
                $this.attr({
                    'no_of_existing': parseInt($no_of_existing, 10) + 1
                });
            });
        } else {//removed      
            $id = $.grep($prev, function(x) {
                return $.inArray(x, $val) < 0
            });
            $name = $(this).find('option').filter('[value="' + $id + '"]').text();
            //removing selected from tab

            $('#garmentsTab').find('ul').find('li').filter('[gid="' + $id + '"]').remove();
            $('#garmentsTab').find('.tab-content').filter('[gid="' + $id + '"]').remove();
            if ($('#garmentsTab').find('.tab-content').length > 0) {
                $('#garmentsTab a:first').tab('show');
            }

        }
        $prev = $val;
    });

    /**
     * adding of same garment
     */
    $('#multiple_garments').live('click', function() {
        if (this.checked) {
            $selected_id = $(this).attr('g_id');
            $prev = jQuery.grep($prev, function(value) {
                return $.inArray($selected_id, $prev) < 0
            });
            $('#GarmentGarment').trigger('change');
            $(this).closest('.control-group').remove();
        }
    });

    $('.btn').live('click',function() {
        $selected_id = $(this).attr('g_id');       
        
    });
$('.fancybox-inner form#ClientAddForm').live('submit', function() {
        var data = {};
        data['Client'] = {
            full_name: $('#ClientFullName').val(),           
            contact_number_1: $('#ClientContactNumber1').val(),
            address: $('#ClientAddress').val()
        };
        $.post(base + 'Clients/add', {
            data: data
        }, function(response) {
            if (response === -1) {
                alert('try again');

            } else {
                $('#AlterationClientId').append('<option value=' + response.id + ' selected="selected">' + response.full_name + '</option>').trigger('liszt:updated');
                $.fancybox.close();
            }
        }, 'json');
        return false;

    });


});
fancybox_ajax_on_complete = function() {
    $('.fancybox-inner form').find('.not-required').closest('.control-group').remove();
    $('.fancybox-inner form').validationEngine();
    $('.fancybox-inner form').find('select').chosen();
};
