<?php
session_start();
require 'dbconn.php';
//For input field validation
function validate($inputdata)
{
    global $conn;
    $validatedData = mysqli_escape_string($conn,$inputdata);
    return trim($validatedData);
}

//For redirecting to another page with message(status)
function redirect($url,$status=null)
{
    $_SESSION["status"] = $status;
    header("Location: ".$url);
    exit(0);
}

//For showing message or status after any process.
function alertMessage()
{
    if(isset($_SESSION['status']))
    echo "<div class='alert'>
          <h2>$_SESSION[status]</h2>
          <button onclick=closeMsg()>close</button>
          </div>";
    unset($_SESSION['status']);

    echo "
    <script>
    let alertClose = document.getElementById('close')
    let alertMsg = document.querySelector('.alert');
    function closeMsg(){
    alertMsg.style.display = 'none';
    }
    </script>
    ";
}

//For inserting record in table 
function insert($tableName,$data)
{
    global $conn;
    $table = validate($tableName);
    $columns = array_keys($data);
    $values=array_values($data);
    $finalColumn = implode(',',$columns);
    $finalValues = "'".implode("','",$values)."'";
    $query = "insert into $table ($finalColumn) values ($finalValues)";
    $result=mysqli_query($conn,$query);
    return $result;
}

//For updating records in table
function update($tableName,$id,$data)
{
    global $conn;
    $table = validate($tableName);
    $id = validate($id);
    $updateDataString = "";
    foreach($data as $column => $value)
    {
        $updateDataString .= $column.'='."'$value',";
    }
    $finalUpdateData = substr(trim($updateDataString),0,-1);
    $query = "update $table set $finalUpdateData where id = '$id'";
    $result = mysqli_query($conn,$query);
    return $result;
}

//For geting all the records from database
function getAll($tableName,$status=NULL)
{
    global $conn;
    $table = validate($tableName);
    $status = validate($status);
    if($status == 'status')
    {
        $query = "select * from $table where status = '0'";
    }
    else
    {
        $query = "select * from $table";
    }
    return mysqli_query($conn,$query);
}

//For getting individual record from database
function getById($tableName,$id)
{
    global $conn;
    $table = validate($tableName);
    $id = validate($id);
    $query = "select * from $table where id = '$id'";
    $result = mysqli_query($conn,$query);
    
    if($result)
    {
        if(mysqli_num_rows($result)==1)
        {
           $row = mysqli_fetch_assoc($result);
           $response = [
            'status'=>200,
            'data'=>$row,
            'message'=>'Record found'
        ];
        return $response;
        }
        else
        {
            $response = [
                'status'=>404,
                'message'=>'No data found'
            ];
            return $response;
        }
    }
    else
    {
       $response = [
        'status'=>500,
        'message'=>'Something went wrong'
       ];
       return $response;
    }
}

//For deleting a record from database using id
function deleteRows($tableName,$id)
{
    global $conn;
    $table = validate($tableName);
    $id = validate($id);
    $query = "delete from $table where id='$id' limit 1 ";
    $result = mysqli_query($conn,$query);
    return $result;
}



//For checking id passed in url parameter
?>
