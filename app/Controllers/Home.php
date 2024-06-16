<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function url()
    {
        $directoryURI = $_SERVER['REQUEST_URI'];
        $path = parse_url($directoryURI, PHP_URL_PATH);
        $components = explode('/', $path);
        return $components[1];
    }

    public function showImage($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('blog');
        $image = $builder->select('image, image_type')->where('id_blog', $id)->get()->getRow();

        if (!$image) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Image not found');
        }

        return $this->response->setHeader('Content-Type', $image->image_type)
            ->setBody($image->image);
    }
    public function index()
    {
        $directory = FCPATH . 'img/carousel'; // count how many files in img/carousel for carousel purpose
        $files = scandir($directory);
        $num_files = count($files) - 2;

    $data['post'] = $this->m_blog->OrderBy('id_blog',"DESC")->findAll(3);

        $link['url'] = $this->url();
        $data['files'] = $num_files;
        echo view('top', $link);
        echo view('v_home', $data);
        echo view('bottom');
    }
    public function blog()
    {
        $data['blog'] = $this->m_blog->findAll();
        $link['url'] = $this->url();
        echo view('top', $link);
        echo view('v_blog', $data);
        echo view('bottom');
    }
    public function forum()
    {
        $link['url'] = $this->url();
        // $data['forum'] = $this->m_forum->findAll();
        $builder = $this->db->table('forum');
        $data['forum'] = $builder->select("*")->OrderBy('id_forum',"DESC")->join("user",'user.id_user=forum.id_user')->get()->getResultArray();
        $data['users'] = $builder->join("user",'user.id_user=forum.id_user')->select('forum.id_user, COUNT(*) as post_count, username')->groupBy('forum.id_user')->OrderBy('post_count',"DESC")->get()->getResultArray();
        // dd($data);
        echo view('top', $link);
        echo view('v_forum',$data);
        echo view('bottom');
    }
    public function foruminsert(){
        // dd($_POST);
        // $_POST['inner'] = htmlspecialchars();
        if($this->m_forum->insert($_POST)){
            return redirect()->back()->with('message', 'Forum Posted');
        }
        else{
            return redirect()->back()->with('message', 'Forum Failed to Post');
        }
    }
    public function reply(){
        // dd($_POST);
        if($this->m_reply->insert($_POST)){
            return redirect()->back()->with('message', 'Reply Posted');
        }
        else{
            return redirect()->back()->with('message', 'Forum Failed to Post');
        }
    }
    public function viewblog(int $id_blog)
    {
        $link['url'] = $this->url();
        // $data['data'] = $this->m_blog->where('id_blog',$id_blog)->first();
        $builder = $this->db->table('blog');
        $data['data'] = $builder->select("*")->where('id_blog',$id_blog)->join("user",'user.id_user=blog.id_user')->limit(1)->get()->getResultArray();
        // dd($data)
        echo view('top', $link);
        echo view('v_viewblog',$data);
        echo view('bottom');
    }
    public function viewforum(int $id_forum)
    {
        $link['url'] = $this->url();
        // $data['data'] = $this->m_blog->where('id_blog',$id_blog)->first();
        $builder = $this->db->table('forum');
        $data['data'] = $builder->select("*")->where('id_forum',$id_forum)->join("user",'user.id_user=forum.id_user')->limit(1)->get()->getResultArray();
        $data['reply'] = $this->m_reply->where('id_forum',$id_forum)->join("user",'user.id_user=reply.id_user')->findAll();
        
        // dd($data);
        // dd($data)
        echo view('top', $link);
        echo view('v_viewforum',$data);
        echo view('bottom');
    }
    public function about()
    {
        $link['url'] = $this->url();
        echo view('top', $link);
        echo view('v_about');
        echo view('bottom');
    }

    public function login()
    {
        $akun = $this->m_user->where('username', $_POST['username'])->orWhere('email', $_POST['username'])->first();
        // dd($akun);

        if (count($akun) !== 0) {
            $verify = password_verify($_POST['password'], $akun['password']);
            if ($verify) {
                // if ($akun['password'] == $_POST['password']) {
                session()->set('login', true);
                session()->set('id_user', $akun['id_user']);
                session()->set('role', $akun['role']);
                return redirect()->back();
            } else {
                return redirect()->back()->with('message', 'Password Salah');
            }
        } else {
            return redirect()->back()->with('message', 'Akun tidak ditemukan');
        }
    }

    public function register()
    {
        $cek = $this->m_user->where('email', $_POST['email'])->first();
        $cek2 = $this->m_user->where('username', $_POST['username'])->first();
        $_POST['role'] = "user";
        foreach ($_POST as $key => $value) {
            if (is_array($value)) {
                $_POST[$key] = array_map('htmlspecialchars', $value);
            } else {
                $_POST[$key] = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
            }
        }
        // dd($_POST);
        if ($cek == null) {
            if ($cek2 == null) {
                if ($_POST['password'] == $_POST['c_password']) {
                    $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
                    if ($this->m_user->insert($_POST)) {
                        return redirect()->back()->with('message', 'Register Berhasil');
                    } else {
                        return redirect()->back()->with('message', 'Register Gagal');
                    }
                } elseif ($_POST['password'] !== $_POST['c_password']) {
                    return redirect()->back()->with('message', 'Confirmation Password tidak sama');
                }
            } elseif ($cek2 !== null) {
                return redirect()->back()->with('message', 'Username sudah dipakai');
            }
        } elseif ($cek !== null) {
            return redirect()->back()->with('message', 'Email sudah dipakai');
        }
    }

    public function insert()
    {
        $file = $this->request->getFile('image');
        $blob = file_get_contents($file->getTempName());
        $builder = $this->db->table('blog');
        if ($builder->insert([
            'judul' => $_POST['judul'],
            'isi' => $_POST['isi'],
            'id_user' => $_POST['id_user'],
            'image' => $blob,
            'image_type' => $file->getMimeType()
        ])) {
            // if ($this->m_blog->insert($_POST)) {
            return redirect()->back()->with('message', 'Input Blog berhasil');
        } else {
            return redirect()->back()->with('message', 'Gagal');
        }
    }

    public function logout()
    {
        session_destroy();
        return redirect()->back();
    }
}
