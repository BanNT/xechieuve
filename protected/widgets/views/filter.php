<div class="row">
    <div class="col-md-12 headbox">
        <p class="headbox">Lọc theo loại xe</p>
    </div>
    <div class="col-md-12 box boxfilter">
        <ul class="list-unstyled" >
            <div class="row">
                <?php
                foreach ($loaiXeGhep as $loai):
                    $url = Chtml::encode($this->url . ConvertURL::refine($loai->loai_xe_ghep) . '?id=' . $loai->ma_loai_xe_ghep);
                    $loaiXeGhep = Chtml::encode($loai->loai_xe_ghep);
                    ?>
                    <li><a href="<?php echo $url; ?>"><?php echo $loaiXeGhep ?></a></li>
                    <?php
                endforeach;
                ?>
            </div>
        </ul>
    </div>
</div>