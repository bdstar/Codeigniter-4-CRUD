<?php 
namespace App\Controllers;
use App\Models\UserModel;
use CodeIgniter\Controller;
class UserCrud extends Controller
{
    // show users list
    public function index(){
        $userModel = new UserModel();
        $data['users'] = $userModel->orderBy('id', 'DESC')->findAll();
        //SELECT * FROM users ORDER BY id DESC
        return view('user_view', $data);
    }
    // add user form
    public function create(){
        return view('add_user');
    }
 
    // insert data
    public function store() {
        $request = json_decode(file_get_contents('php://input'), TRUE);
        //echo "<pre>"; print_r($request); echo "</pre>"; //die;
        /*$data=$this->ektreemodel->insert_form($request);
        if($data){ echo "success"; }
        else{ echo "failure"; }*/

        $userModel = new UserModel();
        /*$data = [
            'name' => $this->request->getVar('name'),
            'email'  => $this->request->getVar('email'),
        ];*/
        //$userModel->insert($data);
        //echo "<pre>"; print_r($data); echo "</pre>"; die;
        if($userModel->insert($request)){ 
            //echo "success"; 
            return $this->response->redirect(site_url('/users-list'));
        }else{
            //echo "failure"; 
        }
    }
    // show single user
    public function singleUser($id = null){
        $userModel = new UserModel();
        $data['user_obj'] = $userModel->where('id', $id)->first();
        return view('edit_view', $data);
    }
    // update user data
    public function update(){
        $userModel = new UserModel();
        $id = $this->request->getVar('id');
        $data = [
            'name' => $this->request->getVar('name'),
            'email'  => $this->request->getVar('email'),
        ];
        $userModel->update($id, $data);
        return $this->response->redirect(site_url('/users-list'));
    }
 
    // delete user
    public function delete($id = null){
        $userModel = new UserModel();
        $data['user'] = $userModel->where('id', $id)->delete($id);
        return $this->response->redirect(site_url('/users-list'));
    }    
}