<?php include('conn.php')

?> 
<!-- Start Category Area -->
        <section class="htc__category__area ptb--100">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section__title--2 text-center">
                            <h2 style="font-family: inherit;" class="title__line">Tất cả sản phẩm</h2>
                            <p>But I must explain to you how all this mistaken idea</p>
                        </div>
                    </div>
                </div>
                <div class="htc__product__container">
                    <div class="row">
                        <div class="product__list clearfix mt--30">
                            <!-- Start Single Category -->
							<?php 
                            if(isset($_REQUEST['btntimkiem'])) {
                                $tukhoa = $_POST['txttimkiem'];
                               // echo $tukhoa ;
                                $sql= "select * from makeup where ten like '%".$tukhoa."%'" ;
                            } else {
                                $results_per_page = 8; 
                              $sql = "select * from makeup ";
                                    }
										$ketqua = mysqli_query($conn,$sql);
                                        $number_of_result = mysqli_num_rows($ketqua);
                                        $number_of_page = ceil ($number_of_result / $results_per_page);
                                        $page_first_result = ($page-1) * $results_per_page;
                                        $query = "Select * from makeup LIMIT $page_first_result,$results_per_page";

                                        $ketqua = mysqli_query($conn, $query);
                                      
												while($row= mysqli_fetch_array($ketqua)) {
										?>
                            <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12" >
								
                                <div class="category" >
									
                                    <div class="ht__cat__thumb">
                                        <a href="#">
                                            <img src="./anhsanpham/<?php echo $row['hinhanh'];?>"  width="280" height="280"  alt="product images">
                                        </a>
                                    </div>
                                    <div class="fr__hover__info">
                                        <ul class="product__action">
                                            <li><a href="wishlist.html"><i class="icon-heart icons"></i></a></li>

                                            <li><a href="themhang1.php?ma=<?php echo $row['ma'] ?>"><i class="icon-handbag icons"></i></a></li>

                                            <li><a href="#"><i class="icon-shuffle icons"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="fr__product__inner">
										
                                        <h4><a href="chitietsanpham.php?ma=<?php echo $row['ma'] ?>" ><?php echo $row['ten']; ?></a></h4>
                                        <ul class="fr__pro__prize">
                                            
                                            <li style="font-style:italic; color: #F30206; "><?php echo number_format($row['gia']); ?> đ</li>
                                        </ul>
										
                                    </div>
									
                                </div>
								
                            </div>
							<?php }  ?>
                            <!-- End Single Category -->
                                       
                           <!-- Start Pagenation -->
                           <div class="row">
                            <div class="col-xs-12">
                                <ul class="htc__pagenation">
                                   <li><a href="#"><i class="zmdi zmdi-chevron-left"></i></a></li> 
                                   <?php 
                                   
                                   for($page = 1; $page<= $number_of_page; $page++) { 
                                       
                                       ?>

                                    <li class="active"><a href="./trangchu.php?page=<?php echo $page; ?>"><?php echo $page; ?></a></li>
                                
                                <?php } ?>
                                    
                                   
                                   <li><a href="#"><i class="zmdi zmdi-chevron-right"></i></a></li> 
                                </ul>
                            </div>
                        </div>
                        <!-- End Pagenation -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Category Area -->

        <!-- End Category Area -->