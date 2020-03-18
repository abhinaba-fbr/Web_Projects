function initMap(){
    let Map=new google.maps.Map(document.querySelector(".the-map"),{
        center: {lat: 0,lng: 0},
        zoom: 10
    });
    let marker=new google.maps.Marker({
        position: {lat: 0,lng: 0},
        map: Map
    });
}
