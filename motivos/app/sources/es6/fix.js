module.exports = ()=>{

  // Detect touch screen and enable scrollbar if necessary
  let is_touch_device = ()=> {
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


  /*
  var windowsize = $(window).width();

  $(window).resize(function() {
    var windowsize = $(window).width();
  });

  if (windowsize > 600) {

    console.log('mayor de 600');

  }
  */

        
}
