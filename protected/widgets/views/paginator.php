<?php
$totalPage = $this->paginator->totalPage;
$currentPage = $this->paginator->currentPage;
?>
<div class="paginator" style="padding-bottom: 30px;"">
    <ul class="list-unstyled list-inline pull-right">
        <span>Trang</span>

        <!--first number-->
        <?php
        $url = CHtml::encode(Yii::app()->request->baseUrl . '/' . $this->urlPaginator . 1);
        $selected = ($currentPage == 1) ? 'class="selected"' : '';
        ?>
        <li <?php echo $selected ?>>
            <?php echo CHtml::ajaxLink(1, $url, array('update' => $this->ajaxElementId)); ?>
        </li>
        <!--end first number-->

        <!--middle number-->
        <?php
        for ($i = 2; $i < $totalPage; $i++)://for middle number
            ?>
            <?php
            if ($i > $currentPage + 3):
                ?>
                <li><a>...</a></li>
                <?php
                break;
            endif;
            ?>
            <?php
            $selected = ($currentPage == $i) ? 'class="selected"' : '';
            $url = CHtml::encode(Yii::app()->request->baseUrl . '/' . $this->urlPaginator . $i);
            ?>
            <li <?php echo $selected ?>>
                <?php
                echo CHtml::ajaxLink($i, $url, array('update' => $this->ajaxElementId));
                ?>
            </li>
        <?php endfor;//end for middle number ?>
        <!--end middle number-->

        <!--last number-->    
        <?php
        if ($totalPage > 1):
            $selected = ($currentPage == $totalPage) ? 'class="selected"' : '';
            $url = CHtml::encode(Yii::app()->request->baseUrl . '/' . $this->urlPaginator . $totalPage);
            ?>
            <li <?php echo $selected ?>>
                <?php echo CHtml::ajaxLink($totalPage, $url, array('update' => $this->ajaxElementId)); ?>
            </li>
            <?php
        endif;
        ?>
        <!--end last number-->
    </ul>
</div>