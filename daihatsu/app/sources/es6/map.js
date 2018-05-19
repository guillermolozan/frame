module.exports = ()=>{
    // MAPS
    if($('#map').length > 0){

      let map;
      let dmap    =$("#map");
      
      let lat     = dmap.data('lat');
      let lon     = dmap.data('lon');
      let name    = dmap.data('name');
      
      // let icon =document.getElementsByTagName('base')[0].href+"public/img/gmap.png";
      let icon    =pub_img+"mapa03.png";

      map = new GMaps({
        div: '#map',
        lat: lat,
        lng: lon,
        mapTypeControl: true,
        disableDefaultUI: true,
        zoomControl: true,
        scrollwheel: false,
        draggable: true         
      });

      map.addMarker({
        lat: lat,
        lng: lon,
        title: name,
        icon: icon,      
        infoWindow: {
          content: name
        }
      });


      $(".showmap").each(function(){
          $(this).on("click", function(){

              let lat = $(this).data('lat');
              let lon = $(this).data('lon');
              let name = $(this).data('name');

              let map;
              // let dmap=$("#map");

              map = new GMaps({
              div: '#map',
              lat: lat,
              lng: lon,
              mapTypeControl: true,
              disableDefaultUI: true,
              zoomControl: true,
              scrollwheel: false,
              draggable: true
              });

              map.addMarker({
              lat: lat,
              lng: lon,
              title: name,
              icon: icon,
              infoWindow: {
                content: name
              }          
              });
              return false;

          });
      });      
    
    }

}

