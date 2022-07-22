<?php 

require_once('../_URAA/module/function.php');

    if(!empty($_POST["save_record"])) {
        $id = $_POST['id'];
        $sql = "update table_user set 
        ='" . $_POST[ 'post_title' ] . "', 
        description='" . $_POST[ 'description' ]. "', 
        post_at='" . $_POST[ 'post_at' ]. "' 
        where id=" . $id;
        $pdo_statement=$pdo_conn->prepare();
        $result = $pdo_statement->execute();
        if($result) {
            header('location:index.php');
        }
    }else{
        echo '<script>alert("Lengkapi Data")';
    }

?>