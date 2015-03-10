<?php 
use Sales\Repositories\EntityRepo;
use Sales\Repositories\BranchRepo;
use Sales\Repositories\UbigeoRepo;
use Sales\Managers\BranchManager;


class BranchController extends BaseController{

	protected $branchRepo;
	protected $entityRepo;
	protected $ubigeoRepo;

	public function __construct(UbigeoRepo $ubigeoRepo, BranchRepo $branchRepo, EntityRepo $entityRepo) {
		$this->branchRepo = $branchRepo;
		$this->entityRepo = $entityRepo;
		$this->ubigeoRepo = $ubigeoRepo;
	}

	public function listar($entity_id){
		$branches=$this->branchRepo->all_entity($entity_id);
		//dd($branches);
		return View::make('admin/entities/showbranch', compact('branches'));
	}
	public function listFind(){
		$data=Input::only('search');
		$search=$data['search'];
		if (!is_null($search)) {
			$branches = $this->branchRepo->search($search);
		} else {
			$branches = $this->branchRepo->all();
		}
		return View::make('admin/branch/listFind', compact('branches','search'));		
	}
	public function register()
	{
		if (!Request::isMethod('post')) {
			$entities = $this->entityRepo->getList();
			$ubigeo = $this->ubigeoRepo->listUbigeo();
			return View::make('admin/branch/form',compact('entities','ubigeo'));
		} else {
			$model = $this->branchRepo->newModel();
			$manager = new BranchManager($model, Input::all());
			$manager->save();
			return Redirect::route('branches');
		}
	}
	public function update($id=0)
	{
		if (!Request::isMethod('post')) {
			$branch = $this->branchRepo->find($id);
			$ubigeo = $this->ubigeoRepo->listUbigeo($branch->ubigeo_id);
			$entities = $this->entityRepo->getList();
			return View::make('admin/branch/form', compact('branch','entities','ubigeo'));
		} else {
			$data=Input::all();
			$branch = $this->branchRepo->find($data['id']);
			$manager = new BranchManager($branch, Input::all());
			$manager->save();
			return Redirect::route('branches');
		}
	}
	public function destroy($id)
	{
		$this->branchRepo->destroy($id);
		return Redirect::route('branches');
	}
	public function autocomplete()
	{
		$term=Input::get('term');
		$branches=$this->branchRepo->autocomplete($term);
		foreach ($branches as $branch) {
			$result[]=['value'=>$branch->name,'id'=>$branch->id, 'label'=>$branch->name];
		}
		//$result[]=['value'=>'Hola','id'=>'idd','label'=>'Hola'];
		return Response::json($result);
	}
}