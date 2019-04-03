/*

var CodigoP = {

    initialize: function($wrapper) {
        this.$wrapper = $wrapper;
        this.$wrapper.find('.js-delete-codigoP').on(
            'click',
            this.handleCodigoPDelete
        );
    },

    handleCodigoPDelete: function(e) {
        e.preventDefault();

        $(this).addClass('text-danger');

        $(this).find('.fas')
        .removeClass('fa-skull-crossbones')
            .addClass('fa-spinner')
            .addClass('fa-spin');

        var $row = $(this).closest('tr');
        var deleteUrl = $(this).data('url');
        
        $.ajax({
            url: deleteUrl,
            method: 'DELETE',
            success: function() {
                $row.fadeOut();
            }
        });
    },

};

*/

$(document).ready(function() {

    var $table = $('.js-palets-table');
    // CodigoP.initialize($table);

    // var $table = $('.js-sessions-table');

    $table.find('.js-palet-delete').on('click', function(e) {
        e.preventDefault();

        $(this).addClass('text-danger');
        $(this).find('.fas')
            .removeClass('fa-skull-crossbones')
            .addClass('fa-spinner')
            .addClass('fa-spin');   
        
        var $row = $(this).closest('tr');
        var deleteUrl = $(this).data('url');
        
        $.ajax({
            url: deleteUrl,
            method: 'DELETE',
            success: function() {
                $row.fadeOut();
            }
        });
    });
  
//    */

});   




