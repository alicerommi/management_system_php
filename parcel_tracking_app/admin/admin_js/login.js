function LoginAdmin() {
  var user  = $("#username").val();
  var pass  = $("#password").val();

    $.post("admin_classes/login.php",
    {
      user:user,
      pass:pass
    },
    function(response,status){ // Required Callback Function
      if(response=="false"){
        alert("Invalid Credentials");
      }
      else if(response=="true"){
        window.location.replace("index.php");
      }
      else{
        alert(response);
      }
    });
 }
