  <?php
class ArduinoModel
{
    public static function getCategory($category_id){
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT * FROM category WHERE category_id = :id";
        $query = $database->prepare($sql);
        $query->execute(array(':id' => $category_id));

        // fetchAll() is the PDO method that gets all result rows
        return $query->fetchAll();
    }    
    public static function createPage($subcategory, $subject, $content)
    {
        $database = DatabaseFactory::getFactory()->getConnection();
        $sql = "INSERT INTO subjects (subject_subcategory_id, subject_name, subject_content) 
                VALUES (:subject_subcategory_id, :subject_name, :subject_content)";
        $query = $database->prepare($sql);
        $query->execute(array(':subject_subcategory_id' => $subcategory, ':subject_name' => $subject, ':subject_content' => $content));
    }
    public static function update($subject_id, $subject_content, $subject_name)
    {
        $database = DatabaseFactory::getFactory()->getConnection();
 
        $sql = "UPDATE subjects SET subject_content = :subject_content, subject_name = :subject_name WHERE subject_id = :subject_id";
        $query = $database->prepare($sql);
        $query->execute(array(':subject_id' => $subject_id, ':subject_content' => $subject_content, ':subject_name' => $subject_name));
 
        if ($query->rowCount() == 1) {
            return true;
        }
        
        Session::add('feedback_negative', Text::get('FEEDBACK_NOTE_EDITING_FAILED'));
        return false;
    }
    public static function updateSubcategory($subcategory_id, $subcategory_name)
    {
        $database = DatabaseFactory::getFactory()->getConnection();
 
        $sql = "UPDATE subcategory SET subcategory_name = :subcategory_name WHERE subcategory_id = :subcategory_id";
        $query = $database->prepare($sql);
        $query->execute(array(':subcategory_name' => $subcategory_name, ':subcategory_id' => $subcategory_id));
 
        if ($query->rowCount() == 1) {
            return true;
        }
        
        Session::add('feedback_negative', Text::get('FEEDBACK_NOTE_EDITING_FAILED'));
        return false;
    }
   
    public static function getAllpages()
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT * FROM category
                LEFT JOIN subcategory ON category.category_id = subcategory.subcategory_category_id
                LEFT JOIN subjects ON subjects.subject_subcategory_id = subcategory.subcategory_id
                WHERE active = 'true'
                ORDER BY category_id ASC";
        $query = $database->prepare($sql);
        $query->execute();
        // fetchAll() is the PDO method that gets all result rows
        return $query->fetchAll();
    }
    public static function getSubjects($subcategory_id)
    {
        $database = DatabaseFactory::getFactory()->getConnection();
        $sql = "SELECT * FROM subjects 
                LEFT JOIN subcategory ON subjects.subject_subcategory_id = subcategory.subcategory_id
                LEFT JOIN category ON category.category_id = subcategory.subcategory_category_id
                WHERE subcategory.subcategory_category_id = :var AND active = 'true'
                ORDER BY subcategory.subcategory_id ASC, subjects.subject_id ASC";
        $query = $database->prepare($sql);
        $query->execute(array(':var' => $subcategory_id));
        // fetch() is the PDO method that gets a single result
        return $query->fetchAll();
    }

    public static function getContent($subject_id)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT * FROM subjects 
                LEFT JOIN subcategory ON subjects.subject_subcategory_id = subcategory.subcategory_id 
                WHERE subject_subcategory_id = :id AND active = 'true'";
        $query = $database->prepare($sql);
        $query->execute(array(':id' => $subject_id));

        // fetchAll() is the PDO method that gets all result rows
        return $query->fetchAll();
    }

    public static function getSubject($subject_id)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT * FROM subjects 
                WHERE subject_id = :id";
        $query = $database->prepare($sql);
        $query->execute(array(':id' => $subject_id));

        // fetchAll() is the PDO method that gets all result rows
        return $query->fetchAll();
    }
     public static function getSubCategory($subcategory_id)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT * FROM subcategory WHERE subcategory_category_id = :id";
        $query = $database->prepare($sql);
        $query->execute(array(':id' => $subcategory_id));

        // fetchAll() is the PDO method that gets all result rows
        return $query->fetchAll();
    }

    public static function softDelete($subject_id)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "UPDATE subjects SET active = 'false' WHERE subject_id = :id ";
        $query = $database->prepare($sql);
        $query->execute(array(':id' => $subject_id));             
     }

    public static function putBackSoftDelete($subject_id)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "UPDATE subjects SET active = 'true' WHERE subject_id = :id ";
        $query = $database->prepare($sql);
        $query->execute(array(':id' => $subject_id));
    }

    public static function getSoftDeleted()
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT * FROM subjects WHERE active = 'false'";
        $query = $database->prepare($sql);
        $query->execute();

        // fetchAll() is the PDO method that gets all result rows
        return $query->fetchAll(); 
    }
}
