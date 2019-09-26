


$('body').on('click', '.all',function(e){
    e.preventDefault();
    $.ajax({
        url: '/product/filter-get-by-all',
        success: function (response) {
            $('#filter_result').html(response);
        },
        error: function () {
            swal('Упс!', 'Что-то пошло не так.', 'error');
        }
    });
});



$('body').on('click', '.manufacturer',function(e){
    var id = $(this).attr('data-id');
    e.preventDefault();
    $.ajax({
        url: '/product/filter-get-by-manufacturer',
        data: {id:id},
        type: 'GET',
        success: function (response) {
            $('#filter_result').html(response);
        },
        error: function () {
            swal('Упс!', 'Что-то пошло не так.', 'error');
        }
    });
});



$('body').on('click', '.category',function(e){
    var id = $(this).attr('data-id');
    e.preventDefault();
    $.ajax({
        url: '/product/filter-get-by-category',
        data: {id:id},
        type: 'GET',
        success: function (response) {
            $('#filter_result').html(response);
        },
        error: function () {
            swal('Упс!', 'Что-то пошло не так.', 'error');
        }
    });
});






$('body').on('click', '.sub-category',function(e){
    var id = $(this).attr('data-id');
    e.preventDefault();
    $.ajax({
        url: '/product/filter-get-by-sub-category',
        data: {id:id},
        type: 'GET',
        success: function (response) {
            $('#filter_result').html(response);
        },
        error: function () {
            swal('Упс!', 'Что-то пошло не так.', 'error');
        }
    });
});






$('body').on('change keyup', '.search',function(e){
    var text = $(this).val();
    e.preventDefault();
    $.ajax({
        url: '/product/filter-get-by-search',
        data: {text:text},
        type: 'GET',
        success: function (response) {
            $('#searchResult').html(response);
        },
        error: function () {
            swal('Упс!', 'Что-то пошло не так.', 'error');
        }
    });
});