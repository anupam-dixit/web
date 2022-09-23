# Ajax

## Post
```jquery
$.ajax({
  type: "POST",
  url: 'url_here',
  data: {
    auth
  },
  beforeSend: function() {
    $("#btn_login").addClass("disabled").html("Loading<i class='fas ml-2 fa-spinner fa-pulse fa-lg bold'></i>");
  },
  success: function(data) {
    if (data.startsWith("1,")) {
      
      
    }
    if (data.startsWith("0,")) {
      
      
    }
  },
  complete: function(data) {
    $("#btn_login").removeClass("disabled").html(preHtml);
  }
});
``` 

## OnClick 
``` jquery
$("#ic_loc").click(function() {
  
});
``` 

## OnReady
‛‛‛ jquery
$(document).ready(function() {
  
});
‛‛‛
