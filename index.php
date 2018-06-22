<!DOCTYPE html>
<html>
<head>
	<title>Dynamic Form Generate Content Bootsrap 4 jQuery Ajax</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container mt-5">
	<div class="card">
		<div class="card-header">
			<h2 class="text-capitalize">Dynamic Form Generate Content</h2>
		</div>
		<div class="col-sm-12">
			<form action="/action_page.php">
				<div class="form-group">
					<label for="selection">Select Input Type : </label>
					<select class="form-control text-capitalize" id="selection" name="selection">
						<option> -- Select Input Type Here --</option>
						<option value="text">text</option>
						<option value="textarea">textarea</option>
						<option value="number">number</option>
					</select>
				</div>
				<div class="form-group">
					<div class="attribut"></div>
				</div>
				<button type="button" class="btn btn-primary addSelection" title="Add New Content"> + Add</button>
				<div class="dynamic-content">
					
				</div>
			</form>
		</div>
		<div class="card-footer text-muted text-center">
			Version : 0.1
		</div>
	</div>
</div>

<script type="text/javascript">
	(function(j,cSlug,cUnderscore){
		var attr;

			// generate atribut default
			function attr_default(){
		        attr='';
		        attr+='<div class="form-group row">';
		        attr+='<label class="col-sm-2 col-form-label">Name * :</label>';
		        attr+='<div class="col-sm-10">';
		        attr+='<input readonly id="name" type="text" class="form-control" placeholder="">';
		        attr+='</div>';    
		        attr+='</div>';

		        attr+='<div class="form-group row">';
		        attr+='<label class="col-sm-2 col-form-label">Class * :</label>';
		        attr+='<div class="col-sm-10">';
		        attr+='<input readonly id="label-class" type="text" class="form-control" placeholder="">';
		        attr+='</div>';    
		        attr+='</div>';

		        attr+='<div class="form-group row">';
		        attr+='<label class="col-sm-2 col-form-label">Id * :</label>';
		        attr+='<div class="col-sm-10">';
		        attr+='<input readonly id="label-id" type="text" class="form-control" placeholder="">';
		        attr+='</div>';    
		        attr+='</div>';

		        attr+='<div class="form-group row">';
		        attr+='<label class="col-sm-2 col-form-label">Other Atribut :</label>';
		        attr+='<div class="col-sm-10">';
		        attr+='<input type="text" class="form-control" placeholder="Optional Ex: data-id=1 data-name=John Etc ">';
		        attr+='</div>';    
		        attr+='</div>';

		        attr+='<div class="form-group row">';
		        attr+='<label class="col-sm-12 col-form-label">Required  <input id="required" type="checkbox"></label>';
		        attr+='</div>';    
		        attr+='</div>';
	        	return attr;
		    }
			// generate atribut default

			// generate label name
			function labelName(){
		        attr='';
		        attr+='<div class="form-group row">';
		        attr+='<label class="col-sm-2 col-form-label text-danger">Label * :</label>';
		        attr+='<div class="col-sm-10">';
		        attr+='<input id="label-name" type="text" class="form-control" placeholder="Input Label Here Ex: Name">';
		        attr+='</div>';    
		        attr+='</div>';

		        return attr;
			}
			// generate label name

			// when input label name
			function labelNameKeyup(){
		        j('#label-name').on('keyup',function(){
		        	j('#name').val( cUnderscore( j(this).val() ) );
		        	j('#label-class').val('.'+cSlug( j(this).val() ));
		        	j('#label-id').val('#'+cSlug( j(this).val() ));
					j('#label-name').removeClass('border-danger');
		        });
			}
			// when input label name

			// when input tipe selection
			function selectAction(Text){
				switch(Text) {
				    case 'text':
				        attr= '';
				        attr+= labelName();
				        attr+= attr_default();

				        break;
				    default:
				        attr= null;
				}
				j('.attribut').html( attr );
				labelNameKeyup();
				// return attr;
			}
			// when input tipe selection

			// add selection
			function addSelection(){
				j('.addSelection').on('click',function(){
					attr = [];
					attr['val'] = j('#label-name').val();
					console.log(attr);
					if ( attr['val'].length > 0 ) {
						console.log( j('#label-name').val() )
						
					}else{
						j('#label-name').addClass('border-danger');
						j('#label-name').focus();

					}
				});
			}
			// add selection


		j('#selection').on('change',function(){
			selectAction(j(this).val());
			addSelection();
		});

	})(jQuery,convertToSlug,convertToUnderscore)

	function convertToSlug(Text)
	{
	    return Text
	        .toLowerCase()
	        .replace(/[^\w ]+/g,'')
	        .replace(/ +/g,'-')
	        ;
	}
	function convertToUnderscore(Text)
	{
	    return Text
	        .toLowerCase()
	        .replace(/[^\w ]+/g,'')
	        .replace(/ +/g,'_')
	        ;
	}
</script>
</body>
</html>