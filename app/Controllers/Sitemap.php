<?php namespace App\Controllers;

use CodeIgniter\Controller;

use App\Libraries\LibSitemap;

class Sitemap extends Controller
{
	protected $helpers = ['url','date'];

    public function __construct()
    {
		// Disini saya tidak menggunakan model untuk query database tapi menggunakan \Config\Database::connect();
		// Yang artinya saya langsung melakukan query disini
        $this->db = \Config\Database::connect();
		$this->libsitemap = new LibSitemap();
	}

	public function index()
	{
		return view('sitemap');
	}

	//Fungsi ini digunakan untuk membuat peta situs/sitemap
	// changefreq dan priority diambil dari POST form submit di view
	public function create_sitemap()
	{
		if (!empty($_POST)) {
			$changefreq = (!empty($_POST['changefreq']) ? $_POST['changefreq'] : 'weekly');
			$priority = (!empty($_POST['priority']) ? $_POST['priority'] : '0.6');

			//Tambahkan URL anda
			//$this->libsitemap->add('URL anda', 'Tanggal', 'frequency', 'priority');
			$this->libsitemap->add(base_url(), date('Y-m-d', now()), $changefreq, '1.0');
			$this->libsitemap->add(base_url('blog'), date('Y-m-d', now()), $changefreq, '0.9');

			//Untuk konten URLnya silahkan di sesuaikan dengan punya anda
			$dataposts = $this->db->table('posts')->get()->getResult();
			foreach($dataposts as $entry){
				$this->libsitemap->add($entry->slug, date('Y-m-d', now()), $changefreq, $priority);
			}


			$x = $this->libsitemap->output();
			$this->response->setXML($x);
			return redirect()->to(base_url('sitemap.xml'));
		}
	}
}