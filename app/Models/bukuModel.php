<?php

namespace App\Models;

use CodeIgniter\Model;

class bukuModel extends Model
{
    protected $table = 'buku';
    protected $primaryKey = 'id';
    protected $allowedFields = ['isbn', 'gambar', 'judul', 'slug', 'penulis', 'penerbit', 'jenis', 'tahun', 'halaman', 'jumlah', 'lokasi'];

    public function getBuku($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }
        return $this->where(['slug' => $slug])->first();
    }
    //Function untuk mengisi otomatis form di transaksi buku
    public function search($keyword)
    {
        return $this->table('buku')->like('judul', $keyword)->orLike('isbn', $keyword)->orLike('jenis', $keyword)->orLike('lokasi', $keyword);
    }
    public function stok($jumlah)
    {
        return $this->table('buku')->select('jumlah', $jumlah)->where('isbn', $jumlah);
    }
    public function getBukuByIsbn($isbn)
    {
        return $this->table('buku')->getWhere(['isbn' => $isbn])->getRowArray();
    }
    public function getBukuByID($id)
    {
        return $this->db->table('buku')->getWhere(['id' => $id])->getRow();
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
}
