		<!-- iklan -->
		<div class="col-md-12 col-sm-12">
			<div class="container">
			<div class="col-sm-6 col-md-6">
				<h4>S p o n s o r s</h4>
			</div>
			<div class="col-sm-6 col-md-6">
				<h4>M e d i a  P a r t n e r s</h4>
			</div>
			</div>
		</div>
	</div>
	<div class="foot">
		&copy; <a href="http://kusia.ga">ITDEV</a> 2017
	</div>

</body>

<!-- bootstrap js / ;ibrary -->
<script type="text/javascript" src="<?= BASE_URL()?>aset/js/jquery.js"></script>
<script type="text/javascript" src="<?= BASE_URL()?>aset/js/bootstrap.min.js"></script>

</html>

<script type="text/javascript">
$(document).ready(function(){
	$('a[toggle="drop"]').on('click', function(){
		$('.dropdwn').toggleClass('display');
	})
	$(document).click(function(e){
	if (!$(e.target).hasClass('1234')) {
	        $('.dropdwn').removeClass('display')
	    }
    })

	$('.toggleNav').on('click', function(){
		$('.resposive').toggleClass('open_res');
	})
});


	
</script>

<script>
    var now = new Date(<?php echo time() * 1000 ?>);
    function startInterval(){  
        setInterval('updateTime();', 1000);  
    }
    startInterval();//start it right away
    function updateTime(){
        var nowMS = now.getTime();
        nowMS += 1000;
        now.setTime(nowMS);
        var clock = document.getElementById('qwe');
        if(clock){
            clock.innerHTML = now.toTimeString();//adjust to suit
        }
    } 
</script>