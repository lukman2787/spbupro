<?php

//Ajax_crudModel.php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';

    protected $primaryKey = 'user_id';

    protected $allowedFields = ['name', 'username', 'gender', 'date_birth', 'address'];

    public function noticeTable()
    {
        $builder = $this->db->table('users');
        return $builder;
    }

    function btnAction()
    {
        $action_button = function ($row) {
            return '
				<button type="button" name="edit" class="btn btn-warning btn-sm edit" data-id="' . $row['user_id'] . '">Edit</button>
				&nbsp;
				<button type="button" class="btn btn-danger btn-sm delete" data-id="' . $row['user_id'] . '">Delete</button>
				';
        };

        return $action_button;
    }
}
