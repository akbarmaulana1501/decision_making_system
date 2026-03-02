<?php
class PegawaiService{
    public function hapusPegawai(array $data, $id)
    {
        foreach ($data as $key => $pegawai) {
            if ($pegawai['id'] == $id) {
                unset($data[$key]);
                return [true, array_values($data)];
            }
        }
        return [false, $data];
    }
}
