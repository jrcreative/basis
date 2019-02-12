let slider = jQuery('.column-types .acf-range-wrap > input:last-child');

slider.each(function(){
  console.log(this.value);
  columnWidth(this.value, jQuery(this).parents('.acf-fields'));
});

jQuery(document).on('change', '.column-types .acf-range-wrap > input:first-child', (function() {
  columnWidth(this.value, jQuery(this).parents('.acf-fields'))
}));


function columnWidth(width, container){
    let col1 = container.children('.admin-section-column-1');
    let col2 = container.children('.admin-section-column-2');
    let col3 = container.children('.admin-section-column-3');
    let col4 = container.children('.admin-section-column-4');

    function columnClasses(index, className) {
        let classmatch = className.match(/(^|\s)col-md-\S+/g) || [];
        return classmatch.join(' ');
    }

    col1.removeClass(columnClasses);
    col2.removeClass(columnClasses);
    col3.removeClass(columnClasses);
    col4.removeClass(columnClasses);

    switch (width) {
        case '10' :
            col1.addClass('col-md-12');
            col1.attr('data-width', '100');
            break;
        case '20' :
            col1.addClass('col-md-6');
            col1.attr('data-width', '50');
            col2.addClass('col-md-6');
            col2.attr('data-width', '50');
            break;
        case '30' :
            col1.addClass('col-md-3');
            col1.attr('data-width', '33');
            col2.addClass('col-md-9');
            col2.attr('data-width', '67');
            break;
        case '40' :
            col1.addClass('col-md-9');
            col1.attr('data-width', '67');
            col2.addClass('col-md-3');
            col2.attr('data-width', '33');
            break;
        case '50' :
            col1.addClass('col-md-4');
            col1.attr('data-width', '33');
            col2.addClass('col-md-4');
            col2.attr('data-width', '33');
            col3.addClass('col-md-4');
            col3.attr('data-width', '33');
            break;
        case '60' :
            col1.addClass('col-md-6');
            col1.attr('data-width', '50');
            col2.addClass('col-md-3');
            col2.attr('data-width', '25');
            col3.addClass('col-md-3');
            col3.attr('data-width', '25');
            break;
        case '70' :
            col1.addClass('col-md-3');
            col1.attr('data-width', '25');
            col2.addClass('col-md-3');
            col2.attr('data-width', '25');
            col3.addClass('col-md-6');
            col3.attr('data-width', '50');
            break;
        case '80' :
            col1.addClass('col-md-3');
            col1.attr('data-width', '25');
            col2.addClass('col-md-6');
            col2.attr('data-width', '50');
            col3.addClass('col-md-3');
            col3.attr('data-width', '25');
            break;
        case '90' :
            col1.addClass('col-md-3');
            col1.attr('data-width', '25');
            col2.addClass('col-md-3');
            col2.attr('data-width', '25');
            col3.addClass('col-md-3');
            col3.attr('data-width', '25');
            col4.addClass('col-md-3');
            col4.attr('data-width', '25');
            break;
        default :
    }
}

jQuery('.column-types .acf-label').html('' +
    '<div class="d-flex">' +
    '<div><i class="basi icon-12"></i></div>' +
    '<div><i class="basi icon-66"></i></div>' +
    '<div><i class="basi icon-48"></i></div>' +
    '<div><i class="basi icon-84"></i></div>' +
    '<div><i class="basi icon-444"></i></div>' +
    '<div><i class="basi icon-633"></i></div>' +
    '<div><i class="basi icon-336"></i></div>' +
    '<div><i class="basi icon-363"></i></div>' +
    '<div><i class="basi icon-3333"></i></div>' +
    '</div>');
