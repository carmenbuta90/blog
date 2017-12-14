<?php include 'includes/header.php'; ?>
<?php   
    $id = $_GET['id'];
    //creaza un nou obiect database
    $db = new Database();
   
    
    //creaza query-ul pt postari
    $query = 'SELECT * FROM categories WHERE id='.$id;
    
    //run query
    $category =$db->select($query)->fetch_assoc();
    
    //creaza query-ul pt categorii
    $query = 'SELECT * FROM categories';
    
    //run query
    $categories = $db->select($query);
?>
<?php

 if(isset($_POST['submit'])){
      //seteaza variabile de post
      $name = mysqli_real_escape_string($db->link, $_POST['name']);
      
      //verif campuri goale
      if($name == ''){
          $error = "Please enter all required fields";
      }else{
      //fa query-ul de insert
      $query = "UPDATE categories SET 
               name = '$name' 
               WHERE id=".$id;
      
      $update_row = $db->update($query);  
      }
    }
?>
<?php

 if(isset($_POST['delete'])){
     $query = "DELETE FROM categories WHERE id=".$id;
     $delete_row= $db->delete($query);
 }
?>
<form method="post" action="edit_category.php?id=<?php echo $id;?>">
  <div class="form-group">
    <label>Category name</label>
    <input name="name" type="text" class="form-control" placeholder="Enter category" value="<?php echo $category['name'];?>">
  </div>
   <div>
     <input  name="submit" type="submit" class="btn btn-default" value="Submit">
      <a href="index.php" class="btn btn-default">Cancel</a>
      <input  name="delete" type="submit" class="btn btn-danger" value="Delete">
   </div>
    <br>
</form>
<?php include 'includes/footer.php'; ?> 

