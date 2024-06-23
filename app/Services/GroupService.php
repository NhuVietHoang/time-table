<?php

namespace App\Services;

use App\Repositories\Group\GroupRepository;
use App\Repositories\Schedule\ScheduleRepository;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GroupService
{
    protected $groupRepository;
    protected $documentService;
    protected $scheduleService;
    public function __construct(GroupRepository $groupRepository, DocumentService $documentService, ScheduleService $scheduleService)
    {
        $this->groupRepository = $groupRepository;
        $this->documentService = $documentService;
        $this->scheduleService = $scheduleService;
    }

    public function showIndexGroup()
    {
        if (empty($groups)) {
            return view('admin.group.empty-list');
        }
        return view('admin.group.index');
    }

    public function showDetailGroup($id)
    {
        $documents = $this->documentService->getListDocumentGroup($id);
        $schedules = $this->scheduleService->getScheduleGroup($id);
        return view('admin.group.index', [
            'id' => $id,
            'documents' => $documents,
            'schedules' => $schedules,
        ]);
    }

    public function getUserGroup()
    {
        try {
            return Auth::user()->groups->all();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function creatGroup($infoGroup)
    {
        DB::beginTransaction();

        try {
            $infoGroup['code'] = $this->randomCodeGroup(6);
            $group = $this->groupRepository->store($infoGroup);
            $group->users()->attach(Auth::id());

            DB::commit();
            return response()->json([
                'message' => 'Group created successfully!',
                'group' => $group
            ], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            report($e);
            throw $e;
        }
    }
    public function randomCodeGroup($lengthCode)
    {
        try {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $lengthCode; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function userJoinGroup($lengthCode)
    {
        try {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $lengthCode; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function showGroup($id)
    {
        $this->groupRepository->find($id);
    }

    public function uploadDocument($requestFile)
    {
        $originalName = $this->getnameDocument($requestFile);
        $this->saveDocumentToStorage($requestFile, $originalName);
        $path = $requestFile->file('filename')->storeAs('uploads', $originalName, 'public');
        $this->saveDocumentToDatabase([
            'name' => $originalName,
            'group_id' => $requestFile->group_id
        ]);
        return back()->with('success', 'Tải lên file thành công.')->with('path', $path);
    }
    public function saveDocumentToDatabase($document)
    {
        return $this->documentService->create($document);
    }

    public function getnameDocument($document)
    {
        return $document->file('filename')->getClientOriginalName();
    }

    public function saveDocumentToStorage($document, $originalName)
    {
        return $document->file('filename')->storeAs('uploads', $originalName, 'public');
    }
}
