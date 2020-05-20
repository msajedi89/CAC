<?php

//import.php

include 'vendor/autoload.php';

$connect = new PDO("mysql:host=localhost;dbname=cac_caccac", "cac_caccac", "IeKz(QX*voyJ");

if($_FILES["import_excel"]["name"] != '')
{
    $allowed_extension = array('xls', 'csv', 'xlsx');
    $file_array = explode(".", $_FILES["import_excel"]["name"]);
    $file_extension = end($file_array);

    if(in_array($file_extension, $allowed_extension))
    {
        $file_name = time() . '.' . $file_extension;
        move_uploaded_file($_FILES['import_excel']['tmp_name'], $file_name);
        $file_type = \PhpOffice\PhpSpreadsheet\IOFactory::identify($file_name);
        $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($file_type);

        $spreadsheet = $reader->load($file_name);

        unlink($file_name);

        $data = $spreadsheet->getActiveSheet()->toArray();

        for ($i = 1; $i < count($data); $i++) {
            $row = $data[$i];
            $insert_data = array(
                ':emiratesid'  => $row[0],
                ':first_name'  => $row[1],
                ':last_name'  => $row[2],
                ':nationality'  => $row[3],
                ':job'  => $row[4],
                ':address'  => $row[5],
                ':phone'  => $row[6],
            );

            $query = "
                INSERT INTO students 
                (first_name, last_name, emiratesid, nationality, phone, address, job) 
                VALUES (:first_name, :last_name, :emiratesid, :nationality, :phone, :address, :job)";

            $statement = $connect->prepare($query);
            $statement->execute($insert_data);
        }

        $message = '<div class="alert alert-success">Data Imported Successfully</div>';

    }
    else
    {
        $message = '<div class="alert alert-danger">Only .xls .csv or .xlsx file allowed</div>';
    }
}
else
{
    $message = '<div class="alert alert-danger">Please Select File</div>';
}

echo $message;

?>