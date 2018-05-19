module.exports = ()=>{

    // let options = [ 
    // // {selector: '#staggered-test', offset: 50, callback: function(el) { Materialize.toast("This is our ScrollFire Demo!", 1500 ); } }, 
    // // {selector: '#staggered-test', offset: 205, callback: function(el) { Materialize.toast("Please continue scrolling!", 1500 ); } }, 
    // // {selector: '#staggered-test', offset: 400, callback: function(el) { Materialize.showStaggeredList($(el)); } }, 
    // // {selector: '#image-test', offset: 500, callback: function(el) { Materialize.fadeInImage($(el)); } } 
    // {selector: '.block_gallery_products', offset: 50, callback: function(el) { console.log('vivir'); } }
    // ]; 
    Materialize.scrollFire([{selector: '.block_gallery_products', offset: 50, callback: (el)=> { console.log('vivir'); } }]);

}