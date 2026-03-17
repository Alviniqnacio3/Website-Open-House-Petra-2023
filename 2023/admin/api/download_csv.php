<?php
include 'connect.php';

// Start the output buffer.
ob_start();

// Set PHP headers for CSV output.
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=pendaftar_.csv');

if(isset($_GET['ukm'])){
    $ukm = $_GET['ukm'];
}else{
    $ukm = '';
}
// Create the headers.
$header_args = array( 'No', 'Nama', 'nrp','jurusan','fakultas','angkatan','UKM','telepon','terima','pembayaran','tanggal_pembayaran', 'tanggal');

$query = "SELECT * FROM `pendaftar_maba` WHERE UKM LIKE '$ukm'";
$query = mysqli_query($conn, $query);
$result = array();

$count = 1;
while($row = mysqli_fetch_assoc($query)){
    $row['id'] = $count;
    $row['telepon']= "'".$row['telepon'];
    if ($row['pembayaran']!="" && $row['pembayaran']!=null){
        $row['pembayaran'] = "https://openhouse.petra.ac.id/2023/user/files/pembayaran/".$row['pembayaran'];
    }else{
        $row['pembayaran'] = '-';
    }
    array_push($result, $row);
    $count+=1;
}

// Clean up output buffer before writing anything to CSV file.
ob_end_clean();

// Create a file pointer with PHP.
$output = fopen( 'php://output', 'w' );

// Write headers to CSV file.
fputcsv( $output, $header_args );

// Loop through the prepared data to output it to CSV file.
foreach( $result as $data_item ){
    fputcsv( $output, $data_item );
}

// Close the file pointer with PHP with the updated output.
fclose( $output );
exit;
?>