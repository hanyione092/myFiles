<?php
include('index-process.php');

$new_product = new Product();

if (isset($_POST['nsrt-btn-sbmt']))
{
  $new_product->AddData($_POST);
}

if (isset($_POST['btn-update'])){
  $new_product->UpdateData($_POST);  
}

if (isset($_GET['btn-delete'])){
  $new_product->DeleteData($_GET['item_id']);  
}


?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <title>Hello, world!</title>
</head>

<body>
  <div class="container">

    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Items</h5>
        <!-- alert START-->
        <?php
  switch (true) {

    case isset($_REQUEST['insrtd1']):
      $new_product->Alert("alert alert-success", "Insert Success!");
    break;

    case isset($_REQUEST['insrtd1']):
      $new_product->Alert("alert alert-success", "Insert Success!");      
    break;

    case isset($_REQUEST['insrtd0']):
      $new_product->Alert("alert alert-danger", "Insert Failed!");      
    break;

    case isset($_REQUEST['update1']):
      $new_product->Alert("alert alert-info", "Update Success!");       
    break;
          
    case isset($_REQUEST['update0']):
      $new_product->Alert("alert alert-danger", "Update Failed!");      
    break;

    case isset($_REQUEST['delete1']):
      $new_product->Alert("alert alert-info", "Delete Success!");      
    break;

    case isset($_REQUEST['delete0']):
      $new_product->Alert("alert alert-danger", "Delete Failed!");       
    break;
    
    default:
      # code...
    break;
  }
?>
        <!-- alert END-->
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Item Name</th>
              <th scope="col">Quantity</th>
              <th scope="col">Price</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $datas = $new_product->DisplayData();
            foreach ($datas as $data) {
              echo '
              <tr>
              <td>'.$data['id'].'</td>
              <td>'.$data['item_name'].'</td>
              <td>'.$data['quantity'].'</td>
              <td>'.$data['price'].'</td>              
              <td><button type="button" class="btn btn-primary" data-toggle="modal"
                  data-target="#UpdateItem'.$data['id'].'">Update</button> <button type="button" class="btn btn-primary"
                  data-toggle="modal" data-target="#deleteItem'.$data['id'].'">Delete</button> </td>
              </tr>
              
              <div class="modal fade" id="UpdateItem'.$data['id'].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
              aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action = "index.php" method = "POST">                    
                      <div class="form-group">
                        <label for="forItemName">Update Item Name</label>
                        <input type="number" class="form-control" id="forItemName" aria-describedby="ItemHelp"
                          placeholder="Enter Updated Item Name" name = "item_id" value = "'.$data['id'].'" hidden>
                        <input type="text" class="form-control" id="forItemName" aria-describedby="ItemHelp"
                          placeholder="Enter Updated Item Name" name = "item_name" value = "'.$data['item_name'].'">
                      </div>
                      <div class="form-group">
                        <label for="forQuantity">Update Quantity</label>
                        <input type="number" class="form-control" id="forQuantity" aria-describedby="ItemQuantity" placeholder="Enter Updated Quantity" name = "quantity" value = "'.$data['quantity'].'">
                      </div>
                      <div class="form-group">
                        <label for="forPrice">Update Quantity</label>
                        <input type="number" class="form-control" id="forPrice" aria-describedby="ItemPrice"
                          placeholder="Enter Updated Price" name = "price" value = "'.$data['price'].'">
                      </div>

                  </div>
                  <div class="modal-footer">
                    <button class="btn btn-primary" name = "btn-update">Update</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>
            
            <div class="modal fade" id="deleteItem'.$data['id'].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
              aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Item</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                  <h5 class="card-title">Are you sure you want to delete '.$data['item_name'].'?</h5>
                  <form action = "index.php" method = "GET">
                  <input type = "number" name = "item_id" value = "'.$data['id'].'" hidden>
                  </div>
                  <div class="modal-footer">
                    <button class="btn btn-primary" name = "btn-delete">Delete</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>            
              ';
            }
          ?>
          </tbody>
        </table>
      </div>
    </div>
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Add Item</h5>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">Add</button>
      </div>
    </div>
    <!-- Add Item BEGIN -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="index.php" method="POST">
              <div class="form-group">
                <label for="forName">Item Name</label>
                <input type="text" class="form-control" id="forName" aria-describedby="name" placeholder="Item Name"
                  name="item_name">
              </div>
              <div class="form-group">
                <label for="forAge">Quantity</label>
                <input type="number" class="form-control" id="forAge" placeholder="Quantity" name="quantity">
              </div>
              <div class="form-group">
                <label for="forAddress">Price</label>
                <input type="number" class="form-control" id="forAddress" placeholder="Price" name="price">
              </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-primary" name="nsrt-btn-sbmt">Insert</button>
          </div>
          </form>
        </div>
      </div>
    </div>
    <!-- Add Item END -->

  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
  </script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
  </script>
</body>

</html>