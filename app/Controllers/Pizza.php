<?php namespace App\Controllers;
use App\Models\Peperoni;
class Pizza extends BaseController
{
	public function showFormPeperoni()
	{
		$pizzaModel = new Peperoni();
		$listPeperoni['peperoniList'] = $pizzaModel->findAll();
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
		$pizzaModel = new Peperoni();
		$pizzaModel->delete($id);
		return redirect()->to('/pizza');
	}
	public function showFormEdit($id)
	{
		$pizzaModel = new Peperoni();
		$data['editPizza'] = $pizzaModel-> find($id);
		return view('index',$data);
	}
	public function updatePizza(){
		$Pizzamodel = new Peperoni();
		$Pizzamodel->update($_POST['id'],$_POST);
		return redirect()->to('/pizza');

	}


	//--------------------------------------------------------------------

}