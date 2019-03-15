<section class="copy">
  <div class="col-md-6">
    <ul>
      <li><a href="<?=BASE_URL?>">Home</a></li>
      <li><a href="<?=BASE_URL?>our-school/">Our School</a></li>
      <li><a href="<?=BASE_URL?>admission/">Admission</a></li>
      <li><a href="<?=BASE_URL?>academics/">Academics</a></li>
      <li><a href="<?=BASE_URL?>news-and-event/">News & Event</a></li>
      <li><a href="<?=BASE_URL?>contact/">Contact</a></li>
      <li><a href="<?=BASE_URL?>apply-now/">Apply Now</a> </li>
    </ul>
  </div>
  <div class="col-md-2 text-center"><a href="http://netpro.com.ng/" target="_blank">Designed by NetPro</a></div>
  <div class="col-md-4"> <?=$info[0]['copyright']?> </div>
  <div class="clearfix"></div>
</section>
<div class="resnav"> <a id="nav-toggle" href="#"> <span ></span></a> </div>
<div class="overl" id="overl">
  <div class="col-md-6 col-xs-6 enquirePop">
    <video width="100%" controls id="vid">
      <source src="vid/video.mp4" type="video/mp4">
      <source src="vid/video.ogg" type="video/ogg">
      <source src="vid/video.webm" type="video/webm">
    </video>
  </div>
  <div class="clbtn" id="clbtn"> <i class="fas fa-times"></i> </div>
</div>
<div class="nav-fix">
  <div class="col-xs-2"> <a href="<?=BASE_URL?>"><img src="<?=BASE_URL?>products/<?=$info[0]['image']?>"/></a> </div>
  <div class="col-xs-10 navigation">
    <ul>
     <li <?php if($_GET['fid']== $menu1['url']) { echo "class='navact'";}?> ><a href="<?=BASE_URL?>">Home </a></li>
	  <?php
				  $myd =mysql_query("select * from tbl_menu1 where id!='1' and  status='Active' limit 6") or die("Error in .".mysql_error());
						$url="";
							while($menu1=mysql_fetch_array($myd))
						   {
									$mydd=mysql_query("select * from tbl_menu2 where menu_id='".$menu1['id']."' and  status='Active'") or die("Error in .".mysql_error());
								$sub="";
								//$link1=BASE_URL.$menu1['url'].'/';
								$link1='#';
								if(mysql_num_rows($mydd)>0)
								{
								
									$sub="<i class='fas fa-sort-down'></i>";
									$link1=BASE_URL.$menu1['url'].'/';
								}
								else{
									$link1= BASE_URL.$menu1['url'].'/';
							
									
								}
								
							?>
							
							<li <?php if($_GET['fid']== $menu1['url']) { echo "class='navact'";}?>>
				  
				  <a href="<?=$link1?>"><?=$menu1['name']?></a><?=$sub?>
           <?php
						if(mysql_num_rows($mydd)>0)
							{
							?>
							
            
      
        <ul class="sub-cat">
		<?php
								while($menu2=mysql_fetch_array($mydd))
								{
								?>
									<li <?php if($_GET['sid']== $menu2['url']) { echo "class='act'";}?>><a href="<?=BASE_URL?>category/<?=$menu1['url']?>/<?=$menu2['url']?>/"><?=$menu2['name']?></a></li>
								<?php } ?>
					</ul>
          
       <?php } ?>
      </li>
	 <?php } ?>
    </ul>
  </div>
</div>
</body>
<script src="http://code.jquery.com/jquery-2.2.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="<?=BASE_URL?>js/jquery.flip.min.js"></script>
<script src="<?=BASE_URL?>js/wow.min.js"></script>
<script src="<?=BASE_URL?>js/jquery.magnific-popup.min.js"></script>
<script src="<?=BASE_URL?>assets/js/owl.carousel.js"></script>
<script src="<?=BASE_URL?>js/js.js"></script>
<script>


 
  $(document).ready(function()
		{
			// Contact Submit 
				$("#contact-submit").click(function()
		       {
				$("#contact-form").submit(function(e)
				{
					
					$("#contact-error").html("<img src='<?=BASE_URL?>images/loading.gif'/>");
					var postData = $(this).serializeArray();
					var formURL = $(this).attr("action");
					$.ajax(
					{
						url		: formURL,
						type	: "POST",
						data	: postData,
						success	:function(data, textStatus, jqXHR) 
						{			
									
						 
						 if($.trim(data)=='Thanks for writing us.')
						 {
							$("#contact-error").html('<p><span class="prettyprintS">' + data + '</span></p>');
							$('input[type="text"],textarea').val('');			
						 }
						 else
						 {
							$("#contact-error").html('<p><span class="prettyprint">'+data+'</span></p>');	
							 
						 }
							 
						},
						error: function(jqXHR, textStatus, errorThrown) 
						{
							$("#contact-error").html('<pre><code class="prettyprint">AJAX Request Failed<br/> textStatus='+textStatus+', errorThrown='+errorThrown+'</code></pre>');
						}
					});
					e.preventDefault();	//STOP default action
					e.unbind();
				});
				
			});
			
		//Become A Member	
			
  
			
				$("#become-submit").click(function()
		       {
				$("#become-form").submit(function(e)
				{
					
					$("#become-error").html("<img src='<?=BASE_URL?>images/loading.gif'/>");
					var postData = $(this).serializeArray();
					var formURL = $(this).attr("action");
					$.ajax(
					{
						url		: formURL,
						type	: "POST",
						data	: postData,
						success	:function(data, textStatus, jqXHR) 
						{			
									
						 
						 if($.trim(data)=='Thanks for writting us.')
						 {
							$("#become-error").html('<p><span class="prettyprintS">' + data + '</span></p>');
							$('input[type="text"],textarea').val('');			
						 }
						 else
						 {
							$("#become-error").html('<p><span class="prettyprint">'+data+'</span></p>');	
							 
						 }
							 
						},
						error: function(jqXHR, textStatus, errorThrown) 
						{
							$("#become-error").html('<pre><code class="prettyprint">AJAX Request Failed<br/> textStatus='+textStatus+', errorThrown='+errorThrown+'</code></pre>');
						}
					});
					e.preventDefault();	//STOP default action
					e.unbind();
				});
				
			});
			
	
// Apply Submit 
				$("#apply-submit").click(function()
		       {
				$("#apply-form").submit(function(e)
				{
					
					$("#apply-error").html("<img src='<?=BASE_URL?>images/loading.gif'/>");
					
			      	var form = $('#apply-form')[0];
					var data = new FormData(form);
					var formURL = $(this).attr("action");
					$.ajax(
					{
					    url   : formURL,
                       type  : "POST",
                        data  : data,
                       enctype: 'multipart/form-data',
                       contentType: false,
                        cache: false,
                      processData: false,
						success	:function(data, textStatus, jqXHR) 
						{			
									
						 
						 if($.trim(data)=='Thanks for writing us.')
						 {
							$("#apply-error").html('<p><span class="prettyprintS">' + data + '</span></p>');
							$('input[type="text"],textarea').val('');			
						 }
						 else
						 {
							$("#apply-error").html('<p><span class="prettyprint">'+data+'</span></p>');	
							 
						 }
							 
						},
						error: function(jqXHR, textStatus, errorThrown) 
						{
							$("#apply-error").html('<pre><code class="prettyprint">AJAX Request Failed<br/> textStatus='+textStatus+', errorThrown='+errorThrown+'</code></pre>');
						}
					});
					e.preventDefault();	//STOP default action
					e.unbind();
				});
				
			});
		
	

	
			// Newsletter validation

$("#f_submit").click(function()
{

	$("#f_form").submit(function(e)
	{
		
		$("#f_error").html("<img src='<?=BASE_URL?>images/loading.gif'/>");
		var postData = $(this).serializeArray();
		var formURL = $(this).attr("action");
		$.ajax(
		{
			url		: formURL,
			type	: "POST",
			data	: postData,
			success	:function(data, textStatus, jqXHR) 
			{		
				if($.trim(data)=="Newsletter Subscribed Successfully.")
				{
					$("#f_error").html('<p><span class="prettyprintS">'+data+'</span></p>');		
					 $('input[type="text"],textarea').val('');
				}					
				else{		
					$("#f_error").html('<p><span class="prettyprint">'+data+'</span></p>');				
					}	
			},
			error: function(jqXHR, textStatus, errorThrown) 
			{
				$("#f_error").html('<pre><code class="prettyprint">AJAX Request Failed<br/> textStatus='+textStatus+', errorThrown='+errorThrown+'</code></pre>');
			}
		});
	    e.preventDefault();	//STOP default action
	    e.unbind();
	});
	
});
			
			
			
			
		})

</script>	


<script>

$(function(){

    $(".flip").flip({

        trigger: 'hover',

        axis: 'y'

    });

});

</script>
</html>