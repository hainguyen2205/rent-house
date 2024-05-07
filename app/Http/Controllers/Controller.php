<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public $obj, $filters = [], $orderBy = [], $per_page = 4, $jss = [], $title;
    public function addJs($js)
    {
        $this->jss[] = $js;
    }
    public function setTitle($title)
    {
        $this->title = $title;
    }
    public function addFilter($Column, $Condition, $Key)
    {
        array_push($this->filters, [
            'colName' => $Column,
            'queryConditions' => $Condition,
            'keyWord' => $Key,
        ]);
    }
    public function removeFilter($Column, $Condition, $Key)
    {
        foreach ($this->filters as $key => $filter) {
            if (
                $filter['colName'] === $Column &&
                $filter['queryConditions'] === $Condition &&
                $filter['keyWord'] === $Key
            ) {
                unset($this->filters[$key]);
                return;
            }
        }
    }
    public function clearFilters()
    {
        $this->filters = [];
    }
    public function setOrderBy($sortBy, $sortType)
    {
        $this->orderBy = [
            'sortBy' => $sortBy,
            'sortType' => $sortType,
        ];
    }
}
