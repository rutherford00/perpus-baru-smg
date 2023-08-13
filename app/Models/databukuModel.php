<?php

namespace App\Models;

use CodeIgniter\Model;

class databukuModel extends Model
{
    protected $table = 'buku';
    protected $primaryKey = 'id';

    public function getBuku($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }
        return $this->where(['slug' => $slug])->first();
    }

    public function search($keyword)
    {
        //$builder = $this->table('buku');
        //$builder->like('judul',$keyword);
        //return $builder;
        return $this->table('buku')->like('judul', $keyword)->orLike('isbn', $keyword)->orLike('jenis', $keyword)->orLike('lokasi', $keyword);
    }

    public function generateQrCode($id)
    {
        // Mendapatkan informasi buku berdasarkan ID
        $buku = $this->find($id);

        // Membuat data yang akan dijadikan konten QR Code
        $data = [
            'judul' => $buku['judul'],
            'jumlah_stok' => $buku['jumlah']
        ];

        // Menggunakan library QR Code untuk menghasilkan QR Code
        $this->load->library('ciqrcode');
        $params['data'] = json_encode($data);
        $params['level'] = 'H';
        $params['size'] = 10;
        $params['savename'] = FCPATH . 'assets/qr_codes/' . $id . '.png';
        $this->ciqrcode->generate($params);

        // Membaca file gambar QR Code dan mengembalikan datanya
        $qrCode = file_get_contents($params['savename']);

        return $qrCode;
    }

    public function getRakPenyimpanan($judul)
    {
        return $this->where('judul', $judul)->select('lokasi')->first();
    }
}
