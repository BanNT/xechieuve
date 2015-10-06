  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img class="img-responsive" src="<?php echo Yii::app()->request->baseUrl; ?>/images/slide/1.jpg" title="slide" />
      </div>

      <div class="item">
        <img class="img-responsive" src="<?php echo Yii::app()->request->baseUrl; ?>/images/slide/2.jpg" title="slide" />
      </div>

      <div class="item">
        <img class="img-responsive" src="<?php echo Yii::app()->request->baseUrl; ?>/images/slide/3.jpg" title="slide" />
      </div>
    
      <div class="item">
        <img class="img-responsive" src="<?php echo Yii::app()->request->baseUrl; ?>/images/slide/4.jpg" title="slide" />
      </div>

    </div>

    <!-- Controls -->
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <!--span class="glyphicon glyphicon-chevron-left"></span-->
  </a>

  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
       <!--span class="glyphicon glyphicon-chevron-left"></span-->
  </a>
  </div>
