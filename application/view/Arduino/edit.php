<div class="wrapper">
<div class="container">
        <form method="post" action="<?php echo Config::get('URL'); ?>Arduino/editSubcategory">
            <?php if (empty($this->subjects->subcategory_id)) {
                    $tag = "<div style='display:none;'>";
                    }else{
                    $tag = "<div>";
                    }
                echo $tag?>
        <input type="hidden" name="subcategory_id" value="
        <?php $currid = NULL; 
            foreach ($this->subjects as $subject)
            { 
                if ($currid != $subject->subcategory_id){
                $currid = $subject->subcategory_id;
                echo $subject->subcategory_id; }
        }?>
        ">
        <p><input type="text" style="font-size:25px; font-weight:bold" name="subcategory_name" value="<?php

        
        $currname = NULL;
        foreach ($this->subjects as $subject)
        { 
            if ($currname != $subject->subcategory_name){
            $currname = $subject->subcategory_name;
            echo $subject->subcategory_name; }
        }?>"></p>
        <input type="submit" value="save title">
        </div>
        </form>
    <div class="box">

            <!-- echo out the system feedback (error and success messages) -->
            <?php   $this->renderFeedbackMessages();?>
                
            <p><?php
            
            foreach ($this->subjects as $subject)
                         { ?>
                            <form method="post" action="<?php echo Config::get('URL'); ?>Arduino/editSave">
                                <p><input type="text" style="font-size:25px; font-weight:bold; width:100px;" name="subject_name" value="<?=$subject->subject_name;?>"></p>
                                <input type="hidden" name="subject_id" value="<?=$subject->subject_id;?>">
                                <input type="hidden" name="subject_subcategory_id" value="<?=$subject->subject_subcategory_id;?>"><br>
                                <textarea rows="15" cols="124" name="subject_content"><?= $subject->subject_content;?></textarea>
                                <br>
                                <script>
                                    CKEDITOR.replace( 'subject_content' );
                                </script>
                                <input type="submit" value="save subject">
                            </form><?php
                         }?>
            </p>

        </div>
    </div>