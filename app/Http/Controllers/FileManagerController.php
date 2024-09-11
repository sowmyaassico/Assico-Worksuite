<?php

namespace App\Http\Controllers;

use App\Helper\Files;
use App\Helper\Reply;
use App\Models\FileManager;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class FileManagerController extends AccountBaseController
{

    public function __construct()
    {
        parent::__construct();
        $this->pageTitle = 'File Manager';
    }

    public function index($company_id = 0)
    { //dd("ss");
        return view('filemanager.index')
            ->with($this->data);
    }

    public function result($company_id = 0){
   
      
    $results = FileManager::where('parent_id', 0);
        return DataTables::of($results)
        ->addColumn('edit', function ($result) {
            if($result->type == 1){
                $buttons = '<a class="dropdown-item edit-table-row openRightModal" href="'.route('filemanager.create.update', [1, $result->id, 1]).'" data-user-id="' . $result->id . '">
                            <i class="mr-2 fas fa-edit"></i>
                        </a>';
            } else {
                $buttons = '<a class="dropdown-item edit-table-row openRightModal" href="'.route('filemanager.create.update', [1, $result->id, 2]).'" data-user-id="' . $result->id . '">
                            <i class="mr-2 fas fa-edit"></i>
                        </a>';
            }
            return $buttons;
        })
        ->addColumn('download', function ($result) {
            if($result->type == 2){
                return '<a href="'. asset('user-uploads/'.$result->document) .'" download="'.$result->document_name.'"><i class="fas fa-download"></i></a>';
            } else {
                return '<a href="'. route('filemanager.list.index',[$result->company_id,$result->id]) .'"><i class="fas fa-eye"></i></a>';
            }
            
        })
            ->addColumn('delete', function ($result) {

                $buttons = '<a class="dropdown-item delete-table-row" id="quick-action-apply" href="javascript:deleteFile('.$result->id.');" data-user-id="' . $result->id . '">
                            <i class="mr-2 fa fa-trash"></i>
                        </a>';

                return $buttons;
            })
            ->editColumn('updated_at', function ($result) {
                return date('d-m-Y H:i:s', strtotime($result->updated_at));
            })
            ->addIndexColumn()
            ->escapeColumns([])
            ->setRowId('id')
            ->make(true);
    }

    public function createUpdate($company_id = 1, $id = 0, $type = 2)
    {   
        $this->pageTitle = 'Add file';
        if($type == 1){
            $this->pageTitle = 'Create New Folder';
        }
        $this->redirectUrl = request()->redirectUrl;
        if ($id == 0) {
            $obj = new FileManager;
        } else {
            $this->pageTitle = 'Edit file';
            if($type == 1){
                $this->pageTitle = 'Update Folder';
            }
            $obj = FileManager::where('id', $id)->first();
            if (is_null($obj)) {
                return redirect()->route('filemanager.index')->with('error', 'No resource found');
            }
        }
        $this->obj = $obj;
        $this->type = $type;
        $this->view = 'filemanager.ajax.create';

        if (request()->ajax()) {
            return $this->returnAjax($this->view);
        }
        return redirect()->route('filemanager.index')->with($this->data);
    }
    public function createUpdatePost(Request $request)
    {
        $data = $request->all();
        
        $obj = null;
        if($data['type'] == 2){
            if (!empty($data['document'])) {
                $data['document'] = Files::uploadLocalOrS3($data['document'],   'filemanager');
                $data['doc_type'] = \File::extension($data['document']);
                $data['document'] = 'filemanager/'.$data['document'];
                //uploadFile($data['document'], 'resource');
            } else {

                unset($data['document']);
            }
        } else {
            $data['version'] = $data['document'];
            $data['document_name'] = $data['document'];
        } 
        if ($data["id"] != 0) {
            $obj = FileManager::where('id', $data["id"])->first();
            if (is_null($obj)) {
                return response(json_encode(['response' => 'error', 'message' => "Resource not found"]), 404);
            }
            if(isset($data['document']) && $data['type'] == 2){
                \Storage::delete($obj->document);
            }
        }
        //remove by filename. no repeated filename allowed
        elseif ($data["version"] != '') {
            $filenam = FileManager::where('company_id', 1)->where('version', $data["version"])->first();

            if (!is_null($filenam)) {
                //\Storage::delete($obj->document);
                return response(json_encode(['response' => 'error', 'message' => "Filename not available"]), 404);
                //\Storage::delete($obj->document);
            }
        }
        if (is_null($obj)) {
            $res_msg = '201';
            $obj = FileManager::create($data);
        } else {
            $file = FileManager::where('id', $data['id'])->first();
            $file->update($data);
        }
        $view = view('filemanager.index', $this->data)->render();
        return Reply::dataOnly(['status' => 'success']);
    }

    
    public function applyQuickAction($id = 0)
    {
        //dd($id);
        $obj = FileManager::where('id', $id)->first();
        if($obj->type == 2){
            unlink(public_path('user-uploads/'.$obj->document));
        }
        $obj->delete();
        return Reply::success(__('messages.deleteSuccess'));
     }

    protected function deleteRecords(Request$request)
    {
        abort_403(user()->permission('delete_clients') !== 'all');
        $users = User::withoutGlobalScope(ActiveScope::class)->whereIn('id', explode(',', $request->row_ids))->get();
        $users->each(function ($user) {
            $this->deleteClient($user);
        });

        return true;
    }

    public function listIndex($company_id = 1, $parent_id = 0)
    {
        //if()
        $parent = FileManager::where('id', $parent_id)->first();
        return view('filemanager.list')
            ->with($this->data)
            ->with('parent', $parent);
    }

    public function listResult($company_id = 0, $parent_id = 0)
    {
       $results = FileManager::where('parent_id', $parent_id);
        return DataTables::of($results)
        ->addColumn('edit', function ($result) {
            if($result->type == 1){
            $buttons = '<a class="dropdown-item edit-table-row openRightModal" href="'.route('filemanager.list.create.update', [$result->id, 1, $result->parent_id]).'" data-user-id="' . $result->id . '">
                            <i class="mr-2 fas fa-edit"></i>
                        </a>';
            } else {
                $buttons = '<a class="dropdown-item edit-table-row openRightModal" href="'.route('filemanager.list.create.update', [$result->id, 2, $result->parent_id]).'" data-user-id="' . $result->id . '">
                            <i class="mr-2 fas fa-edit"></i>
                        </a>';
            }
            return $buttons;
        })
        ->addColumn('download', function ($result) {
            if($result->type == 2){
                return '<a href="'. asset('user-uploads/'.$result->document) .'" download="'.$result->document_name.'"><i class="fas fa-download"></i></a>';
            } else {
                return '<a href="'. route('filemanager.list.index',[$result->company_id,$result->id]) .'"><i class="fas fa-eye"></i></a>';
            }
            
        })
            ->addColumn('delete', function ($result) {

                $buttons = '<a class="dropdown-item delete-table-row" id="quick-action-apply" href="javascript:deleteFile('.$result->id.');" data-user-id="' . $result->id . '">
                            <i class="mr-2 fa fa-trash"></i>
                        </a>';

                return $buttons;
            })
            ->editColumn('updated_at', function ($result) {
                return date('d-m-Y H:i:s', strtotime($result->updated_at));
            })
            ->addIndexColumn()
            ->escapeColumns([])
            ->setRowId('id')
            ->make(true);  
    }

    public function listCreateUpdate($id = 0, $type = 2, $parent_id = 0)
    {
        $this->redirectUrl = request()->redirectUrl;
        if ($id == 0) {
            $obj = new FileManager;
        } else {
            $this->pageTitle = 'Edit file';
            if($type == 1){
                $this->pageTitle = 'Update Folder';
            }
            $obj = FileManager::where('id', $id)->first();
            if (is_null($obj)) {
                return redirect()->route('filemanager.index')->with('error', 'No resource found');
            }
        }
        $this->obj = $obj;
        $this->type = $type;
        $this->view = 'filemanager.ajax.createlist';
        $this->parent = FileManager::where("id", $parent_id)->first();
        if (request()->ajax()) {
            return $this->returnAjax($this->view);
        }
        return redirect()->route('filemanager.list.index')->with($this->data);
        //return view('filemanager.list.index', $this->data);
    }
    public function listCreateUpdatePost(Request $request)
    {

        $data = $request->all();

        $obj = null;
        if($data['type'] == 2){
            if (!empty($data['document'])) {
                $data['document'] = Files::uploadLocalOrS3($data['document'],   'filemanager');
                $data['doc_type'] = \File::extension($data['document']);
                $data['document'] = 'filemanager/'.$data['document'];
                //uploadFile($data['document'], 'resource');
            } else {

                unset($data['document']);
            }
        } else {
            $data['version'] = $data['document'];
            $data['document_name'] = $data['document'];
        } 
        if ($data["id"] != 0) {
            $obj = FileManager::where('id', $data["id"])->first();
            if (is_null($obj)) {
                return response(json_encode(['response' => 'error', 'message' => "Resource not found"]), 404);
            }
            if(isset($data['document']) && $data['type'] == 2){
                \Storage::delete($obj->document);
            }
        }
        //remove by filename. no repeated filename allowed
        elseif ($data["version"] != '') {
            $filenam = FileManager::where('company_id', 1)->where('version', $data["version"])->first();

            if (!is_null($filenam)) {
                //\Storage::delete($obj->document);
                return response(json_encode(['response' => 'error', 'message' => "Filename not available"]), 404);
                //\Storage::delete($obj->document);
            }
        }
        if (is_null($obj)) {
            $res_msg = '201';
            $obj = FileManager::create($data);
        } else {
            $file = FileManager::where('id', $data['id'])->first();
            $obj = $file->update($data);
        }
        $this->parent_id = $obj->parent_id;
        //$view = view('filemanager.list.index', $this->data)->render();
        return Reply::dataOnly(['status' => 'success']);
    }

    /**
     * @param Request $request
     * @return mixed|void
     * @throws \Froiden\RestAPI\Exceptions\RelatedResourceNotFoundException
     */

    /*public function index(ProjectsDataTable $dataTable)
    {
        $viewPermission = user()->permission('view_projects');
        abort_403((!in_array($viewPermission, ['all', 'added', 'owned', 'both'])));

        if (!request()->ajax()) {

            if (in_array('client', user_roles())) {
                $this->clients = User::client();
            }
            else {
                $this->clients = User::allClients();
                $this->allEmployees = User::allEmployees(null, true, ($viewPermission == 'all' ? 'all' : null));
            }

            $this->categories = ProjectCategory::all();
            $this->departments = Team::all();
            $this->projectStatus = ProjectStatusSetting::where('status', 'active')->get();
        }

        return $dataTable->render('projects.index', $this->data);

    }

    public function create()
    {
        $this->addPermission = user()->permission('add_projects');
        abort_403(!in_array($this->addPermission, ['all', 'added']));

        $this->pageTitle = __('app.addProject');
        $this->redirectUrl = request()->redirectUrl;

        $this->project = (request()['duplicate_project']) ? Project::with('client', 'members', 'members.user', 'members.user.session', 'members.user.employeeDetail.designation', 'milestones', 'milestones.currency')->withTrashed()->findOrFail(request()['duplicate_project'])->withCustomFields() : null;

        
        $project = new Project();

        $this->view = 'projects.ajax.create';

        if (request()->ajax()) {
            return $this->returnAjax($this->view);
        }

        return view('projects.create', $this->data);

    }

    public function store(Request $request)
    {

        if ($request->hasFile('file')) {

            $this->storeFiles($request);

            $this->files = ProjectFile::where('project_id', $request->project_id)->orderByDesc('id')->get();
            $view = view('projects.files.show', $this->data)->render();

            return Reply::dataOnly(['status' => 'success', 'view' => $view]);
        }
    }

    public function storeMultiple(Request $request)
    {
        if ($request->hasFile('file')) {
            $this->storeFiles($request);
        }
    }

    private function storeFiles($request)
    {
        foreach ($request->file as $fileData) {

            $file = new ProjectFile();
            $file->project_id = $request->project_id;

            $filename = Files::uploadLocalOrS3($fileData, ProjectFile::FILE_PATH . '/' . $request->project_id);

            $file->user_id = $this->user->id;
            $file->filename = $fileData->getClientOriginalName();
            $file->hashname = $filename;
            $file->size = $fileData->getSize();
            $file->save();
            $this->logProjectActivity($request->project_id, 'messages.newFileUploadedToTheProject');
        }
    }

    public function destroy(Request $request, $id)
    {
        $file = ProjectFile::findOrFail($id);
        $deleteDocumentPermission = user()->permission('delete_project_files');
        abort_403(!($deleteDocumentPermission == 'all' || ($deleteDocumentPermission == 'added' && $file->added_by == user()->id)));

        Files::deleteFile($file->hashname, ProjectFile::FILE_PATH . '/' . $file->project_id);

        ProjectFile::destroy($id);

        $this->files = ProjectFile::where('project_id', $file->project_id)->orderByDesc('id')->get();

        $view = view('projects.files.show', $this->data)->render();

        return Reply::successWithData(__('messages.deleteSuccess'), ['view' => $view]);
    }

    public function download($id)
    {
        $file = ProjectFile::whereRaw('md5(id) = ?', $id)->firstOrFail();
        $this->viewPermission = user()->permission('view_project_files');
        abort_403(!($this->viewPermission == 'all' || ($this->viewPermission == 'added' && $file->added_by == user()->id)));

        return download_local_s3($file, ProjectFile::FILE_PATH . '/' . $file->project_id . '/' . $file->hashname);

    }*/

}
