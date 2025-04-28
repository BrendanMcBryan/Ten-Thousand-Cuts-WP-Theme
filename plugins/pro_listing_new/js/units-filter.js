jQuery(document).ready(function($) {
    // let currentPage = 1;
    // let timer;
    
    // // Initial load
    // loadUnits();
    
    // // Filter events
    // $('#unit-search, #bedrooms-filter, #sqft-min, #sqft-max, #affordable-only').on('input change', function() {
    //     currentPage = 1;
    //     clearTimeout(timer);
    //     timer = setTimeout(loadUnits, 300); // Debounce 300ms
    // });
    
    // // Pagination
    // $(document).on('click', '.page-link', function(e) {
    //     e.preventDefault();
    //     currentPage = $(this).data('page');
    //     loadUnits();
    // });
    
    // function loadUnits() {
    //     $('#units-loading').show();
        
    //     const filters = {
    //         search: $('#unit-search').val(),
    //         bedrooms: $('#bedrooms-filter').val(),
    //         sqft_min: $('#sqft-min').val() || 0,
    //         sqft_max: $('#sqft-max').val() || 99999,
    //         affordable_only: $('#affordable-only').is(':checked'),
    //         page: currentPage
    //     };
    //     console.log("affordable_only"+ $('#affordable-only').is(':checked'));
    //     $.ajax({
    //         url: units_vars.ajaxurl,
    //         type: 'POST',
    //         data: {
    //             action: 'filter_units',
    //             ...filters
    //         },
    //         success: function(response) {
    //             if (response.success) {
    //                 $('#units-container').html(response.data.html);
    //                 $('#units-pagination').html(response.data.pagination);
    //             }
    //         },
    //         complete: function() {
    //             $('#units-loading').hide();
    //         }
    //     });
    // }
});