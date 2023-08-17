<style type="text/css">
  /* Product Page */

.products {
  margin-top: 50px;
  margin-bottom: 50px;
}

.products .filters {
  text-align: center;
  border-bottom: 1px solid #eee;
  padding-bottom: 10px;
  margin-bottom: 60px;
}

.products .filters li {
  text-transform: uppercase;
  font-size: 13px;
  font-weight: 700;
  color: #121212;
  display: inline-block;
  margin: 0px 10px;
  transition: all .3s;
  cursor: pointer;
}

.products .filters ul li.active,
.products .filters ul li:hover {
  color: #f33f3f;
}

.products ul.pages {
  margin-top: 30px;
  text-align: center;
}

.products ul.pages li {
  display: inline-block;
  margin: 0px 2px;
}

.products ul.pages li a {
  width: 44px;
  height: 44px;
  display: inline-block;
  line-height: 42px;
  border: 1px solid #eee;
  font-size: 15px;
  font-weight: 700;
  color: #121212;
  transition: all .3s;
}

.products ul.pages li a:hover,
.products ul.pages li.active a {
  background-color: #f33f3f;
  border-color: #f33f3f;
  color: #fff;
}

.product-item a img {
  width: 100%;
  height: 290px;
}

.des:hover {
  border: 2px solid #62BFE6;
  cursor: pointer;
}
</style> 

 <div class="products">
      <div class="container">
        <div class="row"> 
          <div class="col-md-12">
            <div class="filters-content">
                <div class="row grid">
                  <?php
                  $search = isset($_POST['search']) ? $_POST['search']:"";

                  if ($search=="") {
                    # code...
                      $mydb->setQuery("SELECT * 
                      FROM  `tblserviceprovider`");
                  }else{

                      $mydb->setQuery("SELECT * 
                      FROM  `tblserviceprovider` WHERE Services LIKE '%" .$search. "%' OR ServiceName LIKE '%" .$search. "%'");
                  }

              $r = $mydb->executeQuery();
              $maxrow = $mydb->num_rows($r);

              if($maxrow > 0){
              $cur = $mydb->loadResultList();

            foreach ($cur as $result) {
?>

                    <div class="col-lg-4 col-md-4 all des">
                      <div class="product-item">
                      <H1><?php echo $result->Services;?></H1>  
                        <a href="index.php?q=singleservice&id=<?php echo $result->ServiceID;?>"><img src="images/<?php echo $result->PicLoc;?>"   alt=""></a>
                        <div class="down-content">
                          <a href="index.php?q=singleservice&id=<?php echo $result->ServiceID;?>"><h4><?php echo $result->ServiceName;?></h4></a> 
                
                        </div>
                      </div>
                    </div> 

<?php }

}else{

  echo "<h3>No result found!</h3>";
} ?>
                </div>
            </div>
          </div>
         <!--  <div class="col-md-12">
            <ul class="pages">
              <li><a href="#">1</a></li>
              <li class="active"><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
            </ul>
          </div> -->
        </div>
      </div>
    </div> 