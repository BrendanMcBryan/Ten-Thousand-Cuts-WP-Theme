jQuery(document).ready(function($) {
    function filterProperties() {
        var filterData = {
            action: 'pl_filter_properties',
            price_max: $('#price_max').val(),
            bedrooms: $('#bedrooms').val(),
            date_available: $('#date_available').val()
        };

        $.ajax({
            type: 'POST',
            url: pl_ajax.ajax_url,
            data: filterData,
            beforeSend: function() {
                $('#property-listings').html('<p>Loading...</p>');
            },
            success: function(response) {
                $('#property-listings').html(response);
            }
        });
    }

    // $('#price_max, #bedrooms, #date_available').on('input change', function() {
    //     filterProperties();
    // });

    filterProperties(); // Initial load
});
