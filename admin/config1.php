<?php

$connect = new PDO("mysql:host=localhost; dbname=cafe bistro", "root", "");

/*function get_total_row($connect)
{
  $query = "
  SELECT * FROM tbl_webslesson_post
  ";
  $statement = $connect->prepare($query);
  $statement->execute();
  return $statement->rowCount();
}

$total_record = get_total_row($connect);*/

$limit = '12';
$page = 1;

if($_POST['page'] > 1)
{
  $start = (($_POST['page'] - 1) * $limit);
  $page = $_POST['page'];
}
else
{
  $start = 0;
}

$query = "
SELECT * FROM hidangan 
";

if($_POST['query'] != '')
{
  $query .= '
  WHERE nama_hidangan LIKE "%'.str_replace(' ', '%', $_POST['query']).'%"  OR jenis LIKE "%'.str_replace(' ', '%', $_POST['query']).'%" 
  OR status LIKE "%'.str_replace(' ', '%', $_POST['query']).'%"
  ';
}

$query .= 'ORDER BY id ASC ';

$filter_query = $query . 'LIMIT '.$start.', '.$limit.'';

$statement = $connect->prepare($query);
$statement->execute();
$total_data = $statement->rowCount();

$statement = $connect->prepare($filter_query);
$statement->execute();
$result = $statement->fetchAll();
$total_filter_data = $statement->rowCount();

$output = '
<label>Jumlah Hidangan - '.$total_data.'</label>
 <table   class="text-center table table-striped" style="color:black" id="myTable">
        <tr style="background-color:#f33f3f ; color:black">
            <th>ID</th>
            <th>Nama Hidangan</th>
            <th>Jenis</th>
            <th>Harga</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
';
if($total_data > 0)
{
  foreach($result as $row)
  {
    $harga=$row['harga'];
    $hasil = 'Rp ' . number_format($harga, 0, ",", ".");
    $id = $row['id'];
    $nama = $row['nama_hidangan'];
    $jenis = $row['jenis'];
    $status = $row['status'];
    $output .= "
    <tr>
      <td>$id</td>
      <td>$nama</td>
      <td>$jenis</td>
      <td>$hasil</td>
      <td>$status</td>
      <td>
      <a href='ubah_hidangan.php?id=$id'> <button type='button' class='btn btn-warning'> Ubah </button></a> 
      <a href='hapus_hidangan.php?id=$id' onclick='myFunction()'> <button type='button' class='btn btn-danger'>Hapus</button></a>
      </td>

    </tr>
    ";
  }
}
else
{
  $output .= '
  <tr>
    <td colspan="5" align="center">Tidak Ada Nama Hidangan Yang Sesuai</td>
  </tr>
  ';
}

$output .= '
</table>
<br />
<div align="right">
  <ul class="pagination justify-content-center">
';

$total_links = ceil($total_data/$limit);
$previous_link = '';
$next_link = '';
$page_link = '';
$page_array[] = NULL ;

//echo $total_links;

if($total_links > 4)
{
  if($page < 5)
  {
    for($count = 1; $count <= 5; $count++)
    {
      $page_array[] = $count;
    }
    $page_array[] = '...';
    $page_array[] = $total_links;
  }
  else
  {
    $end_limit = $total_links - 5;
    if($page > $end_limit)
    {
      $page_array[] = 1;
      $page_array[] = '...';
      for($count = $end_limit; $count <= $total_links; $count++)
      {
        $page_array[] = $count;
      }
    }
    else
    {
      $page_array[] = 1;
      $page_array[] = '...';
      for($count = $page - 1; $count <= $page + 1; $count++)
      {
        $page_array[] = $count;
      }
      $page_array[] = '...';
      $page_array[] = $total_links;
    }
  }
}
else
{
  for($count = 1; $count <= $total_links; $count++)
  {
    $page_array[] = $count;
  }
}

for($count = 0; $count < count($page_array); $count++)
{
  if($page == $page_array[$count])
  {
    $page_link .= '
    <li class="page-item active">
      <a class="page-link" style="  pointer-events: none;
      cursor: default;">'.$page_array[$count].' <span class="sr-only">(current)</span></a>
    </li>
    ';

    $previous_id = $page_array[$count] - 1;
    if($previous_id > 0)
    {
      $previous_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$previous_id.'">Previous</a></li>';
    }
    else
    {
      $previous_link = '
      <li class="page-item disabled">
        <a class="page-link" href="#">Previous</a>
      </li>
      ';
    }
    $next_id = $page_array[$count] + 1;
    if($next_id >= $total_links)
    {
      $next_link = '
      <li class="page-item disabled">
        <a class="page-link" href="#">Next</a>
      </li>
        ';
    }
    else
    {
      $next_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$next_id.'">Next</a></li>';
    }
  }
  else
  {
    if($page_array[$count] == '...')
    {
      $page_link .= '
      <li class="page-item disabled">
          <a class="page-link" href="#">...</a>
      </li>
      ';
    }
    else
    {
      $page_link .= '
      <li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$page_array[$count].'">'.$page_array[$count].'</a></li>
      ';
    }
  }
}

$output .= $previous_link . $page_link . $next_link;
$output .= '
  </ul>

</div>
';

echo $output;

?>

<script>
function myFunction() {
  alert("Anda Yakin?");
}
</script>
