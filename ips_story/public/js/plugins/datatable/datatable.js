function configureContextMenu() {
    $('.multiple-select-row tbody tr').swipe({
        swipe: function (event, direction, distance, duration, fingerCount) {
            if (fingerCount === 1) {
                $(this).contextMenu({
                    x: event.changedTouches[0].screenX,
                    y: event.changedTouches[0].screenY,
                });
            }
        }
    });
}


function initDatatable(target = $('.dt-datatable')) {

    let columnDefs = [{
        targets: "datatable-nosort",
        orderable: false,
    }]

    var options = {
        scrollCollapse: true,
        autoWidth: false,
        responsive: true,
        "bLengthChange": true,
        "lengthMenu": [
            [10, 20, 50, -1],
            [10, 20, 50, "All"]
        ],
    };

    if (target.hasClass('multicheckbox'))
        columnDefs.push({
            targets: 0,
            orderable: false,
            checkboxes: {
                'selectRow': true
            }
        })

    if (target.hasClass('export')) {
        var buttons = [];
        if ($('.dt-datatable.export').hasClass('pdf')) {
            buttons = [
                ...buttons,
                'pdf'
            ]
        }

        if ($('.dt-datatable.export').hasClass('excel')) {
            buttons = [
                ...buttons,
                'excel'
            ]
        }
        options = {
            ...options,
            dom: 'Bfrtip',
            buttons: buttons,
        }
    }

    if (target.hasClass('group')) {

        let groupRow = target.attr('group-row') ? target.attr('group-row') : 0;
        options = {
            ...options,
            'rowsGroup': [groupRow]
        }
    }

    if (target.hasClass('no-search')) {
        options = {
            ...options,
            "searching": false
        }
    }

    options = {
        ...options,
        columnDefs: columnDefs
    }
    return target.DataTable({
        ...options,
        'order': [
            [1, 'asc']
        ]
    });
}
