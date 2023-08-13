<?php

namespace App\Controllers;

use App\Models\anggotaModel;

use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class Anggota extends BaseController
{
    protected $anggotaModel;
    protected $helpers = ['form'];
    public function __construct()
    {
        $this->anggotaModel = new anggotaModel();
    }

    public function index()
    {
        $keywork = $this->request->getVar('keywork');
        if ($keywork) {
            $anggota = $this->anggotaModel->search($keywork);
        } else {
            $anggota = $this->anggotaModel;
        }
        //$anggota = $this->anggotaModel->findAll();
        $data = [
            'title' => 'Kelola Anggota',
            'anggota' => $this->anggotaModel->getAnggota()
        ];

        return view('anggota/index', $data);
    }

    public function import()
    {
        if (!$this->validate([
            'import_file' => [
                'uploaded[import_file]',
                'mime_in[import_file,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet]',
                'max_size[import_file,10240]',
            ]
        ])) {
            return redirect()->to('/anggota')->withInput()->with('errors', $this->validator->getErrors());
        }

        $file = $this->request->getFile('import_file');
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $spreadsheet = $reader->load($file);
        $worksheet = $spreadsheet->getActiveSheet();
        $rows = $worksheet->toArray();

        $anggotaModel = new AnggotaModel();
        foreach ($rows as $row) {
            $data = [
                'nomor' => $row[0],
                'foto' => empty($row[1]) ? 'defaultp.jpg' : $row[1], // Jika kolom gambar kosong, isi dengan 'defaultp.jpg'
                'nama' => $row[2],
                'kelas' => $row[3],
                'gender' => $row[4],
                'alamat' => $row[5],
                'nomorhp' => $row[6],
                'slug' => url_title($row[2], '-', true)
            ];
            $anggotaModel->insert($data);
        }

        session()->setFlashdata('pesan', 'Anggota Berhasil ditambahkan.');

        return redirect()->to('/anggota');
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Anggota',
            'validation' => \Config\Services::validation()
        ];

        return view('anggota/create', $data);
    }

    public function edit($slug)
    {
        $data = [
            'title' => 'Ubah Data Anggota',
            'validation' => \Config\Services::validation(),
            'anggota' => $this->anggotaModel->getAnggota($slug)
        ];

        return view('anggota/edit', $data);
    }


    public function save()
    {
        //validasi input anggota
        if (!$this->validate([
            'nama' => [
                'rules' => 'required|is_unique[anggota.nama]',
                'errors' => [
                    'required' => '{field} anggota harus sudah diisi.',
                    'is_unique' => '{field} anggota sudah tersedia.'
                ]
            ],
            'foto' => [
                'rules' => 'is_image[foto]|max_size[foto,10240]',
                'errors' => [
                    'is_image' => 'File yang diupload harus foto (JPEG,JPG,PNG)',
                    'max_size' => 'Ukuran foto tidak boleh melebihi 10mb'
                ]
            ]
        ])) {
            //$validation = \Config\Services::validation();
            //return redirect()->to('/anggota/create')->withInput()->with('validation', $validation);
            return redirect()->to('/anggota/create')->withInput();
        }
        //Untuk mengambl gambil foto
        $fileFoto = $this->request->getFile('foto');

        //Apabila tidak upload foto
        if ($fileFoto->getError() == 4) {
            $namaFoto = 'defaultp.jpg';
        } else {
            //Untuk memindahkan file
            $fileFoto->move('img');
            //Untuk mengambil nama file
            $namaFoto = $fileFoto->getName();
        }

        $slug = url_title($this->request->getVar('nama'), '-', true);
        $this->anggotaModel->save([
            'nomor' => $this->request->getVar('nomor'),
            'foto' => $namaFoto,
            'nama' => $this->request->getVar('nama'),
            'slug' => $slug,
            'kelas' => $this->request->getVar('kelas'),
            'gender' => $this->request->getVar('gender'),
            'alamat' => $this->request->getVar('alamat'),
            'nomorhp' => $this->request->getVar('nomorhp')
        ]);

        session()->setFlashdata('pesan', 'Anggota Berhasil ditambahkan.');

        return redirect()->to('/anggota');
    }

    public function delete($id)
    {
        //mencari foto yang akan dihapus
        $anggota = $this->anggotaModel->find($id);
        //agar tidak menghapus foto default
        if ($anggota['foto'] != 'defaultp.jpg') {
            //untuk menghapus foto
            unlink('img/' . $anggota['foto']);
        }

        $this->anggotaModel->delete($id);
        session()->setFlashdata('pesan', 'Anggota Berhasil dihapus.');
        return redirect()->to('/anggota');
    }

    public function update($id)
    {
        //cek nama
        $anggotaLama = $this->anggotaModel->getAnggota($this->request->getVar('slug'));
        if ($anggotaLama['nama'] == $this->request->getVar('nama')) {
            $rule_nama = 'required';
        } else {
            $rule_nama = 'required|is_unique[anggota.nama]';
        }
        if (!$this->validate([
            'nama' => [
                'rules' => $rule_nama,
                'errors' => [
                    'required' => '{field} anggota harus sudah diisi.',
                    'is_unique' => '{field} anggota sudah tersedia.'
                ]
            ],
            'foto' => [
                'rules' => 'is_image[foto]|max_size[foto,10240]',
                'errors' => [
                    'is_image' => 'File yang diupload harus foto (JPEG,JPG,PNG)',
                    'max_size' => 'Ukuran foto tidak boleh melebihi 10mb'
                ]
            ]
        ])) {
            return redirect()->to('/anggota/edit/' . $this->request->getVar('slug'))->withInput();
        }

        $fileFoto = $this->request->getFile('foto');

        //Untuk mengecek foto, apa masih foto lama atau tidak
        if ($fileFoto->getError() == 4) {
            $namaFoto = $this->request->getVar('fotoLama');
        } else {
            //mengambil nama foto lama
            $namaFoto = $fileFoto->getName();

            $fileFoto->move('img');
            if ($this->request->getVar('fotoLama') != 'defaultp.jpg') {
                // Untuk menghapus file yang lama
                unlink('img/' . $this->request->getVar('fotoLama'));
            }
        }

        $slug = url_title($this->request->getVar('nama'), '-', true);
        $this->anggotaModel->save([
            'id' => $id,
            'nomor' => $this->request->getVar('nomor'),
            'foto' => $namaFoto,
            'nama' => $this->request->getVar('nama'),
            'slug' => $slug,
            'kelas' => $this->request->getVar('kelas'),
            'gender' => $this->request->getVar('gender'),
            'alamat' => $this->request->getVar('alamat'),
            'nomorhp' => $this->request->getVar('nomorhp')
        ]);
        session()->setFlashdata('pesan', 'Anggota Berhasil diubah.');

        return redirect()->to('/anggota');
    }
}
