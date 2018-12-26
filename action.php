<?php
if(isset($_POST['submit'])){

    //collect form data
    $name = $_POST['name'];
//    $email = $_POST['email'];

    //check name is set
    //if($name ==''){
    //    $error[] = 'Name is required';
    //}

    //check for a valid email address
//    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
//         $error[] = 'Please enter a valid email address';
//    }

    //if no errors carry on
    //if(!isset($error)){

        //create html of the data
        ob_start();
        ?>

        <h1>Data from form</h1>
        <p>Name: <?php echo $name;?></p>

        <?php
        $body = ob_get_clean();

        $body = iconv("UTF-8","UTF-8//IGNORE",$body);

        include("mpdf/mpdf.php");
        $mpdf=new \mPDF('c','A4','','' , 0, 0, 0, 0, 0, 0);

        //write html to PDF
        $mpdf->WriteHTML($body);

        //output pdf
        $mpdf->Output('demo.pdf','D');

        //open in browser
        //$mpdf->Output();

        //save to server
        //$mpdf->Output("mydata.pdf",'F');

    //}
}
?>
