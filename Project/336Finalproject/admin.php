

<?php
include 'functions.php';
include 'display.php';


session_start();


include '../../inc/dbConnection.php';
$dbConn = startConnection("ottermart");

//validateSession();

?>

<!DOCTYPE html>
<html>
 <head>
     

        <title> Admin Main Page </title>
        <style>
            form {
                display: inline-block;
            }
        </style>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" type="text/css" />
                <link rel="stylesheet" href="css/styles.css" type="text/css" />

        <script>
        
            function confirmDelete() {
                
                //alert();
                //prompt();
                return confirm("Really??");
                
            }
            
            function openModal() {
                
                $('#myModal').modal("show");
            }
            
            
        </script>
    
    </head>
    <body>
        
        <h1> Admin Section - Zama's Play Store </h1>
        
         <h3>Welcome <?= $_SESSION['adminFullName'] ?> </h3>

          <form action="addProduct.php">
              <input type="submit" value="Add New Product">
          </form>
          
          <div id = "TotalAmountDb">
              
              
          </div>
          <br><input id = "FetchTotalAmount" type = "button" value = "Fetch Total amount">
          
          
          
          <div id = "TotalPriceDb">
              
              
          </div>
          <br><input id = "FetchTotalPrice" type = "button" value = "Fetch Total Price">
          
          
          <div id = "AveragePriceDb">
              
              
          </div>
          <br><input id = "FetchAveragePriceDb" type = "button" value = "Calculate Average Price">
          
          
          
          
          
          
          
          
         <br><br> <form action="logout.php">
              <input type="submit" class = "btn btn-danger" value="Logout" >
          </form>

           <br><br>
        
        <?= displayAllProducts() ?>
        
        
        
        
        <!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Product Info</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <iframe name="productModal" width="450" height="250"></iframe>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>    
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        
    </body>
</html>

<script>
    $("document").ready(function(){
        $("#FetchTotalAmount").click(function() {
            // alert("someone help");
                    $.ajax({
                        url: "TotalAmountDb.php",
                        datatype: "json",
                        success: function(data, status) {
                         //alert(data);
                            var obj = JSON.parse(data); // parse our json data into javascript values
                            $("#TotalAmountDb").html(obj.count);
                        
                        }
                    }); //ajax
    }); // find avg click
    
    $("#FetchTotalPrice").click(function() {
            // alert("someone help");
                    $.ajax({
                        url: "TotalPriceDb.php",
                        datatype: "json",
                        success: function(data, status) {
                        //  alert(data);
                         
                            var obj = JSON.parse(data); // parse our json data into javascript values
                            //alert(obj.sum);
                            // $("#TotalPriceDb").html(obj.sum);
                            $("#TotalPriceDb").html("$" + obj.sum);
                        
                        }
                    }); //ajax
                 }); // find avg click
                 
                 
                 
                 $("#FetchAveragePriceDb").click(function() {
            // alert("someone help");
                    $.ajax({
                        url: "AveragePriceDb.php",
                        datatype: "json",
                        success: function(data, status) {
                         //alert(data);
                            var obj = JSON.parse(data); // parse our json data into javascript values
                            $("#AveragePriceDb").html("$" + obj.avg);
                        
                        }
                    }); //ajax
    }); // find avg click
    
    
    
    
    
    
    
    
    
    
    
    });
    
    
    
</script>