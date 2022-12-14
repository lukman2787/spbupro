<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'categories';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'object';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = ['name', 'slug'];

	// Dates
	protected $useTimestamps        = true;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';
	protected $deletedField         = 'deleted_at';

	// Validation
	protected $validationRules      = [];
	protected $validationMessages   = [];
	protected $skipValidation       = false;
	protected $cleanValidationRules = true;

	// Callbacks
	protected $allowCallbacks       = true;
	protected $beforeInsert         = [];
	protected $afterInsert          = [];
	protected $beforeUpdate         = [];
	protected $afterUpdate          = [];
	protected $beforeFind           = [];
	protected $afterFind            = [];
	protected $beforeDelete         = [];
	protected $afterDelete          = [];

	public function deleteCategoriesFormPost(int $postId)
	{
		return $this->db->table('category_post')
			->where('post_id', $postId)
			->delete();
	}

	public function getPostCategory(int $postId)
	{
		return $this->db->table('categories')
            ->join('category_post', 'category_post.category_id = categories.id')
            ->where('post_id', $postId)
            ->get()->getResultObject();
	}

	public function countPostsBelongsToCategory($categoryId)
	{
		$builder = $this->db->table('category_post');
		return $builder->selectCount('id')
				->where('category_id', $categoryId)
				->get()
				->getFirstRow()->id;
	}
}
