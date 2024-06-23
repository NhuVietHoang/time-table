<?php
namespace App\Repositories\Schedule;

use App\Models\Schedule;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

class ScheduleRepository extends BaseRepository
{
    protected $model;
    public function __construct(Schedule $schedule)
    {
        $this->model = $schedule;
    }

    public function getScheduleGroup($groupId)
    {
        // dd(DB::table('schedules')->select('*')->where('group_id', $groupId)->get()->all());
        return DB::table('schedules')->select('*')->where('group_id', $groupId)->get()->all();
    }
}