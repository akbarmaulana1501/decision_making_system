<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminController extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_pegawai');
        $this->load->model('M_kriteria');
        $this->load->model('M_nilai');
        $this->load->model('M_user');
    }

    public function dashboard()
    {
        $this->load->view('admin/admin_dash');
    }

    public function dataPegawai()
    {
        $data['pegawai'] = $this->M_pegawai->get_all_pegawai();
        $this->load->view('admin/menu_pegawai/data_pegawai', $data);
    }

    public function tambahPegawai()
    {
        $this->load->view('admin/menu_pegawai/tambah_pegawai');
    }

    public function simpanPegawai()
    {
        $data = [
            'nama_kbn'        => $this->input->post('nama_kbn'),
            'nama_region'     => $this->input->post('nama_region'),
            'kode_unit'       => $this->input->post('kode_unit'),
            'nama_unit'       => $this->input->post('nama_unit'),
            'kode_nip'        => $this->input->post('kode_nip'),
            'nama'            => $this->input->post('nama'),
            'gender'          => $this->input->post('gender'),
            'tempat_lahir'    => $this->input->post('tempat_lahir'),
            'tgl_lahir'       => $this->input->post('tanggal_lahir'),
            'no_bpjs'         => $this->input->post('no_bpjs'),
            'tanggal_masuk'   => $this->input->post('tanggal_masuk'),
            'npwp'            => $this->input->post('npwp'),
            'kode_jabatan'    => $this->input->post('kode_jabatan')
        ];


        $insert = $this->M_pegawai->simpanPegawai($data);

        if ($insert) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Gagal menyimpan data.']);
        }
    }

    public function editPegawai($id)
    {
        $data['edit_data'] = $this->M_pegawai->get_by_id($id);
        $this->load->view('admin/menu_pegawai/edit_pegawai', $data);
    }

    public function updatePegawai()
    {
        $id = $this->input->post('id_pegawai');

        $data = [
            'nama_kbn'        => $this->input->post('nama_kbn'),
            'nama_region'     => $this->input->post('nama_region'),
            'kode_unit'       => $this->input->post('kode_unit'),
            'nama_unit'       => $this->input->post('nama_unit'),
            'kode_nip'        => $this->input->post('kode_nip'),
            'nama'            => $this->input->post('nama'),
            'gender'          => $this->input->post('gender'),
            'tempat_lahir'    => $this->input->post('tempat_lahir'),
            'tgl_lahir'       => $this->input->post('tanggal_lahir'),
            'no_bpjs'         => $this->input->post('no_bpjs'),
            'tanggal_masuk'   => $this->input->post('tanggal_masuk'),
            'npwp'            => $this->input->post('npwp'),
            'kode_jabatan'    => $this->input->post('kode_jabatan')
        ];

        $this->db->where('id', $id);
        $update = $this->db->update('pegawai2', $data);

        if ($update) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Gagal mengupdate data.']);
        }
    }

    public function hapusPegawai()
    {
        $id = $this->input->post('id');
        // var_dump($id);
        // die;
        if ($this->M_pegawai->hapusPegawai($id)) {
            echo json_encode([
                'status' => 'success',
                'message' => 'Data pegawai berhasil dihapus.'
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Gagal menghapus data pegawai.'
            ]);
        }
    }

    public function dataKriteria()
    {
        $data['kriteria'] = $this->M_kriteria->get_all_kriteria();
        $this->load->view('admin/menu_kriteria/data_kriteria', $data);
    }

    public function tambahKriteria()
    {
        $this->load->view('admin/menu_kriteria/tambah_kriteria');
    }

    public function editKriteria($id)
    {
        $data['edit_kriteria'] = $this->M_kriteria->get_by_id($id);
        $this->load->view('admin/menu_kriteria/edit_kriteria', $data);
    }

    public function simpanKriteria()
    {
        $data = [
            'kriteria' => $this->input->post('kriteria'),
            'sub_kriteria' => $this->input->post('sub_kriteria'),
            'bobot' => $this->input->post('bobot')
        ];


        $insert = $this->M_kriteria->simpan_kriteria($data);

        if ($insert) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Gagal menyimpan data.']);
        }
    }

    public function updateKriteria()
    {
        $id = $this->input->post('id_kriteria');

        $data = [
            'kriteria'        => $this->input->post('kriteria'),
            'bobot'     => $this->input->post('bobot')
        ];

        $this->db->where('id', $id);
        $update = $this->db->update('kriteria', $data);

        if ($update) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Gagal mengupdate data.']);
        }
    }


    public function hapusKriteria()
    {
        $id = $this->input->post('id');

        if ($this->M_kriteria->hapusKriteria($id)) {
            echo json_encode([
                'status' => 'success',
                'message' => 'Data Kriteria berhasil dihapus.'
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Gagal menghapus data Kriteria.'
            ]);
        }
    }

    public function dataNilaiKaryawan()
    {
        $data['nilai_karyawan'] = $this->M_nilai->get_all_nilai();
        $this->load->view('admin/nilai_karyawan/data_nilai_karyawan', $data);
    }

    public function tambahNilai()
    {
        $data['pegawai'] = $this->M_nilai->get_pegawai();
        $data['kriteria'] = $this->M_nilai->get_kriteria();
        $this->load->view('admin/nilai_karyawan/tambah_nilai_karyawan', $data);
    }

    public function editNilai($nip)
    {
        $data['pegawai'] = $this->M_nilai->get_pegawai_by_id($nip);
        $data['kriteria'] = $this->M_nilai->get_kriteria_by_id($nip);
        $this->load->view('admin/nilai_karyawan/edit_nilai_karyawan', $data);
    }

    public function simpanNilai()
    {
        $data = [
            'nama_pegawai' => $this->input->post('nama_pegawai'),
            'kriteria' => $this->input->post('kriteria'),
            'nilai' => $this->input->post('nilai')
        ];


        $insert = $this->M_nilai->simpan_nilai($data);

        if ($insert) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Gagal menyimpan data.']);
        }
    }

    public function updateNilai()
    {
        $id = $this->input->post('id_kriteria');

        $data = [
            'kriteria'        => $this->input->post('kriteria'),
            'bobot'     => $this->input->post('bobot')
        ];

        $this->db->where('id', $id);
        $update = $this->db->update('kriteria', $data);

        if ($update) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Gagal mengupdate data.']);
        }
    }


    public function hapusNilai()
    {
        $id = $this->input->post('id');

        if ($this->M_nilai->hapusNilai($id)) {
            echo json_encode([
                'status' => 'success',
                'message' => 'Data Nilai Karyawan berhasil dihapus.'
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Gagal menghapus Nilai Karyawan.'
            ]);
        }
    }

    public function dataUser()
    {
        $data['user'] = $this->M_user->get_all_user();
        $this->load->view('admin/user_management/user_manage', $data);
    }

    public function tambahUser()
    {
        $this->load->view('admin/user_management/tambah_user');
    }

    public function simpanUser()
    {
        $data = [
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'role' => $this->input->post('role')
        ];


        $insert = $this->M_user->simpan_user($data);

        if ($insert) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Gagal menyimpan data.']);
        }
    }

    public function hapusUser()
    {
        $id = $this->input->post('id');

        if ($this->M_user->hapusUser($id)) {
            echo json_encode([
                'status' => 'success',
                'message' => 'User berhasil dihapus.'
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Gagal menghapus data User.'
            ]);
        }
    }

    public function getNilai()
    {
        $id = $this->input->post('id');

        $data = $this->db->get_where('kriteria', ['id' => $id])->row();

        if ($data) {
            echo json_encode(['status' => 'success', 'nilai' => $data->bobot]);
        } else {
            echo json_encode(['status' => 'error']);
        }
    }

    public function delete_multiple_nilai()
    {
        $ids = $this->input->post('ids');
        if (!empty($ids)) {
            $this->M_nilai->delete_multiple($ids);
            echo json_encode(['status' => true]);
        } else {
            echo json_encode(['status' => false]);
        }
    }


    public function analisaKaryawan()
    {
        $data['kriteria'] = $this->M_kriteria->get_all_kriteria();
        $data['nilai'] = $this->M_nilai->get_all_nilai();
        $data['cluster'] = $this->M_nilai->get_cluster();
        $data['hasil_analisa'] = $this->M_nilai->hasil_analisa();
        $this->load->view('admin/analisa_karyawan/hasil_analisa', $data);
    }

    public function pengelompokanKaryawan()
    {
        $data['kriteria'] = $this->M_kriteria->get_all_kriteria();
        $data['nilai'] = $this->M_nilai->get_all_nilai();
        $data['cluster'] = $this->M_nilai->get_cluster();
        $this->load->view('admin/kelompok_karyawan/data_kelompok', $data);
    }

    public function hitung_topsis()
    {
        $nilai = $this->M_nilai->get_all_nilai();
        $kriteria = $this->M_kriteria->get_all_kriteria();

        // Gabungkan nilai berdasarkan nama pegawai & kriteria
        $dataGabungan = [];
        foreach ($nilai as $n) {
            $dataGabungan[$n->nama_pegawai][$n->kriteria] = floatval($n->nilai);
        }

        // Susun matriks
        $matrix = [];
        $namaPegawai = [];
        foreach ($dataGabungan as $nama => $nilaiKriteria) {
            $row = [];
            foreach ($kriteria as $k) {
                $row[] = $nilaiKriteria[$k->kriteria] ?? 0;
            }
            $matrix[] = $row;
            $namaPegawai[] = $nama;
        }

        $numRows = count($matrix);
        $numCols = count($kriteria);

        // Normalisasi
        $normalisasi = [];
        for ($j = 0; $j < $numCols; $j++) {
            $pembagi = sqrt(array_sum(array_map(function ($m) use ($j) {
                return pow($m[$j], 2);
            }, $matrix)));
            for ($i = 0; $i < $numRows; $i++) {
                $normalisasi[$i][$j] = ($pembagi != 0) ? $matrix[$i][$j] / $pembagi : 0;
            }
        }

        // Bobot terbobot
        $bobot = array_column($kriteria, 'bobot');
        $terbobot = [];
        for ($i = 0; $i < $numRows; $i++) {
            for ($j = 0; $j < $numCols; $j++) {
                $terbobot[$i][$j] = $normalisasi[$i][$j] * $bobot[$j];
            }
        }

        // Solusi ideal positif & negatif
        $idealPositif = [];
        $idealNegatif = [];
        foreach ($kriteria as $j => $k) {
            $colValues = array_column($terbobot, $j);
            if (strtoupper($k->kriteria) === 'K4') {
                // cost
                $idealPositif[$j] = min($colValues);
                $idealNegatif[$j] = max($colValues);
            } else {
                // benefit
                $idealPositif[$j] = max($colValues);
                $idealNegatif[$j] = min($colValues);
            }
        }

        // Hitung jarak
        $jarakPositif = [];
        $jarakNegatif = [];
        for ($i = 0; $i < $numRows; $i++) {
            $jarakPositif[$i] = sqrt(array_sum(array_map(function ($j) use ($terbobot, $idealPositif, $i) {
                return pow($terbobot[$i][$j] - $idealPositif[$j], 2);
            }, array_keys($idealPositif))));
            $jarakNegatif[$i] = sqrt(array_sum(array_map(function ($j) use ($terbobot, $idealNegatif, $i) {
                return pow($terbobot[$i][$j] - $idealNegatif[$j], 2);
            }, array_keys($idealNegatif))));
        }

        // Nilai preferensi (Ci)
        $hasil = [];
        for ($i = 0; $i < $numRows; $i++) {
            $ci = ($jarakPositif[$i] + $jarakNegatif[$i]) != 0
                ? $jarakNegatif[$i] / ($jarakPositif[$i] + $jarakNegatif[$i])
                : 0;
            $hasil[] = [
                'nama' => $namaPegawai[$i],
                'ci' => round($ci, 4)
            ];
        }

        // Urutkan berdasarkan Ci (desc) dan beri ranking
        usort($hasil, fn($a, $b) => $b['ci'] <=> $a['ci']);
        foreach ($hasil as $i => &$row) {
            $row['rank'] = $i + 1;
        }

        // ====== Simpan ke database ======
        foreach ($hasil as $row) {
            $data = [
                'nama_pegawai'     => $row['nama'],
                'nilai_preferensi' => $row['ci'],
                'rank'             => $row['rank'],
                'tanggal'          => date('Y-m-d H:i:s')
            ];

            // Update jika sudah ada, insert kalau belum
            $this->db->where('nama_pegawai', $row['nama']);
            $cek = $this->db->get('hasil_analisa')->row();
            if ($cek) {
                $this->db->where('nama_pegawai', $row['nama']);
                $this->db->update('hasil_analisa', $data);
            } else {
                $this->db->insert('hasil_analisa', $data);
            }
        }

        // Kirim balik ke frontend
        echo json_encode(['status' => true, 'data' => $hasil]);
    }




    public function normalisasiTopsis()
    {
        // Ambil data nilai pegawai
        $data = $this->M_nilai->get_all_nilai();

        // Ambil kriteria dari tabel 'kriteria'
        $kriteria = $this->db->get('kriteria')->result();

        // Menyiapkan key kriteria, jika ada format 'NamaKriteria - Keterangan', kita ambil bagian kedua (keterangan)
        $kriteria_keys = array_map(function ($k) {
            $parts = explode(' - ', $k->kriteria);
            return isset($parts[1]) ? strtolower(trim($parts[1])) : strtolower(trim($k->kriteria));
        }, $kriteria);

        // Array untuk menghitung akar jumlah kuadrat tiap kriteria
        $penyebut = array_fill(0, count($kriteria_keys), 0);

        // Kelompokkan data berdasarkan nama pegawai
        $groupedData = [];

        foreach ($data as $pegawai) {

            $splitNama = explode(' - ', $pegawai->nama_pegawai);
            $nama = trim($splitNama[1]);
            // $nama = $pegawai->nama_pegawai;

            // Ambil nama kriteria saja, misalnya dari "2 - Jujur" jadi "jujur"

            $splitKriteria = explode(' - ', $pegawai->kriteria);
            $namaKriteria = strtolower(trim($splitKriteria[1]));

            // Inisialisasi array pegawai jika belum ada
            if (!isset($groupedData[$nama])) {
                $groupedData[$nama] = [
                    'nama' => $nama,
                    'nilai' => []
                ];
            }

            // Isi nilai kriteria
            $groupedData[$nama]['nilai'][$namaKriteria] = floatval($pegawai->nilai);
        }



        // Hitung penyebut (akar jumlah kuadrat tiap kriteria)
        foreach ($groupedData as $pegawai) {
            foreach ($kriteria_keys as $i => $key) {
                $nilai = isset($pegawai['nilai'][$key]) ? $pegawai['nilai'][$key] : 0;
                $penyebut[$i] += pow($nilai, 2);
            }
        }


        // Ambil akar dari setiap nilai penyebut
        foreach ($penyebut as $i => $val) {
            $penyebut[$i] = sqrt($val);
        }

        // Proses normalisasi
        $result = [];
        foreach ($groupedData as $nama_pegawai => $pegawai) {
            $row = [];
            $row['nama'] = $pegawai['nama'];
            $row['normalisasi'] = [];

            foreach ($kriteria_keys as $i => $key) {
                $nilai = isset($pegawai['nilai'][$key]) ? $pegawai['nilai'][$key] : 0;
                $penyebut_i = $penyebut[$i] != 0 ? $penyebut[$i] : 1; // Hindari pembagian dengan 0
                $row['normalisasi'][$key] = $nilai / $penyebut_i;
            }

            $result[] = $row;
        }

        // Kembalikan data normalisasi dan kriteria ke frontend
        echo json_encode([
            'data' => $result, // Data normalisasi pegawai
            'kriteria' => $kriteria, // Data kriteria untuk digunakan di frontend
        ]);
    }

    public function proses_kmeans()
    {
        $nilai = $this->M_nilai->get_all_nilai();
        $kriteria = $this->M_nilai->get_kriteria();

        // Gabungkan data berdasarkan nama pegawai
        $dataGabungan = [];
        $pegawaiNames = [];

        foreach ($nilai as $item) {
            $partsNama = explode(' - ', $item->nama_pegawai);
            $nama = isset($partsNama[1]) ? trim($partsNama[1]) : $item->nama_pegawai;

            $partsKriteria = explode(' - ', $item->kriteria);
            $namaKriteria = isset($partsKriteria[1]) ? trim($partsKriteria[1]) : $item->kriteria;

            if (!isset($dataGabungan[$nama])) {
                $dataGabungan[$nama] = [];
            }

            $dataGabungan[$nama][$namaKriteria] = $item->nilai;
        }

        // Konversi ke array numerik untuk K-Means
        $dataCluster = [];
        foreach ($dataGabungan as $nama => $nilaiKriteria) {
            $pegawaiNames[] = $nama;
            $row = [];
            foreach ($kriteria as $k) {
                $parts = explode(' - ', $k->kriteria);
                $namaKriteria = isset($parts[1]) ? trim($parts[1]) : $k->kriteria;
                $row[] = isset($nilaiKriteria[$namaKriteria]) ? floatval($nilaiKriteria[$namaKriteria]) : 0;
            }
            $dataCluster[] = $row;
        }

        // Normalisasi (pastikan fungsi normalizeMinMax ada)
        $dataCluster = $this->normalizeMinMax($dataCluster);

        // Jalankan K-Means (3 cluster)
        $labels = $this->kmeans($dataCluster, 3);

        // Pastikan label integer
        $labels = array_map('intval', $labels);

        // Ambil daftar cluster id aktual yang muncul (tidak mengasumsikan 0..2)
        $clusterIds = array_values(array_unique($labels));

        // Inisialisasi penampung per-cluster
        $clusterSum = [];
        $clusterCount = [];
        foreach ($clusterIds as $id) {
            $clusterSum[$id] = 0.0;
            $clusterCount[$id] = 0;
        }

        // Hitung total/rata tiap cluster (gunakan rata-rata baris)
        foreach ($labels as $i => $c) {
            if (!isset($clusterSum[$c])) {
                $clusterSum[$c] = 0;
                $clusterCount[$c] = 0;
            }
            $clusterSum[$c] += (array_sum($dataCluster[$i]) / count($dataCluster[$i]));
            $clusterCount[$c]++;
        }

        // Rata-rata per cluster
        $clusterAvg = [];
        foreach ($clusterIds as $id) {
            $clusterAvg[$id] = ($clusterCount[$id] > 0) ? ($clusterSum[$id] / $clusterCount[$id]) : 0;
        }

        // Urutkan cluster berdasarkan rata-rata (tertinggi → terendah)
        arsort($clusterAvg);
        $sortedClusterIds = array_keys($clusterAvg);

        // Mapping label teks: index 0 -> C3 (tertinggi), 1->C2, 2->C1
        $labelOrder = ['C3', 'C2', 'C1'];
        $clusterLabels = [];

        foreach ($sortedClusterIds as $idx => $clusterId) {
            $clusterLabels[$clusterId] = isset($labelOrder[$idx]) ? $labelOrder[$idx] : 'C1';
        }

        // Pastikan semua possible cluster id (0..2) punya label, jika tidak ada assign default
        for ($i = 0; $i < 3; $i++) {
            if (!isset($clusterLabels[$i])) {
                $clusterLabels[$i] = 'C1';
            }
        }

        // Format output
        $result = [];
        foreach ($pegawaiNames as $i => $nama) {
            $clusterNum = $labels[$i];
            $result[] = [
                'nama' => $nama,
                'cluster' => isset($clusterLabels[$clusterNum]) ? $clusterLabels[$clusterNum] : 'C1'
            ];
        }

        echo json_encode(['status' => true, 'data' => $result]);
    }

    public function train_kmeans_awal()
    {
        $nilai = $this->M_nilai->get_all_nilai();
        $kriteria = $this->M_nilai->get_kriteria();

        $pegawaiNames = [];
        $dataCluster = [];
        $nilaiAsli = [];

        $tempData = [];
        foreach ($nilai as $n) {
            $tempData[$n->nama_pegawai][$n->kriteria] = floatval($n->nilai);
        }

        foreach ($tempData as $nama => $nilaiKriteria) {
            $pegawaiNames[] = $nama;
            $row = [];
            foreach ($kriteria as $k) {
                $row[] = isset($nilaiKriteria[$k->kriteria]) ? $nilaiKriteria[$k->kriteria] : 0;
            }
            $dataCluster[] = $row;
            $nilaiAsli[] = $row;
        }

        $centroids = [
            [38520, 2, 1, 1, 3],
            [42828, 1, 2, 1, 3],
            [48672, 2, 2, 1, 3]
        ];

        $numFeatures = count($kriteria);
        foreach ($centroids as &$centroid) {
            $centroid = array_pad($centroid, $numFeatures, 0);
        }

        // Perhitungan jarak dilakukan langsung pada data mentah tanpa normalisasi, sesuai logika Excel.
        $result = [];

        // Kosongkan tabel hasil_cluster sebelum simpan baru
        $this->db->truncate('hasil_cluster');

        foreach ($dataCluster as $idx => $point) {
            $distances = [];
            foreach ($centroids as $cid => $centroid) {
                $dist = 0;
                for ($f = 0; $f < $numFeatures; $f++) {
                    $dist += pow($point[$f] - $centroid[$f], 2);
                }
                $distances[$cid] = sqrt($dist);
            }
            $closestCluster = array_keys($distances, min($distances))[0];
            $label = 'C' . ($closestCluster + 1);

            // Simpan ke database
            $this->db->insert('hasil_cluster', [
                'nama_pegawai' => $pegawaiNames[$idx],
                'cluster' => $label
            ]);

            // Simpan ke array untuk response
            $result[] = [
                'nama' => $pegawaiNames[$idx],
                'cluster' => $label
            ];
        }

        echo json_encode(['status' => true, 'data' => $result]);
    }

    private function assignToClusters($data, $centroids)
    {
        $labels = [];

        foreach ($data as $point) {
            $minDist = PHP_FLOAT_MAX;
            $clusterId = 0;

            foreach ($centroids as $idx => $c) {
                // Samakan panjang centroid dengan data point
                $c = array_values($c); // pastikan indeks berurutan
                $cLen = count($c);
                $pLen = count($point);

                // Kalau centroid kurang panjang → tambahkan 0 di akhir
                if ($cLen < $pLen) {
                    $c = array_merge($c, array_fill(0, $pLen - $cLen, 0));
                }
                // Kalau centroid lebih panjang → potong
                elseif ($cLen > $pLen) {
                    $c = array_slice($c, 0, $pLen);
                }

                // Hitung jarak Euclidean
                $dist = 0;
                foreach ($point as $f => $val) {
                    $dist += pow($val - $c[$f], 2);
                }
                $dist = sqrt($dist);

                if ($dist < $minDist) {
                    $minDist = $dist;
                    $clusterId = $idx;
                }
            }
            $labels[] = $clusterId;
        }

        return $labels;
    }


    private function kmeans_with_centroids($data, $k = 3, $maxIterations = 100)
    {
        $numData = count($data);
        $numFeatures = count($data[0]);
        $indexes = range(0, $numData - 1);
        shuffle($indexes);

        $centroids = [];
        for ($i = 0; $i < $k; $i++) {
            $centroids[] = $data[$indexes[$i]];
        }

        $labels = array_fill(0, $numData, 0);

        for ($iter = 0; $iter < $maxIterations; $iter++) {
            $changed = false;

            for ($i = 0; $i < $numData; $i++) {
                $minDist = PHP_FLOAT_MAX;
                $cluster = 0;
                for ($j = 0; $j < $k; $j++) {
                    $dist = 0;
                    for ($f = 0; $f < $numFeatures; $f++) {
                        $dist += pow($data[$i][$f] - $centroids[$j][$f], 2);
                    }
                    $dist = sqrt($dist);
                    if ($dist < $minDist) {
                        $minDist = $dist;
                        $cluster = $j;
                    }
                }
                if ($labels[$i] !== $cluster) {
                    $labels[$i] = $cluster;
                    $changed = true;
                }
            }

            if (!$changed) break;

            $sums = array_fill(0, $k, array_fill(0, $numFeatures, 0));
            $counts = array_fill(0, $k, 0);

            for ($i = 0; $i < $numData; $i++) {
                $cluster = $labels[$i];
                for ($f = 0; $f < $numFeatures; $f++) {
                    $sums[$cluster][$f] += $data[$i][$f];
                }
                $counts[$cluster]++;
            }

            for ($j = 0; $j < $k; $j++) {
                if ($counts[$j] > 0) {
                    for ($f = 0; $f < $numFeatures; $f++) {
                        $centroids[$j][$f] = $sums[$j][$f] / $counts[$j];
                    }
                }
            }
        }

        return [$labels, $centroids];
    }

    public function assign_cluster_baru()
    {
        $nilai = $this->M_nilai->get_all_nilai();
        $kriteria = $this->M_nilai->get_kriteria();

        // Ambil centroid dari DB
        $centroidData = $this->db->get('centroids')->result();
        $centroids = [];
        foreach ($centroidData as $c) {
            $centroids[$c->cluster_id] = json_decode($c->feature_json, true);
        }

        // Ambil mapping label
        $labelMapData = $this->db->get('cluster_labels')->result();
        $clusterLabels = [];
        foreach ($labelMapData as $l) {
            $clusterLabels[$l->cluster_id] = $l->label;
        }

        $dataGabungan = [];
        $pegawaiNames = [];
        foreach ($nilai as $item) {
            $partsNama = explode(' - ', $item->nama_pegawai);
            $nama = isset($partsNama[1]) ? trim($partsNama[1]) : $item->nama_pegawai;

            $partsKriteria = explode(' - ', $item->kriteria);
            $namaKriteria = isset($partsKriteria[1]) ? trim($partsKriteria[1]) : $item->kriteria;

            if (!isset($dataGabungan[$nama])) {
                $dataGabungan[$nama] = [];
            }
            $dataGabungan[$nama][$namaKriteria] = $item->nilai;
        }

        $dataCluster = [];
        foreach ($dataGabungan as $nama => $nilaiKriteria) {
            $pegawaiNames[] = $nama;
            $row = [];
            foreach ($kriteria as $k) {
                $parts = explode(' - ', $k->kriteria);
                $namaKriteria = isset($parts[1]) ? trim($parts[1]) : $k->kriteria;
                $row[] = isset($nilaiKriteria[$namaKriteria]) ? floatval($nilaiKriteria[$namaKriteria]) : 0;
            }
            $dataCluster[] = $row;
        }

        // Normalisasi sesuai data awal (bisa pakai range simpanan, tapi sementara pakai min-max fresh)
        $dataCluster = $this->normalizeMinMax($dataCluster);

        // Assign cluster terdekat
        $result = [];
        foreach ($dataCluster as $i => $row) {
            $minDist = PHP_FLOAT_MAX;
            $clusterId = 0;
            foreach ($centroids as $cid => $center) {
                $dist = 0;
                foreach ($row as $f => $val) {
                    $dist += pow($val - $center[$f], 2);
                }
                $dist = sqrt($dist);
                if ($dist < $minDist) {
                    $minDist = $dist;
                    $clusterId = $cid;
                }
            }
            $result[] = [
                'nama' => $pegawaiNames[$i],
                'cluster' => $clusterLabels[$clusterId]
            ];
        }

        echo json_encode(['status' => true, 'data' => $result]);
    }


    private function kmeans($data, $k = 3, $maxIterations = 100)
    {
        $numData = count($data);
        $numFeatures = count($data[0]);

        // Inisialisasi centroid acak
        $centroids = [];
        $indexes = range(0, $numData - 1);
        shuffle($indexes);
        for ($i = 0; $i < $k; $i++) {
            $centroids[] = $data[$indexes[$i]];
        }

        $labels = array_fill(0, $numData, 0);

        for ($iter = 0; $iter < $maxIterations; $iter++) {
            $changed = false;

            // Step 1: Assign ke cluster terdekat
            for ($i = 0; $i < $numData; $i++) {
                $minDist = PHP_FLOAT_MAX;
                $cluster = 0;
                for ($j = 0; $j < $k; $j++) {
                    $dist = 0;
                    for ($f = 0; $f < $numFeatures; $f++) {
                        $dist += pow($data[$i][$f] - $centroids[$j][$f], 2);
                    }
                    $dist = sqrt($dist);

                    if ($dist < $minDist) {
                        $minDist = $dist;
                        $cluster = $j;
                    }
                }

                if ($labels[$i] !== $cluster) {
                    $labels[$i] = $cluster;
                    $changed = true;
                }
            }

            if (!$changed) break;

            // Step 2: Update centroid
            $sums = array_fill(0, $k, array_fill(0, $numFeatures, 0));
            $counts = array_fill(0, $k, 0);

            for ($i = 0; $i < $numData; $i++) {
                $cluster = $labels[$i];
                for ($f = 0; $f < $numFeatures; $f++) {
                    $sums[$cluster][$f] += $data[$i][$f];
                }
                $counts[$cluster]++;
            }

            for ($j = 0; $j < $k; $j++) {
                if ($counts[$j] > 0) {
                    for ($f = 0; $f < $numFeatures; $f++) {
                        $centroids[$j][$f] = $sums[$j][$f] / $counts[$j];
                    }
                }
            }
        }

        // ====== Tambahan: Mapping cluster agar C3 = nilai tertinggi ======
        $clusterTotals = [];
        for ($j = 0; $j < $k; $j++) {
            $total = 0;
            $count = 0;
            for ($i = 0; $i < $numData; $i++) {
                if ($labels[$i] == $j) {
                    $total += array_sum($data[$i]); // jumlah semua nilai pegawai
                    $count++;
                }
            }
            $clusterTotals[$j] = $count > 0 ? $total / $count : 0; // rata-rata nilai
        }

        // Urutkan cluster berdasarkan rata-rata nilai
        arsort($clusterTotals); // terbesar → terkecil
        $newLabelMap = [];
        $rank = 1;
        foreach (array_keys($clusterTotals) as $clusterId) {
            $newLabelMap[$clusterId] = $rank;
            $rank++;
        }

        // Pastikan cluster dengan nilai terbesar jadi C3
        $maxClusterId = array_keys($clusterTotals)[0];
        $newLabelMap[$maxClusterId] = 3;

        // Map ulang label sesuai urutan
        foreach ($labels as &$label) {
            $label = $newLabelMap[$label];
        }

        return $labels;
    }



    private function normalizeMinMax($data)
    {
        // Cari jumlah kolom terbanyak
        $numFeatures = max(array_map('count', $data));
        $numData = count($data);

        // Samakan jumlah kolom tiap baris (isi 0 jika kurang)
        foreach ($data as &$row) {
            while (count($row) < $numFeatures) {
                $row[] = 0;
            }
        }
        unset($row);

        $minVals = array_fill(0, $numFeatures, PHP_FLOAT_MAX);
        $maxVals = array_fill(0, $numFeatures, -PHP_FLOAT_MAX);

        // Cari min & max tiap fitur
        for ($i = 0; $i < $numData; $i++) {
            for ($f = 0; $f < $numFeatures; $f++) {
                if ($data[$i][$f] < $minVals[$f]) $minVals[$f] = $data[$i][$f];
                if ($data[$i][$f] > $maxVals[$f]) $maxVals[$f] = $data[$i][$f];
            }
        }

        // Normalisasi
        $normalized = [];
        for ($i = 0; $i < $numData; $i++) {
            for ($f = 0; $f < $numFeatures; $f++) {
                if ($maxVals[$f] - $minVals[$f] == 0) {
                    $normalized[$i][$f] = 0; // jika semua nilainya sama
                } else {
                    $normalized[$i][$f] = ($data[$i][$f] - $minVals[$f]) / ($maxVals[$f] - $minVals[$f]);
                }
            }
        }

        return $normalized;
    }



    public function saveAnalisa()
    {
        header('Content-Type: application/json');

        $data = $this->input->post('analisa_data');
        if (!$data) {
            echo json_encode(['status' => 'error', 'message' => 'Data tidak ditemukan!']);
            return;
        }

        $data_decript = json_decode($data, true);
        if (!$data_decript) {
            echo json_encode(['status' => 'error', 'message' => 'Data tidak valid!']);
            return;
        }

        $insertCount = 0;
        $updateCount = 0;
        $errorCount = 0;

        foreach ($data_decript as $data_dec) {
            $namaPegawai = $data_dec['namaPegawai'];
            $total = $data_dec['total'];

            $result = $this->M_nilai->save_analisa_data($namaPegawai, $total);

            if ($result === 'insert') {
                $insertCount++;
            } elseif ($result === 'update') {
                $updateCount++;
            } else {
                $errorCount++;
            }
        }

        if ($errorCount > 0) {
            echo json_encode([
                'status' => 'error',
                'message' => "Gagal menyimpan $errorCount data.",
                'inserted' => $insertCount,
                'updated' => $updateCount
            ]);
        } else {
            $msg = "Berhasil simpan data.";
            if ($insertCount && $updateCount) {
                $msg = "Berhasil insert $insertCount data dan update $updateCount data.";
            } elseif ($insertCount) {
                $msg = "Berhasil insert $insertCount data.";
            } elseif ($updateCount) {
                $msg = "Berhasil update $updateCount data.";
            }

            echo json_encode([
                'status' => 'success',
                'message' => $msg,
                'inserted' => $insertCount,
                'updated' => $updateCount
            ]);
        }
    }



    public function seeder_data_pegawai()
    {
        for ($i = 1; $i <= 397; $i++) {
            $data = [
                'nama_kbn'        => 'KBN ' . $i,
                'nama_region'     => 'Region ' . $i,
                'kode_unit'       => 'UNIT' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'nama_unit'       => 'Unit ' . $i,
                'kode_nip'        => 'NIP' . rand(100000, 999999),
                'nama'            => 'Pegawai ' . $i,
                'gender'          => $i % 2 == 0 ? 'Laki-laki' : 'Perempuan',
                'tempat_lahir'    => 'Kota ' . $i,
                'tgl_lahir'       => date('Y-m-d', strtotime("-" . rand(20, 35) . " years")),
                'no_bpjs'         => rand(1000000000, 9999999999),
                'tanggal_masuk'   => date('Y-m-d', strtotime("-" . rand(1, 5) . " years")),
                'npwp'            => rand(1000000000, 9999999999),
                'kode_jabatan'    => 'JBT' . rand(100, 999)
            ];

            $this->M_pegawai->simpan_pegawai($data);
        }

        echo json_encode(['status' => 'success', 'message' => 'Seeder berhasil menambahkan 15 data pegawai.']);
    }


    public function seeder_data_nilai()
    {
        // Daftar kriteria yang akan diisi
        $kriteriaList = [
            'K1',
            'K2',
            'K3',
            'K4',
            'K5'
        ];

        for ($i = 1; $i <= 397; $i++) {
            $namaPegawai = 'Pegawai ' . $i;

            foreach ($kriteriaList as $kriteria) {
                $data = [
                    'nama_pegawai' => $namaPegawai,
                    'kriteria'     => $kriteria,
                    'nilai'        => $this->generateNilai($kriteria)
                ];

                $this->db->insert('nilai_karyawan', $data);
            }
        }

        echo json_encode([
            'status'  => 'success',
            'message' => 'Seeder berhasil menambahkan 397 pegawai beserta nilai kriterianya.'
        ]);
    }

    // Fungsi untuk buat nilai sesuai jenis kriteria
    private function generateNilai($kriteria)
    {
        switch ($kriteria) {
            case 'K1':
                return rand(37500, 57000); // contoh range besar
            case 'K2':
                return rand(1, 2);
            case 'K3':
                return rand(1, 3);
            case 'K4':
                return rand(1, 3);
            case 'K5':
                return rand(1, 3);
            default:
                return rand(1, 3);
        }
    }
}
