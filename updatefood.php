
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Title</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

    </head>

    <body>

    <script>

            // $('#bt').click(function () {

                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function () {
                    if(xhttp.readyState == 4 && xhttp.status == 200){

                        parseXml(xhttp);

                    }
                }
                xhttp.open("GET", "dishes.xml", true);
                xhttp.send();
                function parseXml(response) {
                        var xmlDoc = response.responseXML;
                    
                        for(let name of xmlDoc.getElementsByTagName("hotel")){

                            //getting hotelname from get request
                            var hotelname = "<?php echo $_GET['name']?>";

                            // checking the hotelname
                            if(name.getAttribute('id')==hotelname)
                            {
                                for(let dishes of name.getElementsByTagName("name"))
                                {
                                    console.log(dishes.childNodes[0].nodeValue);
                                }
                            }
                        
                            // alert(hotelname);
                            // var username = name.getElementsByTagName("username")[0].childNodes[0].nodeValue;
                            // var password = name.getElementsByTagName("password")[0].childNodes[0].nodeValue;
                            // var name = name.getElementsByTagName("name")[0].childNodes[0].nodeValue;

                            // if(username == user && password == pass){
                            //     window.location.href = 'demo.php?name='+ name;
                            //     //console.log("found");
                            // }

                            // else{
                            //     $('#demo').html("Invalid credentials");
                            // }
                        }

                }


            // });

        </script>



    </body>




</html>
