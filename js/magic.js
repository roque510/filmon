function startTime() {
         
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
  // if s%50 and m%5 
  if (m%2 == 0 && s == 40) {    
    updateSourceAnuncio();
  };
  if (m%5 == 0 && s == 50) {
    var vencido = document.getElementById('vencido');
    

        if (vencido === null){

        }
        else{
         location.href = "/membresia/index.php";
        }
    
  };
    
    
    var t = setTimeout(startTime, 500);


}
function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
}

function playing(){

var audioa = document.getElementById('anuncio');
var miembro = document.getElementById('miembro');
if (audioa === null){

}else{
  audioa.play();  
}

if (miembro === null){

}else{
  miembro.play();  
}


  
}



 function updateSource(sorz) {
  changech(sorz);
playing();
var type = "application/x-mpegurl";
var subs = "subsa.vtt";
var $_GET = {};

document.location.search.replace(/\??(?:([^=]+)=([^&]*)&?)/g, function () {
    function decode(s) {
        return decodeURIComponent(s.split("+").join(" "));
    }

    $_GET[decode(arguments[1])] = decode(arguments[2]);
});

if (typeof $_GET['vid'] != 'undefined') {
 if($_GET['vid'] == 'peli'){
    
    $('#elframe').attr('src',sorz);

 }
  
else{
  var api = flowplayer(0);
api.conf.embed = false;
api.conf.fullscreen = false;
api.conf.title = 'sdfsdf';
  type = 'application/x-mpegurl';
  subs = "subsa.vtt";
  api.load({
  subtitles: [
            { "default": true, // note the quotes around "default"!
              kind: "subtitles", srclang: "en", label: "English",
              src:  "subs/".subs }
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

}
else
{
  var api = flowplayer(0);
api.conf.embed = false;
api.conf.fullscreen = false;
api.conf.title = 'sdfsdf';
  api.load({
  subtitles: [
            { "default": true, // note the quotes around "default"!
              kind: "subtitles", srclang: "en", label: "English",
              src:  "subs/".subs }
        ],
  title: "Musicon",
  sources: [
    { type: type,
      src:  sorz }
  ]
}).on("finish", function () {
api.play(0);
   
 
  });
}




        
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

function infomem(){
  swal({   title: "Atencion",   text: "Recuerda iniciar sesion primero y luego ir a la pestaña de paquetes para actualizar tu membresia!" ,   type: "warning",   showCancelButton: false,   confirmButtonColor: "#4db6ac",   confirmButtonText: "Continuar",   cancelButtonText: "No, regresar al inicio",   closeOnConfirm: true,   closeOnCancel: true }, function(isConfirm){   if (isConfirm) {
                   window.open('/membresia/index.php', '_blank');
                   
                    } 
                    });
  
}

 function updateSourceAnuncio() { 
  
        var sorz;
        var sorzm;

        var canciones = ["ads/estasconmusicon.mp3","ads/estasconmusicon.mp3","ads/estasconmusicon.mp3","ads/estasconmusicon.mp3","ads/estasconmusicon.mp3","ads/estasconmusicon.mp3","ads/estasconmusicon.mp3","ads/estasconmusicon.mp3","ads/estasconmusicon.mp3","ads/estasconmusicon.mp3"] ;
        var cancionesm = ["ads/miembro.mp3","ads/estasconmusicon.mp3","ads/estasconmusicon.mp3","ads/estasconmusicon.mp3","ads/estasconmusicon.mp3","ads/estasconmusicon.mp3","ads/estasconmusicon.mp3","ads/estasconmusicon.mp3","ads/estasconmusicon.mp3","ads/estasconmusicon.mp3"] ;
  
        canciones = shuffle(canciones);

        sorz = canciones[0];
        sorzm = cancionesm[0];

        var audio = document.getElementById('anuncio');
        var miembro = document.getElementById('miembro');

        if (miembro === null){
          

        }
        else{
          var source = document.getElementById('sourceB');
          source.src=sorzm;

          miembro.load(); //call this to just preload the audio without playing
          miembro.play(); //call this to play the song right away 
        }

        if (audio === null){

          }
          else{
            var source = document.getElementById('sourceB');
            source.src=sorz;

            audio.load(); //call this to just preload the audio without playing
            audio.play(); //call this to play the song right away 
          }

        

        
    }    

var chplus = $("#chplus");
var chminus = $("#chminus");

chplus.on('click',function(e){
    e.preventDefault();
var fd = new FormData();    
fd.append( 'url', chplus.attr("ch-url") );
fd.append( 'id', chplus.attr("ch-id") );

            $.ajax({            
            url: 'getchplus.php',
            data: fd,
            dataType: "json",
            processData: false,
            contentType: false,
            type: 'POST',         
            success: function (data) {
              if(data.response == "correcto"){
                $("#img").attr("src",data.foto);
                $("#nombre").html(data.nombre);                              
                chplus.attr("ch-id",data.newid);
                chplus.attr("ch-url",data.newurl);
                chminus.attr("ch-id",data.newid);
                chminus.attr("ch-url",data.newurl);
                
              }
              else {
                alert(data.comment);
              }
            }
          });


  
});



chminus.on('click',function(e){
    e.preventDefault();
var fd = new FormData();    
fd.append( 'url', chplus.attr("ch-url") );
fd.append( 'id', chplus.attr("ch-id") );

            $.ajax({            
            url: 'getchminus.php',
            data: fd,
            dataType: "json",
            processData: false,
            contentType: false,
            type: 'POST',         
            success: function (data) {
              if(data.response == "correcto"){
                $("#img").attr("src",data.foto);
                $("#nombre").html(data.nombre);                              
                chplus.attr("ch-id",data.newid);
                chplus.attr("ch-url",data.newurl);
                chminus.attr("ch-id",data.newid);
                chminus.attr("ch-url",data.newurl);
                
              }
              else {
                alert(data.comment);
              }
            }
          });


  
});

function changech(sorz){

var fd = new FormData();    
fd.append( 'url', sorz );

  $.ajax({ url: 'getch.php',
         data: {url: sorz},
         dataType: "json",
         type: 'post',
         success: function(data) {
              if(data.response == "correcto"){
                $("#img").attr("src",data.foto);
                $("#nombre").html(data.nombre);
                $("#nombrePLAY").html(data.nombre);                              
                chplus.attr("ch-id",data.newid);
                chplus.attr("ch-url",data.newurl);
                chminus.attr("ch-id",data.newid);
                chminus.attr("ch-url",data.newurl);
                
              }
              else {
                alert(data.response);
              }
                  }
});


}

$("#play").on('click',function(){

 $("#nombrePLAY").html($("#nombre").html()); 
 updateSource($("#chminus").attr("ch-url"));
});
