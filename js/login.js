$(document).ready(function(){

    $("#add_err").css('display', 'none', 'important');
    $("#login").click(function(){
        email = $("#email").val();
        password = $("#password").val();
        remember = !!$("#remember").is(':checked');
        $.ajax({
            type: "POST",
            url: "login.php",
            data: "email="+email+"&password="+password+"&remember="+remember,
            success: function(res){
                if(res == '-1')    {
                    $("#add_err").css('display', 'inline', 'important');
                    $("#add_err").html('Неправильный email или пароль');
                } else {
                    $(".hello").html(res)
                }
            }
        });
        return false;
    });

    $(".container").on("click",".logout", function(){
        $.ajax({
            type: "POST",
            url: "logout.php",
            success: function(res){
                window.location.reload();
                if(res) {

                }
            }
        });
        return false;
    });


    $("#refresh").click(function(){
        window.location.reload();
        return false;
    });
});
