$(document).ready(function () {
    $('#example').DataTable({
        pagingType: 'simple_numbers',
        language: {
            paginate: {
                // first:    '«',
                previous: '‹',
                next:     '›',
                // last:     '»'
            },
            aria: {
                paginate: {
                    // first:    'First',
                    previous: 'Previous',
                    next:     'Next',
                    // last:     'Last'
                }
            }
        }
    } );
    
});