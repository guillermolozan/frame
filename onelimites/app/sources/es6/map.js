module.exports = ()=>{
    // MAPS
    if($('#map').length > 0){

      let map;
      let dmap=$("#map");

      map = new GMaps({
        div: '#map',
        lat: dmap.data("lat"),
        lng: dmap.data("lon")
      });
      map.addMarker({
        lat: dmap.data("lat"),
        lng: dmap.data("lon"),
        title: dmap.data("name"),
        infoWindow: {
          content: dmap.data("text")
        }          
      });
    
    }

}

