<div class="wrapper">
<div class ="container">
    <h1>Admin page</h1>
    <div class="box">
        <!-- echo out the system feedback (error and success messages) -->
        <?php $this->renderFeedbackMessages();?>
        <?php
        sort($this->subjects);
        if ($this->subjects) { ?>
            
              <table class="note-table">
                <thead>
                <tr>
                    <td>Active Subjects</td>
                    <td>Make UnActive</td>
                </tr>
                </thead>
                <tbody>
                    <?php foreach($this->subjects as $value) {?>
                        <tr>
                            <td><?= htmlentities($value->subject_name); ?></td>
                            <td>
                            <form method="post" action="<?php echo Config::get('URL');?>arduino/softDelete" class="admint">
                            <input type="hidden" name="subject_id" value="<?=$value->subject_id?>">
                            <input type="submit" value=" "></td>
                            </form>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <?php } else { ?>
                <div>No subjects active</div>
            <?php } ?>
           </form>
        <?php 
            $deleted = ArduinoModel::getSoftDeleted();
            if (!empty($deleted)) {
        ?>
              <table class="note-table">
                <thead>
                <tr>
                    <td>UnActive Subjects</td>
                    <td>Make active</td>
                </tr>
                </thead>
                <tbody>
                    <?php $currname = NULL; foreach($deleted as $value) {?>
                        <tr>
                            <td><?= htmlentities($value->subject_name); ?></td>
                            <td>
                            <form method="post" action="<?php echo Config::get('URL');?>arduino/placeback" class="admint">
                            <input type="hidden" name="subject_id" value="<?=$value->subject_id?>">
                            <input type="submit" value=" "></td>
                            </form>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php }else{ ?>
            <p>No unactive subjects</p>
        <?php } ?>
            <a href="<?php echo Config::get('URL');?>arduino/create" title="Create"><button>Create</button></a>
    </div>
</div>