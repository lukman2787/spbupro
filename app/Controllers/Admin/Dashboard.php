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
		// if (!$this->validate([
        //     'logo' => [
        //         'rules' => 'is_image[logo]'
        //             . '|mime_in[logo,logo/jpg,logo/jpeg,logo/png,logo/webp]'
        //             . '|max_size[logo,2048]'
        //     ],
		// 	'background_image' => [
        //         'rules' => 'is_image[background_image]'
        //             . '|mime_in[background_image,background_image/jpg,background_image/jpeg,background_image/png,background_image/webp]'
        //             . '|max_size[background_image,2048]'
        //     ],
        // ])) {
        //     return redirect()->back()->withInput();
        // }

		$reqLogo = $this->request->getFile('logo');
		$reqBackgroundImage = $this->request->getFile('background_image');
        if ($reqBackgroundImage->getError() == 4) {
            $backgroundImage = null;
        } else {
			$backgroundImage = $reqBackgroundImage->getRandomName();
			$reqBackgroundImage->move('uploads/profile', $backgroundImage);
		}

		if ($reqLogo->getError() == 4) {
            $logo = null;
        } else {
			$logo = $reqLogo->getRandomName();
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
