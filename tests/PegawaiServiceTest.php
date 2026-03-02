<?php
// tests/PegawaiServiceTest.php
use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../application/libraries/PegawaiService.php';

class PegawaiServiceTest extends TestCase
{
    public function testHapusPegawaiBerhasil()
    {
        $pegawaiService = new PegawaiService();
        $data = [
            ['id' => 1, 'nama' => 'Budi'],
            ['id' => 2, 'nama' => 'Ani'],
        ];

        list($success, $newData) = $pegawaiService->hapusPegawai($data, 1);

        $this->assertTrue($success);
        $this->assertCount(1, $newData);
        $this->assertEquals('Ani', $newData[0]['nama']);
    }

    public function testHapusPegawaiGagal()
    {
        $pegawaiService = new PegawaiService();
        $data = [
            ['id' => 1, 'nama' => 'Budi'],
            ['id' => 2, 'nama' => 'Ani'],
        ];

        list($success, $newData) = $pegawaiService->hapusPegawai($data, 3);

        $this->assertFalse($success);
        $this->assertCount(2, $newData);
    }
}
