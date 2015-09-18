<?php

/**
 * paginating in yii 1.1.16
 * @author Tran Van Hoang <phatradang@gmail.com>
 */
class Paginate {

    /**
     * @var integer 
     */
    private $__currentPage;

    /**
     * @var CActiveRecord 
     */
    private $__table;

    /**
     * @var integer
     */
    private $__totalPage;

    /**
     * @var string 
     */
    private $__condition;

    public function __construct($currentPage = null, CActiveRecord $table, $condition = null) {
        $this->__setCondition($condition);
        $this->__setTable($table);
        $this->__setCurrentPage($currentPage);
    }

    private function __setCondition($condition) {
        $this->__condition = $condition;
    }

    /**
     * @param CActiveRecord $table
     */
    private function __setTable($table) {
        $this->__table = $table;
    }

    /**
     * @param integer $currentPage
     */
    private function __setCurrentPage($currentPage) {
        $totalPage = $this->__getTotalPage();
        $currentPage = min($currentPage, $totalPage);
        $currentPage = max(1, $currentPage);
        $this->__currentPage = $currentPage;
    }

    /**
     * @param integer $RecordDisplay The limited record
     * @return string
     */
    public function limitSQl($RecordDisplay) {
        $currentPage = $this->__currentPage;
        if (($currentPage == null) || ($currentPage == "1")) {
            $start = 0;
        } else {
            $start = ($currentPage - 1) * $RecordDisplay;
        }
        $sql = " LIMIT $start,$RecordDisplay";
        return $sql;
    }

    /**
     * @return integer
     */
    public function __getTotalPage() {
        $table = $this->__table;
        return sizeof($table->findAll($this->__condition));
    }

}
