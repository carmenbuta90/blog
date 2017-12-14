<?php include 'includes/header.php'; ?>
<?php   

    //creaza un nou obiect database
    $db = new Database();
    $id = $_GET['id'];
    
    //creaza query-ul pt postari
    $query = 'SELECT * FROM posts WHERE id='.$id;
    
    //run query
    $post =$db->select($query)->fetch_assoc();
    
    //creaza query-ul pt categorii
    $query = 'SELECT * FROM categories';
    
    //run query
    $categories =$db->select($query);
?>
          <div class="blog-post">
            <h2 class="blog-post-title"><?php echo $post['title']; ?></h2>
            <p class="blog-post-meta"><?php echo formatDate($post['date']);?> by <a href="#"><?php echo $post['author'];?></a></p>
            <p><?php echo $post['body'];?></p>
          </div><!-- /.blog-post -->
<?php include 'includes/footer.php'; ?>