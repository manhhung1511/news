$(document).on('click', '.pagination a', function (e) {
    e.preventDefault();
    let url = $(this).attr('href');
    let container = $(this).closest('.pagination').attr('to');
    getHtml(url, container);
    window.history.pushState({
        path: url
    }, '', url)
});

function getHtml(url, container) {
    $.ajax({
        async: true,
        url: url,
        success: function (data) {
            $(container).html(data);
        },
        error: function (data) {
            console.error(data);
        }
    });
}
