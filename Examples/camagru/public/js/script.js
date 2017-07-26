(function() {



    var streaming = false,
        video        = document.querySelector('#video'),
        cover        = document.querySelector('#cover'),
        canvas       = document.querySelector('#canvas'),
        photo        = document.querySelector('#photo'),
        startbutton  = document.querySelector('#startbutton'),
        width = 480;
    height = 383;
    navigator.getMedia = ( navigator.getUserMedia ||
    navigator.webkitGetUserMedia ||
    navigator.mozGetUserMedia ||
    navigator.msGetUserMedia);

    navigator.getMedia(
        {
            video: true,
            audio: false
        },
        function(stream) {
            if (navigator.mozGetUserMedia) {
                video.mozSrcObject = stream;
            } else {
                var vendorURL = window.URL || window.webkitURL;
                video.src = vendorURL.createObjectURL(stream);
            }
            video.play();
        },
        function(err) {
            console.log("An error occured! " + err);
        }
    );

    video.addEventListener('canplay', function(ev)
        {
            if (!streaming)
            {
                height = video.videoHeight / (video.videoWidth/width);
                streaming = true;
            }
        }
        , false);

    function takepicture()
    {
        canvas.width = width;
        canvas.height = height;
        canvas.getContext('2d').drawImage(video, 0, 0, width, height);
        var data = canvas.toDataURL('image/png');
        var xhr = new XMLHttpRequest();
        var m = 0;
        for (i=0;i<6;i++) {
            if (document.forms.choix.rad[i].checked==true) {
                m=i;
                console.log(m+1);
                break;
            }
        }
        xhr.open('POST', '../pages/tools/photo_post.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send('data=' + data + '&stick=' + (m+1));
        console.log(m+1);
    }



    startbutton.addEventListener('click', function(ev)
    {
        ev.preventDefault();
        takepicture();

    }, false);

})();
