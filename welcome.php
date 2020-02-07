<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>EndGame</title>
    <meta name="author" content="EndGame">
    <meta content="Endgame Data" />

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/dataTables.bootstrap.css" rel="stylesheet">
    <link href="css/tech.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.js"></script>
</head>
<body>
    <div class="page-header">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h1>
    </div>
    <p>
       
        <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
    </p>
    <form action="https://script.google.com/macros/s/AKfycbwmVHnNPNGzAjCG4JENQXI1UDHkR1m-OLUzreaMX6REb-uidCub/exec" id="form" method="post">
        Upload a file
        <div id="data"></div>
        <input name="file" id="uploadfile" type="file">
        <input id="submit" type="submit">
    </form>
 
    <div class="container-fluid">
      <center><h2>EndGame</h2></center>
      <marquee id = "crisis" behavior="scroll" scrollamount="5" scrolldelay="10" onmouseover="stop()" onmouseout="start()">CRISIS: World Trade Center Collapsed</marquee>

      

      <p>Here is the data related to your company</p>


      <div id='table-container' ></div>

    </div><!-- /.container -->

    <footer class='footer'>
      <div class='container-fluid'>
        <hr />
      
      </div>
    </footer>

   
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.csv.min.js"></script>
    <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="js/dataTables.bootstrap.js"></script>
    <script type="text/javascript" src="js/csv_to_html_table.js"></script>


    <script type="text/javascript">

      function format_link(link){
        if (link)
          return "<a href='" + link + "' target='_blank'>" + link + "</a>";
        else
          return "";
      }

      CsvToHtmlTable.init({
        csv_path: 'data/<?php echo htmlspecialchars($_SESSION["username"]); ?>.csv',
        element: 'table-container', 
        allow_download: true,
        csv_options: {separator: ',', delimiter: '"'},
        datatables_options: {"paging": false},
        custom_formatting: [[4, format_link]]
      });
    </script>
       <script>
    $('#uploadfile').on("change", function() {
        var file = this.files[0];
        var fr = new FileReader();
        fr.fileName = file.name;
        fr.onload = function(e) {
            e.target.result
            html = '<input type="hidden" name="data" value="' + e.target.result.replace(/^.*,/, '') + '" >';
            html += '<input type="hidden" name="mimetype" value="' + e.target.result.match(/^.*(?=;)/)[0] + '" >';
            html += '<input type="hidden" name="filename" value="' + e.target.fileName + '" >';
            $("#data").empty().append(html);
        }
        fr.readAsDataURL(file);
    });
    </script>
</body>
</html>