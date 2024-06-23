<?php
namespace App\Repositories\Document;

use App\Models\Document;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

class DocumentRepository extends BaseRepository
{
    protected $model;
    public function __construct(Document $document)
    {
        $this->model = $document;
    }

    public function getDocumentGroup($group_id)
    {
        // dd(DB::table('documents')->select('*')->where('group_id',$group_id)->get()->all());
        return DB::table('documents')->select('name')->where('group_id',$group_id)->get()->all();
    }
}