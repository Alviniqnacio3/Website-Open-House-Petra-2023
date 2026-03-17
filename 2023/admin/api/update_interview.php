<?php
    require "connect.php";
    require "check_integrity.php";

    $nrp = $_POST['nrp'];
    $nrp_panit = $_SESSION['nrp'];
	$link_jawaban = $_POST['link_jawaban'];


    if(isset($_POST)){
		if($nrp!="" && $nrp!=null)
		{
            $sql = "UPDATE `interview` SET `update_by`='$nrp_panit',`link_jawaban` = '$link_jawaban' WHERE nrp = '$nrp'";
			if ($conn->query($sql) === TRUE) {
                // echo "Record updated successfully";
                //Redirect Back
                header("Location: ../dashboard/interview.php?nrp=$nrp");
            } else {
                echo "Error updating record: " . $conn->error;
            }
		}else{
			// header('location: ../kebutuhan_data.php');
            echo 'Gagal nrp kosong';
		}
	}
	
		// $error = 0;
		// // $allowed1 = array('DOCX','docx');
		// $target_dir = "../jawaban/";

		// $jwbdiv1 = basename($_FILES["jwbdiv1"]["name"]);
		// if($jwbdiv1 != null || $jwbdiv1 != ""){
		// 	$jwbdiv1_ext = strtolower(pathinfo($jwbdiv1,PATHINFO_EXTENSION));
		// 	$jwbdiv1 = $target_dir.$nrp."_jwb_div1".".".$jwbdiv1_ext;

		// 	if($error==0 && $nrp!="" && $nrp!=null){
		// 		move_uploaded_file($_FILES['jwbdiv1']['tmp_name'], $jwbdiv1);
		// 		$jwbdiv1 = $nrp."_jwb_div1".".".$jwbdiv1_ext;
		// 	}
		// }

		// $jwbdiv2 = basename($_FILES["jwbdiv2"]["name"]);
		// if ($jwbdiv2 != null || $jwbdiv2 != ""){
		// 	$jwbdiv2_ext = strtolower(pathinfo($jwbdiv2,PATHINFO_EXTENSION));
		// 	$jwbdiv2 = $target_dir.$nrp."_jwb_div2".".".$jwbdiv2_ext;

		// 	if($error==0 && $nrp!="" && $nrp!=null){
		// 		move_uploaded_file($_FILES['jwbdiv2']['tmp_name'], $jwbdiv2);
		// 		$jwbdiv2 = $nrp."_jwb_div2".".".$jwbdiv2_ext;
		// 	}
		// }

		// // if ($_FILES['jwbdiv1']['size'] > 5000000000 || $_FILES['jwbdiv2']['size'] ){
		// // 	$error = 1;
		// // }

		// // if(!in_array($ktm_ext,$allowed1) || !in_array($nilai_ext,$allowed1)
		// // || !in_array($skkk_ext,$allowed1) || !in_array($kecurangan_ext,$allowed1)){
		// // 	$error = 1;
		// // }
			
		// if(($jwbdiv1 != null || $jwbdiv1 != "") && ($jwbdiv2 != null || $jwbdiv2 != "")){
		// 	$sql = "UPDATE `interview` SET `update_by`='$nrp_panit',`file_jawaban1`='$jwbdiv1',`file_jawaban2`='$jwbdiv2' WHERE nrp = '$nrp'";
		// 	if ($conn->query($sql) === TRUE) {
        //         // echo "Record updated successfully";
        //         //Redirect Back
        //         header("Location: ../dashboard/interview.php?nrp=$nrp");
        //     } else {
        //         echo "Error updating record: " . $conn->error;
        //     }
		// } elseif ($jwbdiv1 == null || $jwbdiv1 == "") {
		// 	$sql = "UPDATE `interview` SET `update_by`='$nrp_panit',`file_jawaban2`='$jwbdiv2' WHERE nrp = '$nrp'";
		// 	if ($conn->query($sql) === TRUE) {
        //         // echo "Record updated successfully";
        //         //Redirect Back
        //         header("Location: ../dashboard/interview.php?nrp=$nrp");
        //     } else {
        //         echo "Error updating record: " . $conn->error;
        //     }
		// } elseif($jwbdiv2 == null || $jwbdiv2 == ""){
		// 	$sql = "UPDATE `interview` SET `update_by`='$nrp_panit',`file_jawaban1`='$jwbdiv1'WHERE nrp = '$nrp'";
		// 	if ($conn->query($sql) === TRUE) {
        //         // echo "Record updated successfully";
        //         //Redirect Back
        //         header("Location: ../dashboard/interview.php?nrp=$nrp");
        //     } else {
        //         echo "Error updating record: " . $conn->error;
        //     }
		// }else{
		// 	// jwbdiv1,2 gaada
		// 	echo "Error updating record: " . $conn->error;
		// }

		// if($error==0 && $nrp!="" && $nrp!=null)
		// {
		// 	move_uploaded_file($_FILES['jwbdiv1']['tmp_name'], $jwbdiv1);
		// 	$jwbdiv1 = $nrp."_jwb_div1".".".$jwbdiv1_ext;

		// 	move_uploaded_file($_FILES['jwbdiv2']['tmp_name'], $jwbdiv2);
		// 	$jwbdiv2 = $nrp."_jwb_div2".".".$jwbdiv2_ext;

        //     $sql = "UPDATE `interview` SET `update_by`='$nrp_panit',`file_jawaban1`='$jwbdiv1',`file_jawaban2`='$jwbdiv2' WHERE nrp = '$nrp'";
		// 	if ($conn->query($sql) === TRUE) {
        //         // echo "Record updated successfully";
        //         //Redirect Back
        //         header("Location: ../dashboard/interview.php?nrp=$nrp");
        //     } else {
        //         echo "Error updating record: " . $conn->error;
        //     }
		// }else{
		// 	// header('location: ../kebutuhan_data.php');
        //     echo 'Gagal error!=0, nrp kosong';
		// }
?>