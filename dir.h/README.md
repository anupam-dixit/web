# Ajax

## Post
```jquery
$.ajax({
                type: "POST",
                url: '/php/ajax/rec_login.php',
                data: {
                    auth, phone, pass
                },
                beforeSend: function() {
                    $("#btn_login").addClass("disabled").html("Loading<i class='fas ml-2 fa-spinner fa-pulse fa-lg bold'></i>");
                },
                success: function(data) {
                    if (data.startsWith("1,")) {
                        audio_success.play();
                        SnackBar({
                            status: "success",
                            position: "tr",
                            message: "<i class='text-success fas fa-lg fa-check ml-0 pl-0 mr-2'></i><span class='text-success'>"+data.split(",")[1]+"</span>"
                        });
                        $(".dp_name").text(data.split(",")[2]);
                        Cookies.set('cname', ''+data.split(",")[2], {
                            expires: 60
                        });
                        Cookies.set('cphone', ''+data.split(",")[3], {
                            expires: 60
                        });
                        Cookies.set('cinid', ''+data.split(",")[4], {
                            expires: 60
                        });
                        $("#div_lgn").slideUp(600).delay(600);
                        $("#div_done").delay(600).slideDown(600);
                    }
                    if (data.startsWith("0,")) {
                        audio_error.play();
                        SnackBar({
                            status: "warning",
                            position: "tr",
                            message: "<i class='text-warning fas fa-lg fa-exclamation-circle ml-0 pl-0 mr-2'></i><span class='text-warning'>"+data.split(",")[1]+"</span>"
                        });
                    }
                },
                complete: function(data) {
                    $("#btn_login").removeClass("disabled").html(preHtml);
                }
            });
``` 

Bottom Inclusion
``` html
``` 
