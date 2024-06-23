<?php

namespace App\Services;

use App\Repositories\Document\DocumentRepository;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DocumentService
{
    protected $documentRepository;
    public function __construct(DocumentRepository $documentRepository)
    {
        $this->documentRepository = $documentRepository;
    }

    public function create($document)
    {
        $this->documentRepository->store($document);
    }

    public function getListDocumentGroup($id)
    {
        return $this->documentRepository->getDocumentGroup($id);
    }
}