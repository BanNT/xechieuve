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
     * @var integer
     */
    public $limit;

    /**
     * @var integer
     */
    public $offset;

    /**
     * @var CActiveRecord 
     */
    private $__table;

    /**
     * @var string 
     */
    private $__condition;

    /**
     * @var integer The total of page
     */
    public $totalPage;

    /**
     * @param integer $currentPage
     * @param CActiveRecord $table
     * @param integer $limitedRecord
     * @param string $condition
     */
    public function __construct($currentPage = null, CActiveRecord $table, $limitedRecord, $condition = null) {
        $this->__setCondition($condition);
        $this->__setTable($table);
        $this->limit = $limitedRecord;
        $this->__setCurrentPage($currentPage);
        $this->offset = $this->__getOffset();
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
        $this->currentPage = $currentPage;
    }

    /**
     * @return integer
     */
    private function __getTotalPage() {
        $table = $this->__table;
        
        $sql = 'SELECT COUNT(*) FROM ' . $table->tableName();
        $sql .= isset($this->__condition) ? " WHERE " . $this->__condition : '';
        
        $quantityRecord = $table->countBySql($sql);
        $RecordDisplay = $this->limit;
        $this->totalPage = ceil($quantityRecord / $RecordDisplay);
        return $this->totalPage;
    }

    /**
     * @return integer
     */
    private function __getOffset() {
        $limitedRecord = $this->limit;
        $currentPage = $this->currentPage;
        if (($currentPage == null) || ($currentPage == 1)) {
            $offset = 0;
        } else {
            $offset = ($currentPage - 1) * $limitedRecord;
        }
        return $offset;
    }

}
