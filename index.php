<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Admin</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
   </head>
   <body>
      <div class="preview">
      </div>
      <div class="container main-div mt-0 mb-5" style="border-radius:10px;border:1px solid grey; background:white;padding-top:0!importnt;margin-top:0px!important;">
         <div class="container mt-5">
            <form class="" id="add_form"  method="post" enctype="multipart/form-data">
               <div class="form-group">
                  <div class="row">
                     <div class="col-md-3">
                        <label for="">Image<span id="red">* </span>:</label>
                     </div>
                     <div class="col-md-4 image_div_col" style="height:100px;">
                        <div class="image_preview_div">
                           <img id="img1" src="survey/webimg/profile.png" alt="">
                           <label for="profile_img"><i style="font-size:70px;" class="fa fa-camera" aria-hidden="true"></i></label>
                           <input type="file" id="profile_img" data-id="img1" style="opacity: 0; width: 0;"
                              accept=".png, .jpg, .jpeg" id="sel-file1" class="form-control-file border file1"
                              name="story_image" required>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="line-all"></div>
               <center><button type="submit" id="submit" required class="btn btn-grad sub-btn pl-4 pr-4 pt-2 pb-2 mb-3" name="button">Create</button></center>
            </form>
         </div>
      </div>
      <script type="text/javascript">
         function preview() {
         
             $('.preview').html(
                 `
         <style>
         .image_preview{
         position: fixed;
         top: 50%;
         left: 50%;
         transform:translate(-50%,-50%);
         height: 100vh;
         width: 100vw;
         background: rgba(0,0,0,.9);
         box-shadow: 0px 0px 5px 1px lightgray;
         border-radius: 10px;
         z-index: 9999999999;
         overflow: hidden;
         display: none;
         }
         .image_preview div{
         height: 100%;
         width: 100%;
         position: relative;
         margin:auto;
         overflow-y:auto;
         
         }
         .image_preview img{
         width: 50%;
         height: auto;
         position: absolute;
         top: 20px;
         left:50%;
         transform:translatex(-50%);
         z-index: 999999999;
         }
         .image_preview p{
          position:fixed;
          top:30px;
          right:30px;
         display:flex;
         align-items:center;
         justify-content:center;
         height:50px;
         width:50px;
         background: rgb(255,255,255);
         border-radius:50%;
         text-align: center;
         color: #000;
         font-size: 25px;
         transition: .3s;
         cursor: pointer;
         z-index: 9999999999;
         }
         img{
         cursor: pointer;
         }
         .image_preview p:hover{
         background: #e8524a;
         transition: .3s;
         }
         @media only screen and (max-width:700px){
           .image_preview img{
         width: 90%;
         top:80px;
         height: auto;
         position: absolute;
         
         }
         }
         </style>
         
         <div class="image_preview">
         <div class="">
         <p id="preview_cancel">x</p>
         <img src="complain_img/Screenshot (2)_0412022140228.png" alt="">
         </div>
         </div>
         `
             );
             $(document).on('click', '#add_form img', function() {
                 var src = $(this).attr('src');
                 $('.image_preview img').attr('src', src);
                 $('.image_preview').css('display', 'block');
             })
             $(document).on('click', '#preview_cancel', function() {
                 $('.image_preview').css('display', 'none');
             })
         }
         preview();
         $(document).on('change', 'input[type=file]', function(event) {
             var id = $(this).attr('data-id');
             var img = document.getElementById(`${id}`);
             var reader = new FileReader();
             reader.onload = function() {
                 img.src = reader.result;
             };
             reader.readAsDataURL(event.target.files[0]);
         })
      </script>
   </body>
</html>
