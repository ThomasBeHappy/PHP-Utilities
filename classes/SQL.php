<?php

class SQL {

        /**
         * 
         * Select from database
         * 
         * @param string $query
         * @param mixed ...$values One or multiple values
         * 
         * @return array|false Outputs false on query failure or empty result
         * 
         */
    public static function select($query, ...$values) {
        $conn = Database::connect(); // Make a connection with the Database

        if($stmt = $conn->prepare($query)) { // Check if the querry is correct and there are no mistakes in it

            if($values != null) { // Do we have any parameters?

                $types = ""; // This is our types array, this will be more explained later.

                foreach ($values as $value) { // go through our given parameters, this is an array that contains all our parameters, so $id, $name are all in this.
                    if (is_float($value)) { // Is it a number?
                        $types .= "i"; // Yes? Add a i to the types string (i means that its a number variable, this is important for the database to know)
                    }else {
                        $types .= "s"; // No? add a s to the types string (s means that it is a text variable)
                    }
                }
                $ref = new ReflectionClass("msqli_stmt");
                $method = $ref->getMethod("bind_param");
                $params = array_merge($types, $values);
                $method->invokeArgs($stmt, $params); // This is a pretty complicated function and we highly suggest going to the PHP documentation for this one, 
                // but a simple explanation is that we give it the parameters and what the types are of those parameters. https://www.php.net/manual/en/mysqli-stmt.bind-param.php
            }
            $stmt->execute(); // Execute our SQL code with the parameters in the ? places now.

            if($result = $stmt->get_result()->fetch_all(PDO::FETCH_ASSOC)) { // Do we have a result, if so then put that in the $result variable.
                return $result; // Return the result back to the place this was called from
            }
            return false; // We had no results! Give it a false back
        }
        return false; // Something went wrong!
    }

    /**
     * 
     * Insert, Delete or Update in your database
     * 
     * @param string $query
     * @param mixed $values One or multiple values
     * 
     */
    public static function idu($query, ...$values) {
        $conn = Database::connect();

        if($stmt = $conn->prepare($query)) {
            if($values != null) {

                $types = "";

                foreach ($values as $value) {
                    if (is_float($value)) {
                        $types .= "i";
                    }else {
                        $types .= "s";
                    }
                }
                $ref = new ReflectionClass("msqli_stmt");
                $method = $ref->getMethod("bind_param");
                $params = array_merge($types, $values);
                $method->invokeArgs($stmt, $params);
                
            }
            if($stmt->execute()) {
                return true;
            }
            return false;
        }
        return false;
    }
}
