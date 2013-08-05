
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){

   $('#form').on('submit',function(){
    var that = $(this),
        url = that.attr('action'),
        type = that.attr('method'),
        data = {};

    that.find('[name]').each(function(index, value){
        // console.log(value);
        var that = $(this),
       name = that.attr('name'),
      value = that.val();

        data[name]= value;
        
        console.log(data);
    });
        $.ajax({
            url: url,
            type: type,
            data: data,

            success: function() {
                     $('#form').html("<div id='message'></div>");
                     $('#message').html("<h2>Contact Form Submitted!</h2>")
                    .append("<p>We will send you email soon.</p>")
                     .hide()
                     .fadeIn(1500, function() {
                     
                     });
                     }

        // success: function(response){
        //         $('#response').html(response);
        //     }

        });
        
    return false;
   });
});
</script>

<style>
    .left{width:100px;padding-top:10px;float:left;font-family:Verdana, Geneva, sans-serif; font-size:14px;" }
    .right{width:300px; float:left;font-family:Verdana, Geneva, sans-serif; font-size:14px;}
</style>
   
    <div >
    <form action="contacts/user_register" method="post" id="form">
       
             <label class="left">Your name:</label>
            <div class="right"><input type="text" id="name" name="username" placeholder="Enter your name" required /></div>
            <br/><br/>
            <label class="left">Email:</label>
            <div class="right"><input type="email" id="email" name="email" placeholder="Enter your email id" required /><div>
            <br/><br/>
            
            <input type="submit" value="Contact" />
        
    </form>
    </div>

    <!-- <div id="response" style="display:inline-block" style="width:auto"></div> -->
