//Recordar credenciales G.G//
$(".btn-secondary").click(function () {
    if ($("#remember").prop("checked")) {
        console.log( $("#login-email").val());
      localStorage.setItem("remember", true);
      localStorage.setItem("login-email", $("#login-email").val());
      localStorage.setItem("login-password", $("#login-password").val());
    } else {
      localStorage.removeItem("login-email");
      localStorage.removeItem("login-password");
      localStorage.setItem("remember", false);
    }
  });
  
  if (localStorage.getItem("remember") == "true") {
    console.log(localStorage.getItem("remember"));
    console.log( $("#login-email").val());
    $("#login-email").val(localStorage.getItem("login-email"));
    $("#login-password").val(localStorage.getItem("login-password"));
    $("#remember").prop("checked", true);
  } else {
    console.log(localStorage.getItem("remember"));
    localStorage.removeItem("login-email");
    localStorage.removeItem("login-password");
    localStorage.setItem("remember", false);
  }
