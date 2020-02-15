<?php 
    namespace Core;
    use App\Config;
    use PDO;
    use PDOException;

    abstract class Model {
        protected static function getDB() {
            static $db = null;
            if ($db == null) {
                try {
                    $dsn = 'mysql:host='.Config::DB_HOST.';dbname='.Config::DB_NAME.';charset=utf8';
                    $db = new PDO($dsn, Config::DB_USER, Config::DB_PASSWORD);
                    return $db;
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }
            } else
                return $db;
        }

        protected static function insertData($tableName, $data) {
            $db = Model::getDB();
            $keys = implode('`, `', array_keys($data));
            $values = implode("', '", array_values($data));
            $db->exec("INSERT INTO $tableName(`$keys`) VALUES ('$values');"); 
        }

        protected static function isUserExists($userName, $password) {
            if($userName == 'Dhara' && $password == 'Dhara') {
                return true;
            } else {
                return false;
            }
        }

        protected static function updateData($tableName, $data, $fieldName, $fieldValue) {
            $db = Model::getDB();
            $updateData = '';
            foreach($data as $key => $value) {
                $updateData .= ", $key = '$value'";
            }
            $updateData = ltrim($updateData, ', ');  
            $updateQuery = "UPDATE $tableName SET $updateData WHERE $fieldName = $fieldValue";
            $db->exec($updateQuery);
        }

        protected static function deleteData($tableName, $fieldName, $fieldValue) {
            $db = Model::getDB();
            $db->exec("DELETE FROM $tableName WHERE $fieldName = '$fieldValue'");
        }

        protected static function fetchAll($tableName) {
            $db = Model::getDB();
            $stmt = $db->query("SELECT * FROM $tableName");
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        }

        protected static function fetchRow($tableName, $fieldName, $fieldValue) {
            $db = Model::getDB();
            $stmt = $db->query("SELECT * FROM $tableName WHERE $fieldName = '$fieldValue'");
            $results = $stmt->fetch(PDO::FETCH_ASSOC);
            return $results;
        }

        protected static function isUrlExists($tableName, $fieldName, $fieldValue) {
            $db = Model::getDB();
            $stmt = $db->prepare("SELECT * FROM $tableName WHERE $fieldName = '$fieldValue'");
            $stmt->execute();
            $count = $stmt->rowCount();
            return $count == 0 ? true : false; 
        }
    }
?>