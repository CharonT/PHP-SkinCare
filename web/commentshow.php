<?php 
    $newId=$_GET['newid'];
    $sqlCommentNew="SELECT * FROM new_comment WHERE newid = '$newId'";
    $resultCommentNew=mysqli_query($connect,$sqlCommentNew);
    $numRow=mysqli_num_rows($resultCommentNew);
?>
<div class="comment-sec-area">
    <div class="container">
        <div class="row flex-column">
            <h6><?=$numRow?> Comments</h6>
            <div class="comment-list">
        <?php     
                while($rowCommentNew=mysqli_fetch_assoc($resultCommentNew)){
                   
                    $sqlShowComment="SELECT * FROM comment WHERE id = ".$rowCommentNew['commentid'];
                    $resultShowComment=mysqli_query($connect,$sqlShowComment);
                    
                    while($rowShowComment = mysqli_fetch_assoc($resultShowComment)){?>
                <div class="single-comment justify-content-between d-flex">
                    <div class="user justify-content-between d-flex">
                        <!-- <div class="thumb">
                            <img src="img/blog/c1.jpg" alt="">
                        </div> -->
                        <div class="desc">
                            <h5><a href="#"><?=$rowShowComment['createdby']?></a></h5>
                            <p class="date"><?=$rowShowComment['createddate']?></p>
                            <p class="comment">
                                <?=$rowShowComment['content']?>
                            </p>
                          
                        </div>
                    </div>
                    <div class="reply-btn">
                        <a href="" class="btn-reply text-uppercase">reply</a>
                    </div>
                </div>
                    </br>
                  <?php
                         }
                        
                        }?>
            </div>
            <!-- <div class="comment-list left-padding">
												<div class="single-comment justify-content-between d-flex">
													<div class="user justify-content-between d-flex">
														<div class="thumb">
															<img src="img/blog/c2.jpg" alt="">
														</div>
														<div class="desc">
															<h5><a href="#">Emilly Blunt</a></h5>
															<p class="date">December 4, 2017 at 3:12 pm </p>
															<p class="comment">
																Never say goodbye till the end comes!
															</p>
														</div>
													</div>
													<div class="reply-btn">
														<a href="" class="btn-reply text-uppercase">reply</a>
													</div>
												</div>
											</div> -->

        </div>
    </div>
</div>