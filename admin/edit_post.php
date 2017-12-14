<?php include 'includes/header.php'; ?>
<?php   
    $id = $_GET['id'];
    //creaza un nou obiect database
    $db = new Database();
   
    
    //creaza query-ul pt postari
    $query = 'SELECT * FROM posts WHERE id='.$id;
    
    //run query
    $post =$db->select($query)->fetch_assoc();
    
    //creaza query-ul pt categorii
    $query = 'SELECT * FROM categories';
    
    //run query
    $categories = $db->select($query);
?>

<?php

 if(isset($_POST['submit'])){
      //seteaza variabile de post
      $title = mysqli_real_escape_string($db->link, $_POST['title']);
      $body = mysqli_real_escape_string($db->link, $_POST['body']);
      $category = mysqli_real_escape_string($db->link ,$_POST['category']);
      $author = mysqli_real_escape_string($db->link, $_POST['author']);
      $tags = mysqli_real_escape_string($db->link, $_POST['tags']);
      
      //verif campuri goale
      if($title == '' || $category == '' || $author == '' || $tags == ''){
          $error = "Please enter all required fields";
      }else{
      //fa query-ul de insert
      $query = "UPDATE posts SET 
               title = '$title', 
               body= '$body', 
               category = $category,
               author = '$author',
               tags = '$tags' WHERE id=".$id;
      
      $update_row = $db->update($query);  
      }
    }
?>

<?php

 if(isset($_POST['delete'])){
     $query = "DELETE FROM posts WHERE id=".$id;
     $delete_row= $db->delete($query);
 }
?>
<form method="POST" action="edit_post.php?id=<?php echo $id; ?>">
  <div class="form-group">
    <label>Post title</label>
    <input name="title" type="text" class="form-control" placeholder="Enter title" value="<?php echo $post['title']; ?>">
  </div>
  <div class="form-group">
    <label>Post body</label>
    <textarea name="body" class="form-control" placeholder="Enter post body"><?php echo $post['body']; ?></textarea>
  </div>
  <div class="form-group">
    <label>Category</label>
    <select name="category" class="form-control">
        <?php while($row = $categories->fetch_assoc()): ?>
        <?php if($row['id']==$post['category']){
            $selected = 'selected';
        }else{
            $selected = '';
        }
        ?>
        <option value="<?php echo $row['id']; ?>" <?php echo $selected;?>><?php echo $row['name']; ?></option>
        <?php endwhile ;?>
    </select>
  </div>
  <div class="form-group">
    <label>Author</label>
    <input name="author" type="text" class="form-control" value="<?php echo $post['author']; ?>" placeholder="Enter author name">
  </div>
  <div class="form-group">
    <label>Tags</label>
    <input name="tags" type="text" class="form-control" value="<?php echo $post['tags']; ?>" placeholder="Enter tags">
  </div>
  <div>
    <input  name="submit" type="submit" class="btn btn-default" value="Submit">
    <a href="index.php" class="btn btn-default">Cancel</a>
    <input  name="delete" type="submit" class="btn btn-danger" value="Delete">
  </div>
    <br>
</form>

<?php include 'includes/footer.php'; ?>  

