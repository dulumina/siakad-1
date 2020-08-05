<?php
echo $this->extend('layout/template');
echo $this->section('content');
?>
<div class="card card-solid">
	<div class="card-body" id="resultcontent">Loading data....</div>
</div>
<script>
$(function(){
	$("#resultcontent").load("<?php echo base_url();?>/feeder/referensi/show");
	$("body").on("click","a[name^='ambildata_']",function(){
		$(this).html("loading....mohon tunggu!").addClass("disabled");
		var action = $(this).attr("data-src");
		$.get(action, function( data ) {
			if(data.success == true){
			   toastr.success(data.messages);
			    $("#resultcontent").load("<?php echo base_url();?>/feeder/referensi/show");
			}else{
				toastr.error(data.messages);
			}
			$('a#ambildata').html("Ambil data").removeClass("disabled");
		  
		},'json')
		return false;
	})
})
</script>
<?php
echo $this->endSection();
?>
