<?php 
    if (empty($this->subjects)){ ?>
    <div class="wrapper">
        <div class="container">
            <h1>Welkom</h1>
                <p>Op deze pagina vind jij hulp bij al jouw opdrachten!</p>
                <p>Hierboven vind je het menu om naar de desbetreffende sub onderwerpen te gaan!</p>
        </div>
    </div>
<?php }else{?>
    <div class="navigationLeft">
        <ul><?php 
            $currname = NULL;
            foreach ($this->subjects as $value){
                if ($currname != $value->subcategory_name){
                    $currname = $value->subcategory_name;?>
            <li><a href="<?= Config::get('URL') . 'read/index/' . $value->subject_subcategory_id; ?>"><?=$currname?>
            </a></li>
        <?php }}?></ul>
    </div>
<div class="wrapper">
    <div class="container">
        <?php
            $currsubcat = NULL;
            foreach ($this->subjects as $subject)
                { 
                    if ($currsubcat != $subject->subcategory_name){
                        $currsubcat = $subject->subcategory_name;
                        echo "<h1>" . $subject->subcategory_name . "</h1>";
                        echo '<div class="box">';
                        echo "<h1>" . $subject->subject_name . "</h1>";
                        echo "<p class='pre'>" . $subject->subject_content . "</p>";                
                     }else{
                        echo "test";
                        echo "<h1>" . $subject->subject_name . "</h1>";
                        echo "<p class='pre'>" . $subject->subject_content . "</p>";
                     }
                }
            }; ?>    
    </div>
</div>