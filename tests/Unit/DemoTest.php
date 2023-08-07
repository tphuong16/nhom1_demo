<?php

    namespace Tests\Unit;

    class YourTestClass extends \Codeception\Test\Unit
    {
        /**
         * @var \UnitTester
         */
        protected function setUp(): void
    {
        parent::setUp();
// Kết nối với cơ sở dữ liệu
        $this->getModule('Db')->_initialize();
// Thiết lập cấu hình kết nối cơ sở dữ liệu
        $this->getModule('Db')->_cleanup();
        $this->getModule('Db')->_loadDump('tests/Support/Data/nhom1_demodb.sql');
    }
// Chèn dữ liệu vào cơ sở dữ liệu
    public function testInsertData()
    {
        $this->getModule('Db')->haveInDatabase('info', [
            'HoTen' => 'Phạm Thu Phương',
            'email' => 'thuphuong@gmail.com',
			'LopHC' => '04',
        ]);
// Kiểm tra sự tồn tại của dữ liệu trong cơ sở dữ liệu
        $this->getModule('Db')->seeInDatabase('info', [
            'HoTen' => 'Phạm Thu Phương',
            'email' => 'thuphuong@gmail.com',
			'LopHC' => '04',
        ]);
    }
// Cập nhật dữ liệu trong cơ sở dữ liệu
    public function testUpdateData()
    {
        $this->getModule('Db')->updateInDatabase('info', [
            'LopHC' => 'Test04',
        ], [
            'HoTen' => 'Phạm Thu Phương',
        ]);
// Kiểm tra dữ liệu đã được cập nhật trong cơ sở dữ liệu
        $this->getModule('Db')->seeInDatabase('info', [
            'HoTen' => 'Phạm Thu Phương',
            'LopHC' => 'Test04',
        ]);
    }
// Kiểm tra số lượng bản ghi có HoTen='Phạm Thu Phương' có đúng là 1 bản ghi không
public function testNumRecordsLeVanC()
{
    $this->getModule('Db')->seeNumRecords(1, 'info', ['HoTen' => 'Phạm Thu Phương']);
}
}
?>
