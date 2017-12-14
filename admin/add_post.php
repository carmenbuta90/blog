<?php include 'includes/header.php'; ?>
<?php   
    //creaza un nou obiect database
    $db = new Database();
    
    //creaza insertul
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
      $query = "INSERT INTO posts (title, body, category, author, tags) VALUES ('$title','$body', $category, '$author', '$tags' )";
      $insert_row = $db->insert($query);  
      }
    }
?>
<?php
    //creaza query-ul pt categorii
    $query = 'SELECT * FROM categories';
    
    //run query
    $categories = $db->select($query);
?>

<form method="POST" action="add_post.php">
  <div class="form-group">
    <label>Post title</label>
    <input name="title" type="text" class="form-control" placeholder="Enter title">
  </div>
  <div class="form-group">
    <label>Post body</label>
    <textarea name="body" class="form-control" placeholder="Enter post body"></textarea>
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
        <option <?php echo $selected;?> value="<?php echo $row['id'];?>"><?php echo $row['name']; ?></option>
        <?php endwhile ;?>
    </select>
  </div>
  <div class="form-group">
    <label>Author</label>
    <input name="author" type="text" class="form-control" placeholder="Enter author name">
  </div>
  <div class="form-group">
    <label>Tags</label>
    <input name="tags" type="text" class="form-control" placeholder="Enter tags">
  </div>
  <div>
    <input  name="submit" type="submit" class="btn btn-default" value="Submit">
    <a href="index.php" class="btn btn-default">Cancel</a>
  </div>
    <br>
</form>

<?php include 'includes/footer.php'; ?>  
