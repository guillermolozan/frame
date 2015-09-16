(function($){
  $(function(){

    // var window_width = $(window).width();

    // // Floating-Fixed table of contents
    // if ($('nav').length) {
    //   $('.toc-wrapper').pushpin({ top: $('nav').height() });
    // }
    // else if ($('#index-banner').length) {
    //   $('.toc-wrapper').pushpin({ top: $('#index-banner').height() });
    // }
    // else {
    //   $('.toc-wrapper').pushpin({ top: 0 });
    // }



    // // Toggle Flow Text
    // var toggleFlowTextButton = $('#flow-toggle');
    // toggleFlowTextButton.click( function(){
    //   $('#flow-text-demo').children('p').each(function(){
    //       $(this).toggleClass('flow-text');
    //     });
    // });


    // Toggle Containers on page
    var toggleContainersButton = $('#container-toggle-button');
    toggleContainersButton.click(function(){
      $('body .browser-window .container, .had-container').each(function(){
        $(this).toggleClass('had-container');
        $(this).toggleClass('container');
        if ($(this).hasClass('container')) {
          toggleContainersButton.text("Turn off Containers");
        }
        else {
          toggleContainersButton.text("Turn on Containers");
        }
      });
    });

    // Detect touch screen and enable scrollbar if necessary
    function is_touch_device() {
      try {
        document.createEvent("TouchEvent");
        return true;
      } catch (e) {
        return false;
      }
    }
    if (is_touch_device()) {
      $('#nav-mobile').css({ overflow: 'auto'});
    }

    // Set checkbox on forms.html to indeterminate
    // var indeterminateCheckbox = document.getElementById('indeterminate-checkbox');
    // if (indeterminateCheckbox !== null)
    //   indeterminateCheckbox.indeterminate = true;

    // Plugin initialization
    $('.button-collapse').sideNav({'edge': 'left'});    
    // $('.slider').slider({full_width: true});
    $('.parallax').parallax();
    // $('.modal-trigger').leanModal();
    // $('.scrollspy').scrollSpy();    
    // $('.datepicker').pickadate({selectYears: 20});
    // $('select').not('.disabled').material_select();


  }); // end of document ready
})(jQuery); // end of jQuery name space