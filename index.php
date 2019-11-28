<!doctype html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

    <!-- CSS -->
    <style>
    #my_camera{
        width: 320px;
        height: 240px;
        border: 1px solid black;
    }
    #my_camera2{
        width: 320px;
        height: 240px;
        border: 1px solid black;
        position: relative;
        left: 22%;
    }
    #myModal{
        width: 100%;
        margin: auto;
    }
    </style>
<input id="fileInput" type="button" style="display:none;" />

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<!-- Trigger the modal with a button -->
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Upload Avatar</button>

<!-- Modal -->
<div id="myModal" class="modal fade modal-md" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Upload Avatar</h4>
      </div>
      <div class="modal-body">
        <p>What would you like to do?</p>
        <div id="my_camera2"></div>
      </div>
      <div class="modal-footer center">
        <input type=button class="btn btn-default btn-sm" value="Access Camera" onClick="configure()">
        <input type=button class="btn btn-default btn-sm" value="Take Snapshot" onClick="take_snapshot()">
        <!-- <input type=button class="btn btn-default" value="Save Snapshot" onClick="saveSnap()"> -->
        <input type="button" id="filesOption" class="btn btn-default btn-sm" value="Choose Files" data-dismiss="modal" onfocus="document.getElementById('fileInput').type='file'" onclick="document.getElementById('fileInput').click();" />
        
        <input type=button class="btn btn-default btn-sm" value="Close" onClick="closeModal()">
        <!-- <button type="button" class="btn btn-default btn-sm" onclick="closeMe()">Close</button> -->
      </div>
    </div>

  </div>
</div>
    <div id="my_camera"></div>
    <!-- <input type=button value="Configure" onClick="configure()">
    <input type=button value="Take Snapshot" onClick="take_snapshot()">
    <input type=button value="Save Snapshot" onClick="saveSnap()"> -->
    
    <div id="results"></div>
    
    <!-- Script -->
    <script type="text/javascript" src="webcamjs/webcam.min.js"></script>

    <!-- Code to handle taking the snapshot and displaying it locally -->
    <script language="JavaScript">
        // Configure a few settings and attach camera
        function configure(){
            Webcam.set({
                width: 320,
                height: 240,
                image_format: 'jpeg',
                jpeg_quality: 90
            });
            // Webcam.attach( '#my_camera' );
            Webcam.attach( '#my_camera2' );
            $("#filesOption").attr("disabled", true);
        }
        // A button for taking snaps
    
        // preload shutter audio clip
        var shutter = new Audio();
        shutter.autoplay = false;
        shutter.src = navigator.userAgent.match(/Firefox/) ? 'shutter.ogg' : 'shutter.mp3';

        function take_snapshot() {
            // play sound effect
            shutter.play();

            // take snapshot and get image data
            Webcam.snap( function(data_uri) {
                // display results in page
                // document.getElementById('results').innerHTML = 
                document.getElementById('my_camera').innerHTML = 
                    '<img id="imageprev" src="'+data_uri+'"/>';
            } );

            Webcam.reset();
            $('#myModal').modal('hide');
        }
        function closeModal() {
            // $("#filesOption").attr("disabled", false);
            // $('#filesOption').prop('disabled', false);
            $('#filesOption').removeAttr("disabled");
            $('#myModal').modal('hide');
        }
        // function saveSnap(){
        //     // Get base64 value from <img id='imageprev'> source
        //     var base64image =  document.getElementById("imageprev").src;

        //      Webcam.upload( base64image, 'upload.php', function(code, text) {
        //          console.log('Save successfully');
        //     });

        // }
    </script>
    
</body>
</html>

