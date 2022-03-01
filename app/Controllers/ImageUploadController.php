<?php 

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ProfileModel;

class ImageUploadController extends Controller
{

    public function index() 
	{
        return view('index');
    }

    function uploadImage() { 
        
        helper(['form', 'url']);

        $database = \Config\Database::connect();
        $db = $database->table('profiles');
    
        /*$file = $this->validate([
            'file' => [
                'uploaded[file]',
                'mime_in[file, image/png, image/jpg, image/jpeg]',
                'max_size[file,4096]',
            ]
        ]);

        if (!$file) {
            print_r('Wrong file type selected');
        } else {*/
            //echo "<pre>"; print_r($this->request->getFile('file')); echo "</pre>"; die;
            $imageFile = $this->request->getFile('file');
            $imageFile->move(WRITEPATH . 'uploads');
            
            $data = [
               'file_name' =>  $imageFile->getName(),
               'file_type'  => $imageFile->getClientMimeType()
            ];
    
            $save = $db->insert($data);
            print_r('Image uploaded correctly!'); 
            return $this->response->redirect(site_url('/file-list'));       
        //}

    }


    public function files() 
	{
        $profileModel = new ProfileModel();
        $data['profiles'] = $profileModel->orderBy('id', 'DESC')->findAll();
        return view('file_view', $data);
    }
 
}