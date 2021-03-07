<html>
	<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Calculator</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	 
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
        

        
        
	</head>
    
	<body>
        
<style>
    .container {
       background-color: #9a9a9a;
    }
    
    .container3 {
       background-color: #e3e3e3;
        margin-top: 10px;
        margin-bottom: 10px;
        margin-right: 10px;
        margin-left: 10px;
    }
    
    h5 {
        text-align: center;
    }
            
    h1 {
       color: #000000;
    }
            
    h2 {
       color: #000000;
    }
            
    p {color: #2dbfff;}
            
            
</style>
        
        <!--This is the Top of the Page, 'Calculator'-->
        
        <div class="d-flex justify-content-center" style="margin-top: 10px">
            <h1>Calculator</h1>
        </div>
      
		
		<div class="container" style="margin-top: 10px">
        <div id="stylized" class="d-flex justify-content-center" style="margin-top: 10px"> 
            
            
            
            
	    <!-- Calculator form -->
<div id="stylized" class="d-flex justify-content-center" style="margin-top: 10px"> 
    <form method="post" action="Calculator_W3S1.php" >
	        <input name="number1" type="text" class="form-control" style="width: 150px; display: inline" />
	        <select name="operation">
	        	<option value="plus">Plus</option>
	            <option value="minus">Minus</option>
	            <option value="multiply">Multiply</option>
	            <option value="divided by">Divide</option>
	        </select>
	        <input name="number2" type="text" class="form-control" style="width: 150px; display: inline" />
            
    <br>
        <div id="submitdiv" class="d-flex justify-content-center" style="margin-top: 20px">
	        <input name="submit" type="submit" value="Calculate" class="btn btn-primary" />
        </div>
    </form>
</div>
        
	    
</div>
    
            
</div>
<!-- test note -->
        <div class="container2" style="margin-top: 20px">
            <div class="d-flex justify-content-center">
                <h5>Calculate Two Numbers with a Chosen Operator!</h5>
                
            </div>
        </div>
        
        
        

            <div class="d-flex justify-content-center" style="margin-top: 10px">
                <div class="card" style="width: 50rem;">
  <div class="card-body">
      <div class="d-flex justify-content-center">
            <p class="card-text">
<?php
		
		// If the submit button has been pressed
		if(isset($_POST['submit']))
		{
		// Check number values
		if(is_numeric($_POST['number1']) && is_numeric($_POST['number2']))
		{
		// Calculate total
		if($_POST['operation'] == 'plus')
		{
		$total = $_POST['number1'] + $_POST['number2'];	
		}
		if($_POST['operation'] == 'minus')
		{
		$total = $_POST['number1'] - $_POST['number2'];	
		}
		if($_POST['operation'] == 'multiply')
		{
		$total = $_POST['number1'] * $_POST['number2'];	
		}
		if($_POST['operation'] == 'divided by')
		{
		$total = $_POST['number1'] / $_POST['number2'];	
		}
		
        $serialized = serialize($total);
        file_put_contents('my-product.txt', $serialized);


		// Print total to the browser
		echo "<h5>{$_POST['number1']} {$_POST['operation']} {$_POST['number2']} equals = {$total}</h5>";


            $productFromFile = file_get_contents('my-product.txt', $total);
//        var_dump($productFromFile);
            $unserialisedProduct = unserialize($productFromFile);

            $testing = 'The Previous Calculation was: ' . $unserialisedProduct;
		} else {
		
		// Print error message to the browser
		echo 'Numeric values are required';
		
		}
		}
		// end PHP Code
		?>
                </p>
      </div>
                    </div>
                </div>

        </div>
<div class="container2" style="margin-top: 100px">
    <div class="d-flex justify-content-center">
        <h5>Previous Results</h5>
    </div>
        </div>
<div class="container2" style="margin-top: 10px">
    <div class="d-flex justify-content-center">
        
<div class="card" style="width: 50rem;">
  <div class="card-body">
    <h5 class="card-title"></h5>
      <div class="container2" style="margin-top: 0px">
    <div class="d-flex justify-content-center">
    <p class="card-text">
        
        
        <?php
        $dateTime = new DateTime();
        echo $dateTime->format("Y-m-d H:i:s");
        ?>
        <p></p>
        <div class="container3" style="margin-top: 0px">
            <div class="d-flex justify-content-center">
        <?php if (isset($testing)) : ?>
        <?= $testing ?>
        <?php endif ?>
        
        
        
                
                
                
                
                
   <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==" crossorigin="anonymous"></script> 
<!--
<script>
        //Axios
        axios.get('my-product.txt')
            .then(function(response) {
            console.log(response.data);
            
            if (response.data.length === 0) {
                $("<div>").text('No Calculations Available').appendTo('#unmade');
                return;
            }
            
            //Loop for each response
            //create DOM object
            //Build each data item into the DOM object
            //Append our DOM object to #unmade
            
            for (var i = 0; i < response.data; i++) {
                var calculationsEl = '<div>';
                
                var h3 = $('<h3>').text(response.data[i]).appendTo(calculationsEl);
                
                $('<p>').text(response.data[i]).appendTo(calculationsEl);
                
                $('#unmade').append(calculationsEl);
                
            }
        })
            .catch(function(error) {
                console.log(error);
        });
            
</script>
-->
                
        </div>
            
        </div>

  </div>
          
</div>
        
    </div>
    
</div>
 </div>
</div>
        
   <div id="unmade"></div>          

    <!-- Required meta tags -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

  </body>
</html>