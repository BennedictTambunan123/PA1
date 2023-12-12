



<div class="products">
  <div class="container">
<div class="row">
 
            <?php
            include_once("config2.php");
              $page = (isset($_POST['page']))? $_POST['page'] : 1;
              $limit = 3; 
              $limit_start = ($page - 1) * $limit;
              $no = $limit_start + 1;
 
              $query = "SELECT * FROM hidangan ORDER BY jenis ASC LIMIT $limit_start, $limit";
              $dewan1 = $db->prepare($query);
              $dewan1->execute();
              $res1 = $dewan1->get_result();
              while ($row = $res1->fetch_assoc()) {
                  $harga = $row['harga'];
                  $hasil = 'Rp ' . number_format($harga, 0, ",", ".");

            ?>
           <div class="col-6 col-md-4">
        <div class="product-item">
          <a href="#"><img src="../hidangan/<?=$row['gambar']  ?>" alt=""></a>
          <div class="down-content" style="background-color: white;">
            <a href="#"><h4><?= $row['nama_hidangan'] ?></h4></a>
            <h6><?= $hasil ?></h6>
            <p><?= $row['deskripsi'] ?></p>
          </div>
        </div>
      </div>     
            <?php } ?>
</div>
 
        <?php
          $query_jumlah = "SELECT count(*) AS jumlah FROM hidangan";
          $dewan1 = $db->prepare($query_jumlah);
          $dewan1->execute();
          $res1 = $dewan1->get_result();
          $row = $res1->fetch_assoc();
          $total_records = $row['jumlah'];
        ?>
        <nav class="mb-5">
          <ul class="pagination justify-content-center" style="color:brown">
            <?php
              $jumlah_page = ceil($total_records / $limit);
              $jumlah_number = 1; //jumlah halaman ke kanan dan kiri dari halaman yang aktif
              $start_number = ($page > $jumlah_number)? $page - $jumlah_number : 1;
              $end_number = ($page < ($jumlah_page - $jumlah_number))? $page + $jumlah_number : $jumlah_page;
        
              
 
              if($page == 1){
                echo '<li class="page-item disabled"><a class="page-link" href="#">First</a></li>';
                echo '<li class="page-item disabled"><a class="page-link" href="#"><span aria-hidden="true">&laquo;</span></a></li>';
              } else {
                $link_prev = ($page > 1)? $page - 1 : 1;
                echo '<li class="page-item halaman" id="1"><a class="page-link" href="#">First</a></li>';
                echo '<li class="page-item halaman" id="'.$link_prev.'"><a class="page-link" href="#"><span aria-hidden="true">&laquo;</span></a></li>';
              }
 
              for($i = $start_number; $i <= $end_number; $i++){
                $link_active = ($page == $i)? ' active' : '';
                echo '<li class="page-item halaman '.$link_active.'" id="'.$i.'"><a class="page-link" href="#">'.$i.'</a></li>';
              }
 
              if($page == $jumlah_page){
                echo '<li class="page-item disabled"><a class="page-link" href="#"><span aria-hidden="true">&raquo;</span></a></li>';
                echo '<li class="page-item disabled"><a class="page-link" href="#">Last</a></li>';
              } else {
                $link_next = ($page < $jumlah_page)? $page + 1 : $jumlah_page;
                echo '<li class="page-item halaman" id="'.$link_next.'"><a class="page-link" href="#"><span aria-hidden="true">&raquo;</span></a></li>';
                echo '<li class="page-item halaman" id="'.$jumlah_page.'"><a class="page-link" href="#">Last</a></li>';
              }
            ?>
          </ul>
        </nav>