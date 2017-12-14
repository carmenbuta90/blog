<?php include 'includes/header.php'; ?>
<?php   
    //creaza un nou obiect database
    $db = new Database();
    
    //creaza insertul
    
    if(isset($_POST['submit'])){
      //seteaza variabile de post
      $name = mysqli_real_escape_string($db->link, $_POST['name']);
      
      //verif campuri goale
      if($name == ''){
          $msg = "Please enter category name";
      }else{
      //fa query-ul de insert
      $query = "INSERT INTO categories(name) VALUES ('$name' )";
      $update_row = $db->update($query);  
      }
    }
?>

<form method="post" action="add_category.php">
  <div class="form-group">
    <label>Category name</label>
    <input name="name" type="text" class="form-control" placeholder="Enter category">
  </div>
   <div>
    <input  name="submit" type="submit" class="btn btn-default" value="Submit">
   </div>
    <br>
</form>
<?php include 'includes/footer.php'; ?> 

