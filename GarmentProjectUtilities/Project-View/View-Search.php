<?php
  include ('../Project-Process/Connector.php');
  if ((isset($_POST['submit'])) AND ($_POST['search'] <> "")){
    $search = $_POST['search'];
    $sql = mysqli_query($konek, "SELECT * FROM dataitem WHERE itemname LIKE '%$search%' ORDER BY itemname ASC") or die(mysqli_error());
    $jumlah = mysqli_num_rows($sql);
    if ($jumlah > 0) {
      ?>
        <table>
          <tr>
            <td width="1100"><b>Search Result</b></td>
          </tr>
        </table>
        <table class="table table-striped">
        <thead>
          <tr><td><br></td></tr>
          <tr>
            <td width="50"><center><b>No.</td>
            <td width="300"><center><b>Item Name</td>
            <td width="200"><center><b>Price/Item</td>
            <td width="160"><center><b>Types</td>
            <td width="160"><center><b>Stock Item</td>
            <td width="200"><center><b>Action</td>
          </tr>
        </thead>
        <?php while ($res=mysqli_fetch_array($sql)){
          $counter++;
          ?>
          <tbody>
          <tr>
            <td width="50"><center><?php echo $counter;?></td>
            <td width="300"><?php echo $res[1];?></td>
            <td width="200"><center><?php echo $res[2];?></td>
            <td width="160"><center><?php echo $res[3];?></td>
            <td width="160"><center><?php echo $res[4];?></td>
            <td><center>
              <a href="../Project-View/View-Home.php?page=View-ListOfItems#myModal1" id="" data-target="" data-original-title="Edit this user" data-toggle="modal" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
              <a href="../Project-Process/RemoveItems.php?id=<?php echo $data[0];?>" data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
          </tr>
          </tbody>
          <?php
        }
    }
    else {
      echo 'Maaf, hasil pencarian tidak ditemukan.';
    }
  }
  else {
    echo 'Masukkan dulu kata kuncinya';
  }
?>
