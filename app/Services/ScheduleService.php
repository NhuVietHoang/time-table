<?php

namespace App\Services;

use App\Repositories\Schedule\ScheduleRepository;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ScheduleService
{
    protected $scheduleRepository;
    public function __construct(ScheduleRepository $scheduleRepository)
    {
        $this->scheduleRepository = $scheduleRepository;
    }

    public function create($schedule)
    {
        try {
            return $this->scheduleRepository->store($schedule);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function getScheduleGroup($group_id)
    {
        return $this->scheduleRepository->getScheduleGroup($group_id);
    }
}
