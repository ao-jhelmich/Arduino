<div  class="wrapper">    
<div class="container">
    <h1><?php
        $currname = NULL;
        foreach ($this->content as $subject)
            { 
                if ($currname != $subject->subcategory_name){
                    $currname = $subject->subcategory_name;
                    echo $subject->subcategory_name; }
            }?></h1>
    <div class="box">

        <!-- echo out the system feedback (error and success messages) -->
        <?php $this->renderFeedbackMessages();?>
            
                    <p><?php 
                    foreach ($this->content as $subject) 
                            {
                                echo "<h1>" . $subject->subject_name . "</h1>";
                                if (Session::userIsLoggedIn()) {
                                    ?>
                                    <form method="post" action="<?php echo Config::get('URL'); ?>Arduino/editsub">
                                        <input type="hidden" name="subject_id" value="<?=$subject->subject_id?>">
                                        <input class="edit-icon" type="image" src="../../css/edit.png" border="0" alt="Submit"/>
                                    </form>
                                    <form onsubmit="return confirm('Weet u zeker dat u dit op inactief wilt zetten?');" method="post" action="<?php echo Config::get('URL'); ?>Arduino/softDelete">
                                        <input type="hidden" name="subject_id" value="<?=$subject->subject_id?>">
                                        <input type="hidden" name="subject_subcategory_id" value="<?=$subject->subject_subcategory_id?>">
                                        <input class="edit-icon" type="image" src="../../css/delete.png" border="0" alt="Submit"  />
                                    </form>
                                    <?php
                                }
                                echo "<p class='pre'>" . $subject->subject_content . "</p><br>";

                        }?>
                    </p>
        </div>
</div>
