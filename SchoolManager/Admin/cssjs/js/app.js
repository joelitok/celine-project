// let p = null;
navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia ||navigator.mozGetUserMedia;
function bindEvents(p){

    p.on('error', function(err){
        console.log('error',err)
    })
    p.on('signal', function(data) {
       document.querySelector('#offer').textContent= JSON.stringify(data)
    })

    p.on('stream', function(stream) {
        
        let vid = document.querySelector('#receiver_vid')
            vid.volume = 0
            
            vid.srcObject = stream
        
            vid.play()
    })
    document.querySelector('#incoming').addEventListener('submit', function(e) {
        e.preventDefault()
        // if (p == null) {
        //     p = new SimplePeer({
        //         initiator:false,
        //         trickle: false
        //     })
        // }   
        p.signal(JSON.parse(e.target.querySelector('textarea').value))
        bindEvents(p)
    })
  }

  function startPeer(initiator) {
    navigator.getUserMedia({
        video: true,
        audio: true
    }, function (stream) {
      let p = new SimplePeer({
           initiator: initiator,
           stream : stream,
           trickle: false
       })
        bindEvents(p)
        let emitter_vid = document.querySelector('#emitter_vid')
        emitter_vid.volume = 0
        
        emitter_vid.srcObject = stream;
        //  window.URL.createObjectURL(stream)
        emitter_vid.play()
    }, function () {
        
    })
  }
window.onload=function(){




document.querySelector("#start").addEventListener('click', function(e) {
    
    startPeer(true);
})
document.querySelector("#receive").addEventListener('click', function(e) {
    
     startPeer(true);
})


 
    
}
