<?php
// get username
$user = $_GET['u'];
?>

<html>
<head>
<title>Unreal War Chat</title>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link href="https://fonts.googleapis.com/css?family=Permanent+Marker" rel="stylesheet"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="css/bootstrap.css"/>

        <link rel="stylesheet" href="css/styles.css"/>

 <link href="https://fonts.googleapis.com/css?family=Creepster|VT323" rel="stylesheet"/>
<script src="js/jquery-3.2.0.min.js"></script>
<script src="js/Chat.js"></script>
</head>
<body>

<div class="container panel panel-default">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <img  id="logo" class="img-responsive center-block" src="img/logo.png" alt="CompanyLogo"></img>
                    </div>
                </div>
                <div class="row">
                    <div class=" col-md-6 col-md-offset-3 col-xs-6 col-xs-offset-3">

<div class='chatContainer'>
<div class='chatHeader'>
<h3>Welcome <?php echo ucwords($user); ?></h3>
</div>
<div class='chatMessages'>
<?php
//getting these lousy messages
$db = new PDO("mysql:host=localhost;dbname=swimmin2_Chat","swimmin2_root","none123");


//get messages
$query = $db->prepare("SELECT * FROM messages");
$query->execute();

//fetch
while($fetch = $query->fetch(PDO::FETCH_ASSOC))
{
	$name = $fetch['name'];
	$message = $fetch['message'];
	
	echo "<li class='cm'><b>".ucwords($name)."</b> - ".$message."</li>";
}
?>
</div>
<div class='chatBottom'>
<form action='#' onSubmit='return false;' id='chatForm'>
<input type='hidden' id='name' value='<?php echo $user; ?>'/>
<input type='text' name='text' id='text' value='' placeholder='type your chat message' />
<input type='submit' name='submit' value='Post' />
</form>

</div>
</div>
</div>
</div> <!-- row closing for below logo content -->

<footer  class="text-center" style="margin-top:15px;">
                    <div class="panel-footer row">
                        <div class="col-xs-12">
                            <p class="footer"> Copyright © Unreal War. All rights reserved.</p>
                        </div>
                    </div>
                    
                </footer>
</div> <!-- panel closing div -->
</body>
</html>