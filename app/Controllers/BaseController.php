<?php

namespace App\Controllers;

use App\Models\ModelUser;
use App\Models\ModelKursus;
use App\Models\ModelReply;
use App\Models\ModelForum;
use App\Models\ModelBlog;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var list<string>
     */
    protected $helpers = [];

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    // protected $session;

    /**
     * @return void
     */
     protected $db;
     protected $m_user;
     protected $m_kursus;
     protected $m_blog;
     protected $m_forum;
     protected $m_reply;
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        session();
        date_default_timezone_set("Asia/Jakarta");
        $this->db = \Config\Database::connect();
        $this->m_user = new ModelUser();
        $this->m_kursus = new ModelKursus();
        $this->m_blog = new ModelBlog();
        $this->m_forum = new ModelForum();
        $this->m_reply = new ModelReply();

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();
    }
}
