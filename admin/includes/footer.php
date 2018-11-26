<?php

/**
 * @Author: indran
 * @Date:   2018-10-17 16:49:19
 * @Last Modified by:   indran
 * @Last Modified time: 2018-11-24 18:33:47
 */
?>

</div>

<footer class="footer">
	<div class="container-fluid clearfix">
		<span class="text-muted d-block text-center text-sm-left d-sm-inline-block"> Copyright © <?php echo THEME_OWN_BY; ?>
		<a href="<?php echo TERMS__CONDITIONS; ?>" target="_blank">read</a>. All rights reserved.</span>
		<span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> 
		</span>
	</div>
</footer> 
</div> 
</div> 
</div> 


<script src="assets/js/popper.min.js"></script>  
<script src="assets/js/bootstrap-material-design.min.js"></script> 

<script src="assets/js/moment.min.js"></script>   

<script src="assets/js/datatables.min.js"></script>  
<script src="assets/js/bootstrap-datetimepicker.min.js"></script>  

<script src="assets/js/jquery.slimscroll.min.js"></script> 
<script src="assets/js/parsley.min.js"></script>
<script src="assets/js/select2.full.min.js"></script>


<script src="assets/js/lobibox.min.js"></script>  
<script src="assets/js/jquery.timeago.min.js"></script>  
<script src="assets/js/cropper.min.js"></script>  



<script src="admin/js/main.js"></script>



<script type="text/javascript">
	$(document).ready(function($) {
		// $('body').bootstrapMaterialDesign();
		$('.datetimepicker').datetimepicker( );
		// $.fn.select2.defaults.set("theme", "classic");
		
		$('.select2').select2();
		$('.dataTable').DataTable();
		$("time.timeago").timeago(); 

		$("[data-parsley-validate]").parsley({
			errorClass: 'has-danger',
			successClass: 'has-success',
			classHandler: function(ParsleyField) {
				return ParsleyField.$element.parents('.form-group');
			},
			errorsContainer: function(ParsleyField) {
				return ParsleyField.$element.parents('.form-group');
			},
			errorsWrapper: '<span class="invalid-feedback d-block">',
			errorTemplate: '<div></div>',
			trigger: 'change'
		});








// ============================================ image crop=====================

var URL = window.URL || window.webkitURL;

var uploadedImageURL;


var $image = $('#cropImage');
var $dataX = $('#dataX');
var $dataY = $('#dataY');
var $dataHeight = $('#dataHeight');
var $dataWidth = $('#dataWidth');
var $dataRotate = $('#dataRotate');
var $dataScaleX = $('#dataScaleX');
var $dataScaleY = $('#dataScaleY');
var options = {
	aspectRatio: 16 / 9,
	preview: '.img-preview',
	crop: function(e) {
		$dataX.val(Math.round(e.detail.x));
		$dataY.val(Math.round(e.detail.y));
		$dataHeight.val(Math.round(e.detail.height));
		$dataWidth.val(Math.round(e.detail.width));
		$dataRotate.val(e.detail.rotate);
		$dataScaleX.val(e.detail.scaleX);
		$dataScaleY.val(e.detail.scaleY);
	}
};

$image.cropper(options);

// Get the Cropper.js instance after initialized
var cropper = $image.data('cropper');

var $inputImage = $('#inputImage');
$('#selectedImg').prop('disabled', true);


if (URL) {
	$inputImage.change(function () {
		var files = this.files;
		var file;

		$('#selectedImg').prop('disabled', false);

		if (!$image.data('cropper')) {
			return;
		}

		if (files && files.length) {
			file = files[0];

			if (/^image\/\w+$/.test(file.type)) {
				uploadedImageName = file.name;
				uploadedImageType = file.type;

				if (uploadedImageURL) {
					URL.revokeObjectURL(uploadedImageURL);
				}

				uploadedImageURL = URL.createObjectURL(file);
				$image.cropper('destroy').attr('src', uploadedImageURL).cropper(options);
				$inputImage.val('');

				$('#hide-imageup').removeClass('d-none');
			} else {
				window.alert('Please choose an image file.');
			}
		}
	});
} else {
	$inputImage.prop('disabled', true).parent().addClass('disabled');
}



$(document).on('submit', '#submit_me_image_upload', function(event) {
	event.preventDefault();

	// result = $image.cropper(data.method, data.option, data.secondOption);


	$('#selectedImg').prop('disabled', true);

	$image.cropper('getCroppedCanvas').toBlob(function (blob) {
		var formData = new FormData( $('#submit_me_image_upload')[0] );

		formData.append('croppedImage', blob);

		$.ajax('ajax', {
			xhr: function () {
				var xhr = new window.XMLHttpRequest();
				xhr.upload.addEventListener("progress", function (evt) {
					if (evt.lengthComputable) {
						var percentComplete = evt.loaded / evt.total;
						console.log(percentComplete);
						$('.progress').css({
							width: percentComplete * 100 + '%'
						});
						if (percentComplete === 1) {
							$('.progress').addClass('hide');
						}
					}
				}, false);
				xhr.addEventListener("progress", function (evt) {
					if (evt.lengthComputable) {
						var percentComplete = evt.loaded / evt.total;
						console.log(percentComplete);
						$('.progress').css({
							width: percentComplete * 100 + '%'
						});
					}
				}, false);
				return xhr;
			},
			method: "POST",
			data: formData,
			processData: false,
			contentType: false,
			success: function (response) {

				
				$('#selectedImg').prop('disabled', false);
				data  = jQuery.parseJSON(response);
				console.log(data.success);
				if (data.success == -1 ) {
					console.log('invalid image ');
				} else if (data.success == 0 ) {
					console.log(' server error ');
				} else if (data.success == 1 ) {

					$image.cropper('clear');
					$('#hide-imageup').addClass('d-none');
					$('.form-desc').val('');
					location.reload();


				}





			},
			error: function () {
				
				$('#selectedImg').prop('disabled', false);
				console.log('Upload error');
			}
		});
	});
	// console.log($image);



});





});
</script>

</body>

</html>
