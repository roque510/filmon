


var musica = document.getElementById("musica");



      function startTime() {
         
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
  // if s%50 and m%5 
  if (m%5 == 0 && s == 40) {
    musica.volume=.2;
    updateSourceAnuncio();
  };
  if (m%5 == 0 && s == 50) {
    musica.volume=1;
  };
    
    document.getElementById('txt').innerHTML =
    h + ":" + m + ":" + s;
    var t = setTimeout(startTime, 500);


}
function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
}

function playing(){
var audio = document.getElementById('musica');
var audioa = document.getElementById('anuncio');
audio.play();
audioa.play();
  
}

 function updateSource(sorz,tittle) {
var api = flowplayer(0);
api.conf.embed = false;
api.conf.fullscreen = false;
api.conf.title = 'sdfsdf';
var type = "application/x-mpegurl";
var $_GET = {};

document.location.search.replace(/\??(?:([^=]+)=([^&]*)&?)/g, function () {
    function decode(s) {
        return decodeURIComponent(s.split("+").join(" "));
    }

    $_GET[decode(arguments[1])] = decode(arguments[2]);
});

if (typeof $_GET['vid'] != 'undefined') {
 if( $_GET['vid'] == 'peli')
  type = "video/mp4";
else
  type = 'application/x-mpegurl';

}

api.load({
  subtitles: [
            { "default": true, // note the quotes around "default"!
              kind: "subtitles", srclang: "en", label: "English",
              src:  "subs/substest.vtt" }
        ],
  title: "Musicon",
  sources: [
    { type: type,
      src:  sorz }
  ]
}).on("finish", function () {
 updateSourceAnuncio();
   
 
  });


        
    }

 

    function shuffle(array) {
  var currentIndex = array.length, temporaryValue, randomIndex ;

  // While there remain elements to shuffle...
  while (0 !== currentIndex) {

    // Pick a remaining element...
    randomIndex = Math.floor(Math.random() * currentIndex);
    currentIndex -= 1;

    // And swap it with the current element.
    temporaryValue = array[currentIndex];
    array[currentIndex] = array[randomIndex];
    array[randomIndex] = temporaryValue;
  }

  return array;
}

 function updateSourceAnuncio() { 
  
       alert('ddda');
    }    