<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Location;
use App\Models\Recipient;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->seedLocations();
        $this->seedRecipients();
    }

    private function seedLocations(): void
    {
        $locations = [
            [
                'title'   => '台北物流中心',
                'city'    => '台北市',
                'address' => '台北市中正區忠孝東路100號',
            ],
            [
                'title'   => '新竹物流中心',
                'city'    => '新竹市',
                'address' => '新竹市東區光復路一段101號',
            ],
            [
                'title'   => '台中物流中心',
                'city'    => '台中市',
                'address' => '台中市西區民生路200號',
            ],
            [
                'title'   => '桃園物流中心',
                'city'    => '桃園市',
                'address' => '桃園市中壢區中央西路三段150號',
            ],
            [
                'title'   => '高雄物流中心',
                'city'    => '高雄市',
                'address' => '高雄市前金區成功一路82號',
            ],
            [
                'title'   => '彰化物流中心',
                'city'    => '彰化市',
                'address' => '彰化市中山路二段250號',
            ],
            [
                'title'   => '嘉義物流中心',
                'city'    => '嘉義市',
                'address' => '嘉義市東區民族路380號',
            ],
            [
                'title'   => '宜蘭物流中心',
                'city'    => '宜蘭市',
                'address' => '宜蘭市中山區二段56號',
            ],
            [
                'title'   => '屏東物流中心',
                'city'    => '屏東市',
                'address' => '屏東市民生路300號',
            ],
            [
                'title'   => '花蓮物流中心',
                'city'    => '花蓮市',
                'address' => '花蓮市國聯一路100號',
            ],
            [
                'title'   => '台南物流中心',
                'city'    => '台南市',
                'address' => '台南市安平區建平路18號',
            ],
            [
                'title'   => '南投物流中心',
                'city'    => '南投市',
                'address' => '南投市自由路67號',
            ],
            [
                'title'   => '雲林物流中心',
                'city'    => '雲林市',
                'address' => '雲林市中正路五段120號',
            ],
            [
                'title'   => '基隆物流中心',
                'city'    => '基隆市',
                'address' => '基隆市信一路50號',
            ],
            [
                'title'   => '澎湖物流中心',
                'city'    => '澎湖縣',
                'address' => '澎湖縣馬公市中正路200號',
            ],
            [
                'title'   => '金門物流中心',
                'city'    => '金門縣',
                'address' => '金門縣金城鎮民生路90號',
            ],
        ];

        array_walk($locations, function (array $location) {
            Location::create($location);

        });
    }

    private function seedRecipients(): void
    {
        $recipients = [
            [
                'name'    => '賴小賴',
                'address' => '台北市中正區仁愛路二段99號',
                'phone'   => '091234567',
            ],
            [
                'name'    => '陳大明',
                'address' => '新北市板橋區文化路一段100號',
                'phone'   => '092345678',
            ],
            [
                'name'    => '林小芳',
                'address' => '台中市西區民生路200號',
                'phone'   => '093456789',
            ],
            [
                'name'    => '張美玲',
                'address' => '高雄市前金區成功路一段82號',
                'phone'   => '094567890',
            ],
            [
                'name'    => '王小明',
                'address' => '台南市安平區建平路18號',
                'phone'   => '095678901',
            ],
            [
                'name'    => '劉大華',
                'address' => '新竹市東區光復路一段101號',
                'phone'   => '096789012',
            ],
            [
                'name'    => '黃小琳',
                'address' => '彰化市中山路二段250號',
                'phone'   => '097890123',
            ],
            [
                'name'    => '吳美美',
                'address' => '花蓮市國聯一路100號',
                'phone'   => '098901234',
            ],
            [
                'name'    => '蔡小虎',
                'address' => '屏東市民生路300號',
                'phone'   => '099012345',
            ],
            [
                'name'    => '鄭大勇',
                'address' => '基隆市信一路50號',
                'phone'   => '091123456',
            ],
            [
                'name'    => '謝小珍',
                'address' => '嘉義市東區民族路380號',
                'phone'   => '092234567',
            ],
            [
                'name'    => '潘大為',
                'address' => '宜蘭市中山路二段58號',
                'phone'   => '093345678',
            ],
            [
                'name'    => '趙小梅',
                'address' => '南投市自由路67號',
                'phone'   => '094456789',
            ],
            [
                'name'    => '周小龍',
                'address' => '雲林市中正路五段120號',
                'phone'   => '095567890',
            ],
            [
                'name'    => '李大同',
                'address' => '澎湖縣馬公市中正路200號',
                'phone'   => '096678901',
            ],
            [
                'name'    => '陳小凡',
                'address' => '金門縣金城鎮民生路90號',
                'phone'   => '097789012',
            ],
            [
                'name'    => '楊大明',
                'address' => '台北市信義區松仁路50號',
                'phone'   => '098890123',
            ],
            [
                'name'    => '吳小雯',
                'address' => '新北市中和區景平路100號',
                'phone'   => '099901234',
            ],
        ];

        array_walk($recipients, function (array $recipient) {
            Recipient::create($recipient);

        });
    }
}
