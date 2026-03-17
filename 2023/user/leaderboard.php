<?php
include 'api/connect.php';

$query = "SELECT * FROM maintenance_user";
$result = $con -> query($query);
if ($result -> num_rows > 0) {
    while ($row = $result ->  fetch_assoc()) {
        if ($row["status"] === "maintenance") {
            header("Location: maintenance.php");
        }
    }
}
  ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaderboard | Open House 2023</title>
    <link rel="icon" type="image/x-icon" href="../asset/favicon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="css/leaderboard.css">
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php 
    include 'header.php';
    if(!isset($_SESSION['id_kelompok'])){
        header("location: main.php?status=1");
    }

    $sql = "SELECT * FROM `score` WHERE nama_kelompok like '".$_SESSION['nama_kelompok']."'";
    $query = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($query);
    if($row==null){
        $point = 0;
    }else{
        $point = $row['score'];
    }
    ?>

    <div class="container" style="margin-top:150px;">
        <p class="fs-2 fw-semibold text-white text-center">Leaderboard</p>
    </div>
    <div class="container">
        <div class="card col-md-8 mx-auto">
            <div id="my_team" class="card-body">
                <div class="row" style="color:#4b847d;">
                    <div class=" fw-bold col-6 title-body d-flex justify-content-center align-items-center text-center">
                        Kelompok
                    </div>
                    <div class="fw-bold col-6 title-body d-flex justify-content-center align-items-center text-center">
                        Points
                    </div>
                </div>
                <hr class="my-2">
                <div class="row">
                    <div class="col-6 d-flex justify-content-center text-body text-center fw-bold">
                        <?php echo $_SESSION['nama_kelompok'] ?>
                    </div>
                    <div class="col-6 d-flex justify-content-center text-body text-center fw-bold">
                        <?php echo $point ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container col-md-7 mt-4">
        <div class="row">
            <div class="col-3 px-1">
                <div class="card my-1" style="background-color:#4b847d; color:white">
                    <div class="card-body p-3">
                        <div id="head" class="text-center"><i class="fa-solid fa-ranking-star"></i></div>
                    </div>
                </div>
            </div>

            <div class="col-9 px-1">
                <div class="card my-1" style="background-color:#4b847d; color:white">
                    <div class="card-body p-3">
                        <div class="row">
                            <div id="head" class="col-8 fw-bold">Nama Kelompok</div>
                            <div id="head" class="text-center col-4 fw-bold">Points</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- leaderboard yg ditunjukin -->
        <div class="row">
            <!-- untuk rank -->
            <div class="col-3">
                <?php 
                        // $query = "SELECT * FROM `score`";
                        $query = "SELECT * FROM `kelompok` ORDER BY score DESC";
                        $result = mysqli_query($con, $query);
                        $ranking = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                <div class="row px-1">
                    <div class="card my-1">
                        <div class="card-body p-3 px-0">
                            <div id="no_rank" class="text-center fw-bold"><?php echo($ranking) ?></div>
                        </div>
                    </div>
                </div>
                <?php
                            if ($ranking ==10){
                                // break;
                            }
                            $ranking = $ranking + 1;
                        }
                    
                    ?>
            </div>

            <!-- untuk nama kelompok + point -->
            <div class="col-9">
                <div id="list">
                    <?php 
                    // $query = "SELECT * FROM `score`";
                    $query = "SELECT * FROM `kelompok` ORDER BY score DESC";
                    $result = mysqli_query($con, $query);
                    $ranking = 1;
                    while($row = mysqli_fetch_assoc($result)){
                        // if($ranking <=10){
                            echo '<div class="row px-1 item id=item_'.$row['id'].'">
                                <div id="barang-2" class="card my-1">
                                    <div class="card-body p-3">
                                        <div class="row">
                                            <div id="rank_nama" class="isi_rank col-8 fw-bold">'.$row['nama_kelompok'].'</div>
                                            <div class="isi_rank text-center col-4 fw-bold" id="id_kelompok'.$row['id'].'">'.$row['score'].'</div>
                                        </div>
                                    </div>
                                </div>  
                            </div>';
                        // }else{
                        //     echo '<div class="row px-1 item" id=item_'.$row['id'].' hidden>
                        //     <div id="barang-2" class="card my-1">
                        //         <div class="card-body p-3">
                        //             <div class="row">
                        //                 <div class="col-8 fw-bold fs-6">'.$row['nama_kelompok'].'</div>
                        //                 <div class="text-center col-4 fw-bold fs-6" id="id_kelompok'.$row['id'].'">'.$row['score'].'</div>
                        //             </div>
                        //         </div>
                        //     </div>  
                        // </div>';
                        // }
                        $ranking +=1;
                    }
                    ?>
                </div>
            </div>
        </div>






    </div>

    <!-- 
    <center>
        <div id="button" class="btn btn-primary">Shuffle</div>
    </center> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/Flip.min.js"></script>
    <script src="js/leaderboard.js"></script>

    <script>
    <?php
            $query = "SELECT * FROM `kelompok` ORDER BY score DESC";
            $query = mysqli_query($con, $query);
            $result = array();
            
            while($row = mysqli_fetch_array($query)){
                array_push($result, $row);
            }
            $js_array = json_encode($result);
            echo "var dataLama = ". $js_array . ";\n";
        ?>
    console.log(dataLama)
    setInterval(refreshData, 1000);

    function refreshData() {
        const temp = gsap.utils.toArray(".item");

        const squares = gsap.utils.toArray(".item");
        const state = Flip.getState(squares);

        $.ajax({
            url: 'api/ambil_data.php',
            method: 'GET',
            type: 'post',
            success: function(data) {
                data = JSON.parse(data);
                let count = 0;
                console.log(data)
                data.forEach(function(hasil) {

                    const hasillama = $('#id_kelompok' + hasil[0]).html();
                    $('#id_kelompok' + hasil[0]).html(hasil[3]);

                    const hasilbaru = hasil[3];
                    console.log(hasil[2] + " " + count)
                    console.log(hasillama + " " + hasilbaru)

                    if (hasillama != hasilbaru) {
                        let indexLama = 0;
                        let indexBaru = 0;
                        for (let index = 0; index < dataLama.length; index++) {
                            if (hasil[0] == dataLama[index][0]) {
                                indexLama = index
                                break;
                            }
                        }

                        if (indexLama < count) {
                            indexBaru = count + 1;
                        } else if (indexLama > count) {
                            indexBaru = count;
                        }
                        console.log(indexLama + " " + indexBaru)
                        swap(squares, indexLama, indexBaru);

                        Flip.from(state, {
                            duration: 0.7,
                            ease: "sine.out"
                        });
                        dataLama = data;

                        // for(var j=0;j<data.length;j++){
                        //     const datakej = $('#id_kelompok'+data[j][0]).html();
                        //     console.log(datakej + "<" + hasilbaru)
                        //     console.log(count + " " + j)

                        //     if(parseInt(datakej)<parseInt(hasilbaru)){
                        //         swap(squares,count,j);

                        //         Flip.from(state, {
                        //             duration: 0.8,
                        //             ease: "sine.out"
                        //         });
                        //         break;
                        //     }

                        // };

                    }
                    count = count + 1;
                });
            }
        })
        checkHidden();
    };

    function swap(squares, from, to) {
        a = squares[from]
        a.parentNode.insertBefore(a, a.parentNode.children[to])
    }

    function checkHidden(){
        <?php
        // $query = "SELECT * FROM `kelompok` ORDER BY score DESC";
        // $result = mysqli_query($con, $query);
        // $count = 0;
        // while($row = mysqli_fetch_array($result)){
        //     if ($count<10){
        //         echo "$('#item_".$row['id']."').attr('hidden',false);\n";
        //     }else{
        //         echo "$('#item_".$row['id']."').attr('hidden',true);\n";
        //     }
        //     $count+=1;
        // }
        ?>
    }


    function animasiData(from, to) {
        const squares = gsap.utils.toArray(".item");
        const state = Flip.getState(squares);
        // const list1 = document.querySelector("#list");
        // const nilai = [];
        // for (var i = 0; i < list1.children.length; i++) {
        //     const input_data = list1.children[i].innerText;
        //     // Splitting the input into lines
        //     const lines = input_data.split("\n");

        //     // Looping through the lines to find the number
        //     let number = null;
        //     for (const line of lines) {
        //         const parsedNumber = parseInt(line);
        //         if (!isNaN(parsedNumber)) {
        //             number = parsedNumber;
        //             break;
        //         }
        //     }
        //     nilai.push(number);
        // };
        // Using regular expressions to extract the number

        // looping bubble sort


        swap(squares, from, to);
        // swap(squares,3,0);


        // transform them 'back' to the old position and then animate the removal of the transforms - like magic ✨
        Flip.from(state, {
            duration: 0.8,
            ease: "sine.out"
        });
    };

    // refreshData();
    button.addEventListener("click", (e) => {
        // grab the current position of all the list items
        animasiData()
    });
    </script>
</body>

</html>