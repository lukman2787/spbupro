<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ProfileModel;

class Dashboard extends BaseController
{
	public function __construct()
	{
		$this->profiles = new ProfileModel();
	}

	public function index()
	{
		return view('backend/dashboard', [
			'title' => 'Dashboard',
			'profile' => $this->profiles->find(1),
		]);
	}

	public function editProfile()
	{
		return view('backend/profiles/edit', [
			'title' => 'Edit Profile',
			'profile' => $this->profiles->find(1),
		]);
	}

	public function updateProfile($id = null)
	{
		if (!$this->validate([
            'logo' => [
                'rules' => 'is_image[logo]'
                    . '|mime_in[logo,image/jpg,image/jpeg,image/png,image/webp]'
                    . '|max_size[logo,2048]'
            ],
			'background_image' => [
                'rules' => 'is_image[background_image]'
                    . '|mime_in[background_image,image/jpg,image/jpeg,image/png,image/webp]'
                    . '|max_size[background_image,2048]'
            ],
        ])) {
            return redirect()->back()->withInput();
        }

		// $db      = \Config\Database::connect();
		// $profile = $db->table('profiles')
		// 		->where('id', $id)
		// 		->get()
		// 		->getFirstRow();
		$profile = $this->profiles->find($id)[0];

		$reqLogo = $this->request->getFile('logo');
		$reqBackgroundImage = $this->request->getFile('background_image');

        if ($reqBackgroundImage->getError() == 4) {
            $backgroundImage = $profile->background_image;
        } else {
			$backgroundImage = $reqBackgroundImage->getRandomName();
			if ($profile->background_image) {
				unlink('uploads/profile/' . $profile->background_image);
            }
			$reqBackgroundImage->move('uploads/profile', $backgroundImage);
		}

		if ($reqLogo->getError() == 4) {
            $logo = $profile->logo;
        } else {
			$logo = $reqLogo->getRandomName();
			if ($profile->logo) {
				unlink('uploads/profile/' . $profile->logo);
            }
			$reqLogo->move('uploads/profile', $logo);
		}

		$this->profiles->update($id ,[
			'app_name' => $this->request->getPost('app_name'),
			'description' => $this->request->getPost('description'),
			'logo' => $logo,
			'background_image' => $backgroundImage,
		]);

		return redirect()->to(site_url('admin/dashboard'));
	}
}
