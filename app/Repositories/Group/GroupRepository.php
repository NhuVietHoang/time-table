<?php
namespace App\Repositories\Group;

use App\Models\Group;
use App\Repositories\BaseRepository;

class GroupRepository extends BaseRepository
{
    protected $model;
    public function __construct(Group $group)
    {
        $this->model = $group;
    }

}