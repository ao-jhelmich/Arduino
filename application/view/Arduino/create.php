<div class="wrapper">
<div class="container">
    <h1>arduino/create</h1>
    <div class="box">
    <style type="text/css" media="screen">
    	input{
    		margin-top: 5px;
    	}
    	label {
			display: inline-block;
			width: 150px;
		}
    </style>
        <!-- echo out the system feedback (error and success messages) -->
        <?php $this->renderFeedbackMessages();?>
		<form method="post" action="<?php echo Config::get('URL');?>arduino/insert">
			<label>Category:</label>
				<select name="category">
				<?php foreach ($this->infocat as $key => $value) { 
					if ($currCat != $value->category_name):
                    	$currCat = $value->category_name;?>
					<option value="<?=$value->category_id?>"><?=$value->category_name?></option>
				<?php endif;?>
				<?php } ?>	
				</select>
			<br>
			<label>Subcategory:</label>
			<select name="subcategory">
				<?php foreach ($this->infocat as $key => $value) { 
					if ($currCat != $value->subcategory_name):
                    	$currCat = $value->subcategory_name;?>
					<option value="<?=$value->subcategory_id?>"><?=$value->subcategory_name?></option>
				<?php endif;?>
				<?php } ?>	
				</select><br>

			<label>Subject: </label>
			<input type="text" name="subject"><br><br>
			
			<label>Content: </label><br>

			<br>
			<textarea name="content" style="margin: 0px; width: 896px; height: 253px;"></textarea>
            <script>
                CKEDITOR.replace( 'content' );
            </script>
            <input type="submit" name="" value="toevoegen">
           </form>

    </div>
</div>