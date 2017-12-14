<?php include 'includes/header.php'; ?>
<?php 
    //creaza un nou obiect database
    $db = new Database();
    
    //selecteaza postarile pe categorii
    if(isset($_GET['category'])){
        $category = $_GET['category'];
        //creaza query-ul pt postari pe categorii
        $query = 'SELECT * FROM posts WHERE category ='.$category;
        //run query
        $posts =$db->select($query);
        }else{
        //creaza query-ul pt categorii
        $query = 'SELECT * FROM posts ORDER BY id DESC';
        //run query
        $posts =$db->select($query);
        }
    
    //creaza query-ul pt categorii
    $query = 'SELECT * FROM categories';
    
    //run query
    $categories =$db->select($query);
    
    
?>
<?php if($posts) : ?>
    <?php while($row = $posts->fetch_assoc()): ?>
          <div class="blog-post">
            <h2 class="blog-post-title"><?php echo $row['title'];?></h2>
            <p class="blog-post-meta"><?php echo formatDate($row['date']);?> <a href="#"><?php echo $row['author'];?></a></p>
            <p><?php echo shortenText($row['body']);?></p>
            <a class="readmore" href="post.php?id=<?php echo urlencode($row['id']);?>">Read more</a>
          </div><!-- /.blog-post -->
    <?php endwhile ;?>      
<?php else: ?>
          <p>There are no posts yet.</p>
<?php endif; ?>
<?php include 'includes/footer.php'; ?>