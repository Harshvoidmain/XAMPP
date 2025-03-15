var base = controller = action = null;
$(function() {
    base = $('#base').val();
    controller = $('#controller').val();
    action = $('#action').val();

    App.init(); // initlayout and core plugins
    TableManaged.init();
    $('form').validationEngine();
    /**
     * time ago
     * 1st checking if format is unix timestamp it will convert it to time tag
     */
    $('table').find('td').filter(function() {
        $data = $(this).text().trim();
        if (/^\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}$/.test($data)) {
            $(this).empty().append('<abbr class="timeAgo tooltips" title="' + $data + '">' + $data + '</abbr>');
        }
    });

    $('.time_line').filter(function() {
        $datatime = $(this).text().trim();
        if (/^\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}$/.test($datatime)) {
            $(this).empty().append('<abbr class="timeAgo tooltips" title="' + $datatime + '">' + $datatime + '</abbr>');
        }
    });
    $('abbr.timeAgo').timeago();
    if (action === 'view') {
        $('.tabbable.tabbable-custom').find('.nav.nav-tabs').find('a:first-child').addClass('active');
    }
    /**
     * for date picker
     */
    $('.date').not('.control-group').wrap('<div class="input-append date-picker" data-date-format="yyyy-mm-dd" data-date-viewmode="years"/>').datepicker({
        }).after('<span class="add-on"><i class="icon-remove"></i></span><span class="add-on"><i class="icon-calendar"></i></span>');
    ;
    $('.datetime').not('.control-group').wrap('<div class="input-append datetime-picker" data-date-format="yyyy-mm-dd" data-date-viewmode="years"/>').datetimepicker({
        }).after('<span class="add-on"><i class="icon-remove"></i></span><span class="add-on"><i class="icon-calendar"></i></span>');
    $('.time').timepicker({
        });
    $('.daterange').daterangepicker({
        });

    location_autocomplete();
    showTab();


    $('#LatestNewsAttachment').click(function() {
        this.value = this.checked ? 1 : 0;
        console.log(this.value);
        if ($(this).is(':checked')) {
            $('#LatestNewsDesign').closest('.control-group').show();
        } else {
            $('#LatestNewsDesign').closest('.control-group').hide();
        }
    }).trigger('click');

});
/**
     *
     */
location_autocomplete = function() {
    $('.location_autocomplete').attr({
        autocomplete: 'off'
    }).autocomplete({
        source: function(request, response) {
            $.ajax({
                url: "http://ws.geonames.org/searchJSON",
                dataType: "jsonp",
                data: {
                    featureClass: "P",
                    style: "full",
                    maxRows: 12,
                    name_startsWith: request.term
                },
                success: function(data) {
                    response($.map(data.geonames, function(item) {

                        $city = item.name;
                        $state = (item.adminName1 ? "" + item.adminName1 : "");
                        $country = item.countryName;
                        $lat = item.lat;
                        $lng = item.lng;
                        $name = $city + ", " + $state + ", " + $country;
                        return {
                            label: $name,
                            value: $city + '-' + $state + '-' + $country + '-' + $lat + '-' + $lng
                        };
                    }));
                }
            });
        },
        minLength: 2,
        focus: function(event, ui) {
            event.preventDefault();
            $(this).val(ui.item.label);
            var splited = ui.item.value.split('-');
            $('#LocationLatitude').val(splited[3]);
            $('#LocationLangitude').val(splited[4]);
            $('#LocationCity').val(splited[0]);
            $('#LocationState').val(splited[1]);
            $('#LocationCountry').val(splited[2]);

        },
        select: function(event, ui) {
            event.preventDefault();
            $(this).val(ui.item.label);
            //console.log(ui.item.value);
            var splited = ui.item.value.split('-');
            $('#LocationLatitude').val(splited[3]);
            $('#LocationLangitude').val(splited[4]);
            $('#LocationCity').val(splited[0]);
            $('#LocationState').val(splited[1]);
            $('#LocationCountry').val(splited[2]);
        },
        open: function() {
            $(this).removeClass("ui-corner-all").addClass("ui-corner-top");
        },
        close: function() {
            $(this).removeClass("ui-corner-top").addClass("ui-corner-all");
        }


    });
    $('#deleteAll').click(function(e) {
        e.preventDefault();
        var ids = [];
        $('.checkboxes').filter(':checked').each(function() {
            ids.push($(this).attr('td_id'));
        });
        window.location = base + 'common/deleteAll/' + $('#modelName').val() + '/' + ids.join(',');
    });

    /**
         * for Searching Data
         */

    $('#searchInput').keyup(function(event) {
        if (event.keyCode == 27 || $(this).val() == '') {
            $(this).val('');
        } else
{
            var title = $("#searchInput").val();
            ('#odd gradeX row').filter.val(title);

        //            filter('tbody tr', $(this).val());
        }
    });
};
showTab = function() {
    if ($('.tabbable').length > 0) {
        $('.tabbable').filter(function() {
            $(this).find('ul.nav').find('li').find('a').filter(':first').tab('show');
        });
    }
};

$(function() {
  /**
  * NAME: Bootstrap 3 Multi-Level by Johne
  * This script will active Triple level multi drop-down menus in Bootstrap 3.*
  */
  $('li.dropdown-submenu').on('click', function(event) {
      event.stopPropagation();
      if ($(this).hasClass('open')){
          $(this).removeClass('open');
      }else{
          $('li.dropdown-submenu').removeClass('open');
          $(this).addClass('open');
     }
  });
});
