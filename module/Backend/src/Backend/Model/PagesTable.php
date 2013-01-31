<?php

namespace Backend\Model;

use Zend\Db\TableGateway\TableGateway;

class PagesTable
{
    protected $tableGateway;

    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
        $resultSet = $this->tableGateway->select();
        return $resultSet;
    }

    public function getPages($id)
    {
        $id  = (int) $id;
        $rowset = $this->tableGateway->select(array('page_id' => $id));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $id");
        }
        return $row;
    }

    public function savePages(Pages $pages)
    {
        $data = array(
            'page_id'   => $pages->page_id,
            'title'     => $pages->title,
            'content'   => $pages->content,
            'time'      => $pages->time,
        );

        $id = (int)$pages->page_id;
        if ($id == 0) {
            $this->tableGateway->insert($data);
        } else {
            if ($this->getPages($id)) {
                $this->tableGateway->update($data, array('page_id' => $id));
            } else {
                throw new \Exception('Form id does not exist');
            }
        }
    }

    public function deletePages($id)
    {
        $this->tableGateway->delete(array('page_id' => $id));
    }
}