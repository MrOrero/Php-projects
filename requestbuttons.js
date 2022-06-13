var button = document.getElementById("AcceptButton");

button.addEventListener("click", function () {
        // console.log("clickd");
        var riderid = document.getElementById('riderid').innerHTML;
        //console.log(riderid);
        var userid = document.getElementById('userid').innerHTML;
        //console.log(userid);
        // var idpoints = {};
        // idpoints.riderid = riderid;
        // idpoints.userid = userid;
        // console.log(idpoints)


        $.ajax({
            url:"requestbutton.php",
            method:"post",
            data: { text1: riderid, text2: userid },
            success: function(res) {
                console.log(res)
            }
      })
    });
