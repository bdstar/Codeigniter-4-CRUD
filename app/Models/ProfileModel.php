<?php 
namespace App\Models;
use CodeIgniter\Model;
class ProfileModel extends Model
{
    protected $table = 'profiles';
    protected $primaryKey = 'id';
    
    protected $allowedFields = ['file_name', 'file_type'];
} 