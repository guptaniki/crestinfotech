<?php   
 //database.php  
 class Databases{  
      public $con;  
      public function __construct()  
      {  
           $this->con = mysqli_connect("localhost", "root", "", "crestweek2");  
           if(!$this->con)  
           {  
                echo 'Database Connection Error ' . mysqli_connect_error($this->con);  
           }  
      }  
      public function insert($table_name, $data)  
      {  
           $string = "INSERT INTO ".$table_name." (";            
           $string .= implode(",", array_keys($data)) . ') VALUES (';            
           $string .= "'" . implode("','", array_values($data)) . "')";  
           // print_r($string);
           if(mysqli_query($this->con, $string))  
           {  
            $last_id=mysqli_insert_id($this->con);
              return $last_id;
                return true;  
           }  
           else  
           {  
                echo mysqli_error($this->con);  
           }  
      }  
      public function select($table_name)  
      {  
           $array = array();  
           $query = "SELECT * FROM ".$table_name."";  
           $result = mysqli_query($this->con, $query); 
            
           while($row = mysqli_fetch_assoc($result))  
           {  
                $array[] = $row;  
           }  
           return $array;  
      }  
      public function select_where($sel,$table_name, $where_condition)  
      {  
           $condition = '';  
           $array = array();  
           foreach($where_condition as $key => $value)  
           {  
                $condition .= $key . " = '".$value."' AND ";  
           }  
           $condition = substr($condition, 0, -5);  
           $query = "SELECT ".$sel." FROM ".$table_name." WHERE " . $condition;  
           $result = mysqli_query($this->con, $query);  

           while($row = mysqli_fetch_array($result))  
           {  
                $array[] = $row;  
           }  

           return $array;  
      }  
      public function query($sql)
      {
           $array = array();  

           
           
           
           $result = mysqli_query($this->con, $sql);
   
           while($row = mysqli_fetch_assoc ($result))  
           {  
                $array[] = $row;  
           }  
           return $array; 



      }

        public function delete($sql)
      {

           
           
           
           $result = mysqli_query($this->con, $sql);
   
           // while($row = mysqli_fetch_assoc ($result))  
           // {  
           //      $array[] = $row;  
           // }  
           return $result; 



      }



      public function update($table_name, $fields, $where_condition)  
      {  
           $query = '';  
           $condition = '';  
           foreach($fields as $key => $value)  
           {  
                $query .= $key . "='".$value."', ";  
           }  
           $query = substr($query, 0, -2);  
           /*This code will convert array to string like this-  
           input - array(  
                'key1'     =>     'value1',  
                'key2'     =>     'value2'  
           )  
           output = key1 = 'value1', key2 = 'value2'*/  
           foreach($where_condition as $key => $value)  
           {  
                $condition .= $key . "='".$value."' AND ";  
           }  
           $condition = substr($condition, 0, -5);  
           /*This code will convert array to string like this-  
           input - array(  
                'id'     =>     '5'  
           )  
           output = id = '5'*/  
           $query = "UPDATE ".$table_name." SET ".$query." WHERE ".$condition."";  
           // var_dump($query);
           if(mysqli_query($this->con, $query))  
           {  
           
                return true;  
           }  
      }  
 }  
 ?>  