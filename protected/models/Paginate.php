<?php

/**
 * paginating in yii 1.1.16
 * @author Tran Van Hoang <phatradang@gmail.com>
 */
class Paginate {

    /**
     * @var integer 
     */
    public $currentPage;

    /**
     * @var CActiveRecord 
     */
    private $__table;

    /**
     * @var integer 
     */
    private $__limitedRecord;
    /**
     * @var string 
     */
    private $__condition;

    /**
     * @var integer The quantity of page
     */
    public $totalPage;

    /**
     * @param integer $currentPage
     * @param CActiveRecord $table
     * @param integer $limitedRecord
     * @param string $condition
     */
    public function __construct($currentPage = null, CActiveRecord $table,$limitedRecord, $condition = null) {
        $this->__setCondition($condition);
        $this->__setTable($table);
        $this->__setRecordDisplay($limitedRecord);
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

    private function __setRecordDisplay($limitedRecord){
        $this->__limitedRecord = $limitedRecord;
    }
    /**
     * @param integer $currentPage
     */
    private function __setCurrentPage($currentPage) {
        $totalPage = $this->__getTotalPage();
        $currentPage = min($currentPage, $totalPage);
        $currentPage = max(1, $currentPage);
        $this->currentPage = $currentPage;
    }

    /**
     * @return integer
     */
    private function __getTotalPage() {
        $table = $this->__table;
        $quantityRecord = $table->count($this->__condition);
        $RecordDisplay = $this->__limitedRecord;
        $this->totalPage = ceil($quantityRecord / $RecordDisplay);
        return $this->totalPage;
    }

    /**
     * @param integer $limitedRecord The limited record
     * @return string
     */
    public function limitSQl() {
        $limitedRecord = $this->__limitedRecord;
        $currentPage = $this->currentPage;
        if (($currentPage == null) || ($currentPage == 1)) {
            $start = 0;
        } else {
            $start = ($currentPage - 1) * $limitedRecord;
        }
        $sql = " LIMIT $start,$limitedRecord";
        return $sql;
    }

}
