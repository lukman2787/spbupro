<?php

namespace App\Models;

use CodeIgniter\Model;

class PostModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'posts';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'object';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = ['title', 'meta_keyword', 'meta_description', 'user_id', 'body', 'image', 'slug'];

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

	public function getCategory()
	{
		return $this->db->table('categories');
	}

	public function getAllPost()
	{
		return $this->db
			->table('posts')
			->join('category_post', 'category_post.post_id = posts.id')
			->join('categories', 'categories.id = category_post.category_id')
			->get()
			->getResultArray();
	}

	public function getPostWithCategories(int $postId)
	{
		return $this->db->table('posts')
				->join('category_post', 'category_post.post_id = posts.id')
				->join('categories', 'categories.id = category_post.category_id')
				->where('post_id', $postId)
				->get()->getFirstRow();
	}

	public function addCategoryToPost(int $categoryId, int $postId)
    {
        $data = [
            'category_id'  => $categoryId,
            'post_id' => $postId,
        ];

        return $this->db->table('category_post')->insert($data);
    }

	public function deleteAllCategoryFromPost(int $postId)
	{
		return $this->db->table('category_post')
			->where('post_id', $postId)
			->delete();
	}

	public function getPostWithUser($slug)
	{
		return $this->db->table('posts')
			->where('slug', $slug)
			->join('users', 'users.id = posts.user_id')
			->get()
			->getFirstRow();
	}

}
