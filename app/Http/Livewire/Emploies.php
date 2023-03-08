<?php

namespace App\Http\Livewire;

use Livewire\WithFileUploads;
use App\Models\Employe;
use Livewire\Component;
use phpDocumentor\Reflection\Types\This;

class Emploies extends Component
{
    use WithFileUploads;
    public  $name,$image, $email, $phone, $destination, $password, $employe_edit_id, $employe_delete_id; 
    
    public $view_employe_id, $view_employe_image, $view_employe_name, $view_employe_email, $view_employe_phone,$view_employe_destination;

    //Input fields on update validation
    public function updated($fields)
    {
        $this->validateOnly($fields, [
       
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'destination' => 'required',
            'image' => 'image|max:1024',
        ]);
    }


    public function storeEmployeData()
    {
        //on form submit validation
        $this->validate([
 
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'destination' => 'required',
            'image' => 'image|max:1024',
            
        ]);

        //Add Student Data
        $employe = new Employe();
        $employe->image= $this->image->store('photos','public');;
        $employe->name = $this->name;
        $employe->email = $this->email;
        $employe->phone = $this->phone;
        $employe->destination = $this->destination;
        $employe->password= $this->password;
        $employe->save();

        session()->flash('message', 'New employe has been added successfully');

       
        $this->name = '';
        $this->email = '';
        $this->phone = '';
        $this->destination = '';
        $this->password = '';

        //For hide modal after add student success
        $this->dispatchBrowserEvent('close-modal');
    }

    public function resetInputs()
    {
        
        $this->name = '';
        $this->email = '';
        $this->phone = '';
        $this->destination = '';
        $this->password = '';
        
    }

    public function close()
    {
        $this->resetInputs();
    }

    public function editEmploye($id)
    {
        $employe = Employe::where('id', $id)->first();
       
        $this->employe_edit_id=$employe->id;
      $this->name = $employe->name;
      
        $this->email = $employe->email;
      $this->image=$employe->image;
      
        $this->phone = $employe->phone;
        $this->destination = $employe->destination;
        $this->dispatchBrowserEvent('show-edit-employe-modal');
    }
    
    public function editEmployeData()
    {
        //on form submit validation
        $this->validate([
            // 'student_id' => 'required|unique:students,student_id,'.$this->student_edit_id.'', //Validation with ignoring own data
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'destination' => 'required',
        ]);

        $employe = Employe::where('id',$this->employe_edit_id)->first();
        
        $employe->name = $this->name;
        $employe->email = $this->email;
        $employe->phone = $this->phone;
        $employe->destination = $this->destination;
        $employe->save();

        session()->flash('message', 'Employe has been updated successfully');

        //For hide modal after add student success
        $this->dispatchBrowserEvent('close-modal');
    }

    //Delete Confirmation
    public function deleteConfirmation($id)
    {
        $this->employe_delete_id = $id; //student id

        $this->dispatchBrowserEvent('show-delete-confirmation-modal');
    }

    public function deleteEmployeData()
    {
        $employe = Employe::where('id', $this->employe_delete_id)->first();
        $employe->delete();

        session()->flash('message', 'Student has been deleted successfully');

        $this->dispatchBrowserEvent('close-modal');

        $this->employe_delete_id = '';
    }

    public function cancel()
    {
        $this->employe_delete_id = '';
    }

    public function viewEmployeDetails($id)
    {
        $employe = Employe::where('id',$id)->first();
        
        $this->view_employe_id=$employe->id;
        $this->view_employe_image=$employe->image;
        $this->view_employe_name = $employe->name;
        $this->view_employe_email = $employe->email;
        $this->view_employe_phone = $employe->phone;
        $this->view_employe_destination = $employe->email;
        $this->dispatchBrowserEvent('show-view-employe-modal');
    }

    public function closeViewEmployeModal()
    {
        $this->view_employe_id='';
        $this->view_employe_name = '';
        $this->view_employe_email = '';
        
        $this->view_employe_phone = '';
        $this->view_employe_destination = '';
        $this->view_employe_image='';
    }

    public function render()
    {
        
        $employes = Employe::all();

        return view('livewire.Emploies', ['employes'=>$employes])->layout('livewire.layouts.app');
    }
}