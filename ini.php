<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>How to upload a file using Dropzone.js with PHP</title>
      <link rel="stylesheet" href="dist/min/dropzone.min.css" type="text/css" />

</head>
<body >
      <div class="container" >
            <div class='content'>
                  <form action="process.php" class="dropzone" id="dropzonewidget"></form>
            </div>
      </div>
      
      
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

      <!-- <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>  -->
      <script src="dist/min/dropzone.min.js"></script> 
      <script type="text/javascript">

        Dropzone.autoDiscover = false;
        $('.dropzone').dropzone({
            addRemoveLinks: true,
            removedfile: function(file){
                  var name = file.name;
                  $.ajax({
                        type: 'post',
                        url:'process.php',
                        data:{name: name , request:2},
                        success: function(response){
                              console.log('success:' + response);
                        }

                  });
                  var _ref;
                  return(_ref = file.previewElement) != null ? 
                  _ref.parentNode.removeChild(file.previewElement): void 0;
            }
        }) ;

      </script>
</body>
</html>