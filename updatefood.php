
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Hotel | food</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

    </head>

    <body>
            <div class="jumbotron text-center">
                <h1>Foody</h1>
                <p>search your favourite food!</p>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-6">
                        
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Dishes</th>
                                    <th>Availability</th>
                                </tr>
                            </thead>
                            <tbody id="table_body">
                                
                            </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>
            
            
            
            
            

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
                            
                            //accessing the table body element
                            var table_body = $("#table_body");
                            // checking the hotelname
                            if(name.getAttribute('id')==hotelname)
                            {
                                for(let dishes of name.getElementsByTagName("name"))
                                {
                                    console.log(dishes.childNodes[0].nodeValue);
                                    //dynamically adding rows
                                    var tr = $('<tr></tr>');
                                    var td1 = $('<td>'+dishes.childNodes[0].nodeValue+'</td>');
                                    var td2 = $('<td><div class="checkbox"><label><input type="checkbox" value=""></label></div></td>');
                                    tr.append(td1);
                                    tr.append(td2);
                                    table_body.append(tr);
                                    // var td =  $('<tr>'+name.getElementsByTagName("availabiliy"))

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
