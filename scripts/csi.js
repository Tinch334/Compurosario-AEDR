$(function () {
    var includes = $('[data-include]')
    $.each(includes, function () {
        var file = $(this).data('include')
      $(this).load(file)
    })
});

//To use: <div data-include="<path-to-file>.html"></div>