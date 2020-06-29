<?php namespace App\Controllers;
use App\Models\Peperoni;
class Pizza extends BaseController
{
	public function showFormPeperoni()
	{
		$users = new Peperoni();
		// $users-> insert($data);
		$listPeperoni['peperoniList'] = $users->findAll();
		return view('index',$listPeperoni);
	}
	public function addPeperoni(){
		$data = [];
		if($this->request->getMethod() == "post"){
			helper(['form']);
			$rules = [
				'name'=>'required',
				'price'=>'required|min_length[1]|max_length[50]',
				'ingredient'=>'required',
				
			];
				$pizzaModel = new Peperoni();
				$name = $this->request->getVar('name');
				$ingredient = $this->request->getVar('ingredient');
				$price = $this->request->getVar('price');
				$pizzaData = array(
					'name'=>$name,
					'ingredient'=>$ingredient,
					'price'=>$price
				);
				$pizzaModel->insert($pizzaData);
		}
		return redirect()->to('/pizza');

	}
	public function deletePizza($id)
	{
		$pizza = new Peperoni();
		$pizza->delete($id);
		return redirect()->to('/pizza');
	}
	// public function updatePizza(){

	// }


	//--------------------------------------------------------------------

}