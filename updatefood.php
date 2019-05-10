
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
                        
                        <button type="button" id="bt" style="margin-bottom:2em;" class="btn btn-success">&nbsp;Update&nbsp;&nbsp;</button>
                        
                    </div>
                </div>
            </div>
    <script>

            

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
                        var count=0;
                        var xmlString = "<hoteldishes></hoteldishes>";
                        var parser = new DOMParser();
                        var root = parser.parseFromString(xmlString, "text/xml"); 
                        var dishes = root.createElement("hotelinfo");
                    
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
                                    var td2 = $('<td><div class="checkbox"><label><input type="checkbox" id="id'+count+'"value=""></label></div></td>');
                                    tr.append(td1);
                                    tr.append(td2);
                                    table_body.append(tr);
                                    count+=1;


                                    //creating the xml file
                                    // add an edition element
                                    var newEle = root.createElement("dishes");

                                    var newText = xmlDoc.createTextNode("first");
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

                

                $('#bt').click(function () {
                    // alert("Sree")

                    for(let name of xmlDoc.getElementsByTagName("hotel")){

                        var count=0;
                        var hotel = root.createElement("hotel");
                        // root.appendChild(hotel)
                        // root.appendChild(hotel);
                        
                        hotel.setAttribute("id" , name.getAttribute('id'))
                            for(let dishes of name.getElementsByTagName("name")){

                                let item = root.createElement("item");
                                let hotel_name = root.createElement("name");
                                let avail = root.createElement("availability");
                                hotel_name.appendChild(root.createTextNode(dishes.childNodes[0].nodeValue));

                                if(name.getAttribute('id')==hotelname){

                                    // avail.createTextNode()
                                    if(document.getElementById('id'+count).checked)
                                        avail.appendChild(root.createTextNode("Yes"));
                                    else    
                                        avail.appendChild(root.createTextNode("No"));                               
                                }
                                else{
                                    console.log(name.getElementsByTagName("available")[0].childNodes[0].nodeValue);
                                    let available = name.getElementsByTagName("available")[0].childNodes[0].nodeValue;
                                    avail.appendChild(root.createTextNode(available));
                                }
                                item.appendChild(hotel_name);
                                item.appendChild(avail);
                                hotel.appendChild(item);
                                count+=1;
                            
                        }

                        dishes.appendChild(hotel);
                        
                    }
                    console.log(dishes);
                    var xmlText = new XMLSerializer().serializeToString(dishes);

                    var xhttp2 = new XMLHttpRequest();
                    xhttp2.onreadystatechange = function () {
                    if(xhttp2.readyState == 4 && xhttp2.status == 200){

                        alert("Successfully updated");

                        }
                    }
                    xhttp2.open("GET", "update.php?content="+xmlText , true);
                    xhttp2.send();
  
                    
                    
                });
                }

        </script>



    </body>




</html>
