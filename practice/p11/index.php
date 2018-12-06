<!DOCTYPE html>
<html>
    <head>
        
        
        
    </head>
    <body>
        <iframe width="1280" height="720" src="https://www.youtube.com/embed/De8clPAttbg" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    
    <div class = "container" style="margin-top:35px">
        <div class="ratings">
            <input type='radio' name='star' id='rating' value='1'>
            <input type='radio' name='star' id='rating' value='2'>
            <input type='radio' name='star' id='rating' value='3'>
            <input type='radio' name='star' id='rating' value='4'>
            <input type='radio' name='star' id='rating' value='5'>
        </div>
        <br>
        <span class='info'></span>
    </div>
    
    <script>
        $('#rating').click(function() {
            $.ajax({
               type: "GET",
               url: "addRating.php",
               data: {"rating": $("input[name='star']:checked").val() },
               success:function(data, status) {
                   var v = $("input[name='star']:checked").val();
                   alert("Collected a rating of " + v);
               },
               complete:function(data, status) {
                   alert("Thanks for rating the video!");
                   $(".ratings").attr('disabled','disabled');
                   
               }
            });
        });

        // https://harperlibrary.typepad.com/.a/6a0105368f4fef970b01b8d23770d8970c-popup
    </script>
    
    </body>
</html>