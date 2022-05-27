


$(document).ready(function () {
    /**
     *  show signin form
     */
    $("#email-sign").click(function (e) {

        $("#social-sign").css(
            "display", "none"
        )
        $("#form-sign").css(
            "display", "block"
        )
    })



    /**
 * verify if password and passwor2 macth
 */

$("#password2").keyup(function(){
    
    if ($("#password2").val()!==$("#password").val()) {
        $("#password2").css(
            "border","1px solid red"
        )
        $("#password2 +span").css(
            {
              color:"red",
              display:"block",
              paddingTop:"5px",
              fontStyle:"italic"  
            }
        )     
    }else{
        $("#password2").css(
            "borderColor","#ced4da"

        ) 
        $("#password2 +span").css(
            "display","none",
            
        )   
    }
})


/**
 *  use ajax to send signin data
 */

 $("#btn").click(function (e) {
    e.preventDefault()
    /**
     * init ajax
     * 
     */
    let request =
        $.ajax({
            type: "POST",
            url: "inscription",
            data: {	
                username: $("#username").val(),
                email: $("#email").val(),
                password: $("#password").val()
            },
            dataType: 'json',
            timeout: 120000, 
            cache: false,

             /**
              * callback beforeSend
              */
            beforeSend: function () {
                $(".loader").css(
                    "display", "flex"
                )
                $("#form-sign").css(
                    "display", "none"
                )
                
            }
        });
    /**
     * Succes callback function
     */
    request.done(function (output_success) {
            $(".loader").css(
                "display", "none"
            )
            $("#form-sign").css(
                "display", "block"
            )
       
        
        let htmlStart = '<div class="alert  alert-dismissible fade show " id="errors" role="alert">';
        let htmlEnd = ' <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><span aria-hidden="true"></span></button></div>';

        if (!output_success.succes) {
            let data = output_success.errors
            console.log(data)
            jQuery.each(data, function (key, user) {
                htmlStart += "<span>" + user + "</span><br>"

            });

            $("#errors").css(
                "backgroundColor", "red"
            )
        } else {

            htmlStart += "<span>" + output_success.action + "</span><br>"
            $("#username").val(" "), 
             $("#email").val(" "),
            $("#password").val("")

            $("#errors").css(
                "backgroundColor", "green"
            )
        }
        let html = htmlStart + htmlEnd
        console.log(html)
        $("#errors").html(html);

    })
    /**
     * fail callback function
     */
     request.fail(function (http_error) {
        $(".loader").html("<p>Server indisponible ............. Contactez l'administrateur : <span> <a href='mailto:foussedev@gmail.com'>foussedev@gmail.com</a></span></p>")
        $(".loader p").css(
            {
                fontWeight:"bold",
                fontSize:"20px"
            }
        )
        
        $(".loader span").css(
            {
                color:"blue"
            }
        )
       /*  setTimeout(function(){
            $(".loader").css(
                "display", "none"
            )
           
            $("#form-sign").css(
                "display", "block"
            )
        },5000)
 */

    });
 
})
/**
 * Menu toggle
 */
$(".icon-menu").click(function(e){
    console.log(e)
    e.stopPropagation()
    let h= $(".header-nav")
   h.toggleClass("hidden-items")
   console.log(h,"click sur icon menu : apparait")
   
   
})
$(".header").click(function(e){
   
    let h= $(".header-nav").addClass("hidden-items")
    console.log(h,"click sur header")
})

/**
 * user picture modify show form
 */
$("#picture-upload").click(function (e) {
    $(".picture-upload").css(
        {
            display:"block"
        }
    );
    $(".profil-main").css({
        height:"110vh",
        overflow:"hidden"    
    })
})
/**
 * hidden picture-upload form
 */
$(".picture-upload span").click(function (e) {
    $(".picture-upload").css(
        {
            display:"none"
        });
        $(".profil-main").css({
            height:"auto",
            overflow:"auto"    
        })
})


/**
 * show resources form
 */
 $("#resources").click(function (e) {
    $(".resources-form").css(
        {
            display:"block"
        });

    $(".profil-main").css({
        height:"110vh",
        overflow:"hidden"    
    })
})
/**
 * hidden resources form
 */
$(".resources-form span").click(function (e) {
    $(".resources-form").css(
        {
            display:"none"
        }
    );
    $(".profil-main").css({
        height:"auto",
        overflow:"auto"    
    })
   
})

/**
 * profil header
 * 
 */
 let links=$(".profil-header a");
 jQuery.each(links, function(key,link){
  
 })

});

/* let bmt=document.getElementById("data").addEventListener("submit",function(e){
    e.preventDefault()
    let formData = new FormData();
    let file=document.getElementById("file").files
    console.log(file)
    for(let val of file){
formData.append("files"+val.name,val)
    }
    fetch('/uploader-file', {
        method: 'POST',
       // headers:{"content-type": "undefined"},
        body: formData
      })
      .then((response) => response.json())
      .then((result) => {
        console.log('Success:', result);
      })
      .catch((error) => {
        console.error('Error:', error);
      })

}) */
  let bmt=document.getElementById("data").addEventListener("submit",function(e){
    e.preventDefault()
    let file=document.getElementById("file")
   
    let formData = new FormData();
//let fileField = document.querySelector('input[type="file"]');


formData.append('username', 'abc123');
formData.append('file', file.files[0]);
console.log(formData)

fetch('/uploader-file', {
  method: 'POST',
 // headers:{"content-type": "undefined"},
  body: formData
})
.then((response) => response.json())
.then((result) => {
  console.log('Success:', result);
})
.catch((error) => {
  console.error('Error:', error);
})

}) 









