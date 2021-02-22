$(document).ready(function () {
	  
});

function get_data()
{
    var location_name= document.getElementById("loc").value;
    $.ajax({
        type: "post",
        url: "get_locations.php",
        data:{"location1":location_name},
        success: function (result) {


            var result=JSON.parse(result);
            if(result["err"]==404)
            {
                   document.getElementById("block2").innerHTML = "<h3>"+result["msg"]+"</h3>";  
                   document.getElementById("block2").style.display = "block";
                    document.getElementById("block1").style.display = "none";
            }
            else
            {
            document.getElementById("weather_icon").src = result["img"];
            document.getElementById("dat").innerHTML = result["dt"];
            document.getElementById("tmp").innerHTML = result["temp"]+"&degC";
            document.getElementById("loc2").innerHTML = result["location"];
            document.getElementById("col1").innerHTML="<h1>"+result["day1"]+"</h1><h3>Day:"+result["tempd1"]+"&degC<br>Night:"+result["tempn1"]+"&degC";
            document.getElementById("col2").innerHTML="<h1>"+result["day2"]+"</h1><h3>Day:"+result["tempd2"]+"&degC<br>Night:"+result["tempn2"]+"&degC";
            document.getElementById("col3").innerHTML="<h1>"+result["day3"]+"</h1><h3>Day:"+result["tempd3"]+"&degC<br>Night:"+result["tempn3"]+"&degC";
            document.getElementById("col4").innerHTML="<h1>"+result["day4"]+"</h1><h3>Day:"+result["tempd4"]+"&degC<br>Night:"+result["tempn4"]+"&degC";
            document.getElementById("col5").innerHTML="<h1>"+result["day5"]+"</h1><h3>Day:"+result["tempd5"]+"&degC<br>Night:"+result["tempn5"]+"&degC";
            document.getElementById("col6").innerHTML="<h1>"+result["day6"]+"</h1><h3>Day:"+result["tempd6"]+"&degC<br>Night:"+result["tempn6"]+"&degC";
            
            document.getElementById("block1").style.display = "block";
             document.getElementById("block2").style.display = "none";
            }
         
        }
    });

}