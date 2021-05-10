<?php

use Illuminate\Database\Seeder;
use App\ProductType;
use App\Product;
use App\Promotion;
use App\Department;
use App\Position;
use App\Slide;
use App\Staff;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      	$protype=[
      		['id'=>1, 'name'=>'Bánh mặn', 'description'=>'Nếu từng bị mê hoặc bởi các loại tarlet ngọt thì chắn chắn bạn không thể bỏ qua những loại tarlet mặn.', 'image'=>'banh-man-thu-vi-nhat-1.jpg', 'created_at'=>NULL, 'updated_at'=>NULL],
			['id'=>2, 'name'=>'Bánh ngọt', 'description'=>'Bánh ngọt là một loại thức ăn thường dưới hình thức món bánh dạng bánh mì từ bột nhào, được nướng lên dùng để tráng miệng.', 'image'=>'20131108144733.jpg', 'created_at'=>'2016-10-12 02:16:15', 'updated_at'=>'2016-10-13 01:38:35'],
			['id'=>3, 'name'=>'Bánh trái cây', 'description'=>'Bánh trái cây, hay còn gọi là bánh hoa quả, là một món ăn chơi, không riêng gì của Huế nhưng khi "lạc" vào mảnh đất Cố đô', 'image'=>'banhtraicay.jpg', 'created_at'=>'2016-10-18 00:33:33', 'updated_at'=>'2016-10-15 07:25:27'],
			['id'=>4, 'name'=>'Bánh kem', 'description'=>'Với người Việt Nam thì bánh ngọt nói chung đều hay được quy về bánh bông lan – một loại tráng miệng bông xốp, ăn không hoặc được phủ kem lên thành bánh kem.', 'image'=>'banhkem.jpg', 'created_at'=>'2016-10-26 03:29:19', 'updated_at'=>'2016-10-26 02:22:22'],
			['id'=>5, 'name'=>'Bánh crepe', 'description'=>'Crepe là một món bánh nổi tiếng của Pháp, nhưng từ khi du nhập vào Việt Nam món bánh đẹp mắt, ngon miệng này đã làm cho biết bao bạn trẻ phải “xiêu lòng”', 'image'=>'crepe.jpg', 'created_at'=>'2016-10-28 04:00:00', 'updated_at'=>'2016-10-27 04:00:23'],
			['id'=>6, 'name'=>'Bánh Pizza', 'description'=>'Pizza đã không chỉ còn là một món ăn được ưa chuộng khắp thế giới mà còn được những nhà cầm quyền EU chứng nhận là một phần di sản văn hóa ẩm thực châu Âu. ', 'image'=>'pizza.jpg', 'created_at'=>'2016-10-25 17:19:00','updated_at'=>NULL],
			['id'=>7, 'name'=>'Bánh su kem', 'description'=>'Bánh su kem là món bánh ngọt ở dạng kem được làm từ các nguyên liệu như bột mì, trứng, sữa, bơ.... ', 'image'=>'sukemdau.jpg', 'created_at'=>'2016-10-25 17:19:00', 'updated_at'=>NULL],

      	];
      	DB::table('type_products')->insert($protype);

        $products=[
        	['id'=>1, 'name'=>'Bánh Crepe Sầu riêng', 'id_type'=>5, 'description'=>'Bánh crepe sầu riêng nhà làm', 'unit_price'=>150000, 'promotion_price'=>120000, 'image'=>'1430967449-pancake-sau-rieng-6.jpg', 'unit'=>'hộp', 'new'=>1, 'created_at'=>'2016-10-26 03:00:16', 'updated_at'=>'2016-10-24 22:11:00'],
			['id'=>2, 'name'=>'Bánh Crepe Chocolate', 'id_type'=>6, 'description'=>'', 'unit_price'=>180000, 'promotion_price'=>160000, 'image'=>'crepe-chocolate.jpg', 'unit'=>'hộp', 'new'=>1, 'created_at'=>'2016-10-26 03:00:16', 'updated_at'=>'2016-10-24 22:11:00'],
			['id'=>3, 'name'=>'Bánh Crepe Sầu riêng - Chuối', 'id_type'=>5, 'description'=>'', 'unit_price'=>150000, 'promotion_price'=>120000, 'image'=>'crepe-chuoi.jpg', 'unit'=>'hộp', 'new'=>0, 'created_at'=>'2016-10-26 03:00:16', 'updated_at'=>'2016-10-24 22:11:00'],
			['id'=>4, 'name'=>'Bánh Crepe Đào', 'id_type'=>5, 'description'=>'', 'unit_price'=>160000, 'promotion_price'=>0, 'image'=>'crepe-dao.jpg', 'unit'=>'hộp', 'new'=>0, 'created_at'=>'2016-10-26 03:00:16', 'updated_at'=>'2016-10-24 22:11:00'],
			['id'=>5, 'name'=>'Bánh Crepe Dâu', 'id_type'=>5, 'description'=>'', 'unit_price'=>160000, 'promotion_price'=>0, 'image'=>'crepedau.jpg', 'unit'=>'hộp', 'new'=>0, 'created_at'=>'2016-10-26 03:00:16', 'updated_at'=>'2016-10-24 22:11:00'],
			['id'=>6, 'name'=>'Bánh Crepe Pháp', 'id_type'=>5, 'description'=>'', 'unit_price'=>200000, 'promotion_price'=>180000, 'image'=>'crepe-phap.jpg', 'unit'=>'hộp', 'new'=>0, 'created_at'=>'2016-10-26 03:00:16', 'updated_at'=>'2016-10-24 22:11:00'],
			['id'=>7, 'name'=>'Bánh Crepe Táo', 'id_type'=>5, 'description'=>'', 'unit_price'=>160000, 'promotion_price'=>0, 'image'=>'crepe-tao.jpg', 'unit'=>'hộp', 'new'=>1, 'created_at'=>'2016-10-26 03:00:16', 'updated_at'=>'2016-10-24 22:11:00'],
			['id'=>8, 'name'=>'Bánh Crepe Trà xanh', 'id_type'=>5, 'description'=>'', 'unit_price'=>160000, 'promotion_price'=>150000, 'image'=>'crepe-traxanh.jpg', 'unit'=>'hộp', 'new'=>0, 'created_at'=>'2016-10-26 03:00:16', 'updated_at'=>'2016-10-24 22:11:00'],
			['id'=>9, 'name'=>'Bánh Crepe Sầu riêng và Dứa', 'id_type'=>5, 'description'=>'', 'unit_price'=>160000, 'promotion_price'=>150000, 'image'=>'saurieng-dua.jpg', 'unit'=>'hộp', 'new'=>0, 'created_at'=>'2016-10-26 03:00:16', 'updated_at'=>'2016-10-24 22:11:00'],
			['id'=>11, 'name'=>'Bánh Gato Trái cây Việt Quất', 'id_type'=>3, 'description'=>'', 'unit_price'=>250000, 'promotion_price'=>0, 'image'=>'544bc48782741.png', 'unit'=>'cái', 'new'=>0, 'created_at'=>'2016-10-12 02:00:00', 'updated_at'=>'2016-10-27 02:24:00'],
			['id'=>12, 'name'=>'Bánh sinh nhật rau câu trái cây', 'id_type'=>3, 'description'=>'', 'unit_price'=>200000, 'promotion_price'=>180000, 'image'=>'210215-banh-sinh-nhat-rau-cau-body- (6).jpg', 'unit'=>'cái', 'new'=>0, 'created_at'=>'2016-10-12 02:00:00', 'updated_at'=>'2016-10-27 02:24:00'],
			['id'=>13, 'name'=>'Bánh kem Chocolate Dâu', 'id_type'=>3, 'description'=>'', 'unit_price'=>300000, 'promotion_price'=>280000, 'image'=>'banh kem sinh nhat.jpg', 'unit'=>'cái', 'new'=>1, 'created_at'=>'2016-10-12 02:00:00', 'updated_at'=>'2016-10-27 02:24:00'],
			['id'=>14, 'name'=>'Bánh kem Dâu III', 'id_type'=>3, 'description'=>'', 'unit_price'=>300000, 'promotion_price'=>280000, 'image'=>'Banh-kem (6).jpg', 'unit'=>'cái', 'new'=>0, 'created_at'=>'2016-10-12 02:00:00', 'updated_at'=>'2016-10-27 02:24:00'],
			['id'=>15, 'name'=>'Bánh kem Dâu I', 'id_type'=>3, 'description'=>'', 'unit_price'=>350000, 'promotion_price'=>320000, 'image'=>'banhkem-dau.jpg', 'unit'=>'cái', 'new'=>1, 'created_at'=>'2016-10-12 02:00:00', 'updated_at'=>'2016-10-27 02:24:00'],
			['id'=>16, 'name'=>'Bánh trái cây II', 'id_type'=>3, 'description'=>'', 'unit_price'=>150000, 'promotion_price'=>120000, 'image'=>'banhtraicay.jpg', 'unit'=>'hộp', 'new'=>0, 'created_at'=>'2016-10-12 02:00:00', 'updated_at'=>'2016-10-27 02:24:00'],
			['id'=>17, 'name'=>'Apple Cake', 'id_type'=>3, 'description'=>'', 'unit_price'=>250000, 'promotion_price'=>240000, 'image'=>'Fruit-Cake_7979.jpg', 'unit'=>'cai', 'new'=>0, 'created_at'=>'2016-10-12 02:00:00', 'updated_at'=>'2016-10-27 02:24:00'],
			['id'=>18, 'name'=>'Bánh ngọt nhân cream táo', 'id_type'=>2, 'description'=>'', 'unit_price'=>180000, 'promotion_price'=>0, 'image'=>'20131108144733.jpg', 'unit'=>'hộp', 'new'=>0, 'created_at'=>'2016-10-13 02:20:00', 'updated_at'=>'2016-10-19 03:20:00'],
			['id'=>19, 'name'=>'Bánh Chocolate Trái cây', 'id_type'=>2, 'description'=>'', 'unit_price'=>150000, 'promotion_price'=>0, 'image'=>'Fruit-Cake_7976.jpg', 'unit'=>'hộp', 'new'=>1, 'created_at'=>'2016-10-13 02:20:00', 'updated_at'=>'2016-10-19 03:20:00'],
			['id'=>20, 'name'=>'Bánh Chocolate Trái cây II', 'id_type'=>2, 'description'=>'', 'unit_price'=>150000, 'promotion_price'=>0, 'image'=>'Fruit-Cake_7981.jpg', 'unit'=>'hộp', 'new'=>0, 'created_at'=>'2016-10-13 02:20:00', 'updated_at'=>'2016-10-19 03:20:00'],
			['id'=>21, 'name'=>'Peach Cake', 'id_type'=>2, 'description'=>'', 'unit_price'=>160000, 'promotion_price'=>150000, 'image'=>'Peach-Cake_3294.jpg', 'unit'=>'cái', 'new'=>0, 'created_at'=>'2016-10-13 02:20:00', 'updated_at'=>'2016-10-19 03:20:00'],
			['id'=>22, 'name'=>'Bánh bông lan trứng muối I', 'id_type'=>1, 'description'=>'', 'unit_price'=>160000, 'promotion_price'=>150000, 'image'=>'banhbonglantrung.jpg', 'unit'=>'hộp', 'new'=>1, 'created_at'=>'2016-10-13 02:20:00', 'updated_at'=>'2016-10-19 03:20:00'],
			['id'=>23, 'name'=>'Bánh bông lan trứng muối II', 'id_type'=>1, 'description'=>'', 'unit_price'=>180000, 'promotion_price'=>0, 'image'=>'banhbonglantrungmuoi.jpg', 'unit'=>'hộp', 'new'=>0, 'created_at'=>'2016-10-13 02:20:00', 'updated_at'=>'2016-10-19 03:20:00'],
			['id'=>24, 'name'=>'Bánh French', 'id_type'=>1, 'description'=>'', 'unit_price'=>180000, 'promotion_price'=>0, 'image'=>'banh-man-thu-vi-nhat-1.jpg', 'unit'=>'hộp', 'new'=>0, 'created_at'=>'2016-10-13 02:20:00', 'updated_at'=>'2016-10-19 03:20:00'],
			['id'=>25, 'name'=>'Bánh mì Australia', 'id_type'=>1, 'description'=>'', 'unit_price'=>80000, 'promotion_price'=>70000, 'image'=>'dung-khoai-tay-lam-banh-gato-man-cuc-ngon.jpg', 'unit'=>'hộp', 'new'=>0, 'created_at'=>'2016-10-13 02:20:00', 'updated_at'=>'2016-10-19 03:20:00'],
			['id'=>26, 'name'=>'Bánh mặn thập cẩm', 'id_type'=>1, 'description'=>'', 'unit_price'=>50000, 'promotion_price'=>0, 'image'=>'Fruit-Cake.png', 'unit'=>'hộp', 'new'=>0, 'created_at'=>'2016-10-13 02:20:00', 'updated_at'=>'2016-10-19 03:20:00'],
			['id'=>27, 'name'=>'Bánh Muffins trứng', 'id_type'=>1, 'description'=>'', 'unit_price'=>100000, 'promotion_price'=>80000, 'image'=>'maxresdefault.jpg', 'unit'=>'hộp', 'new'=>0, 'created_at'=>'2016-10-13 02:20:00', 'updated_at'=>'2016-10-19 03:20:00'],
			['id'=>28, 'name'=>'Bánh Scone Peach Cake', 'id_type'=>1, 'description'=>'', 'unit_price'=>120000, 'promotion_price'=>0, 'image'=>'Peach-Cake_3300.jpg', 'unit'=>'hộp', 'new'=>1, 'created_at'=>'2016-10-13 02:20:00', 'updated_at'=>'2016-10-19 03:20:00'],
			['id'=>29, 'name'=>'Bánh mì Loaf I', 'id_type'=>1, 'description'=>'', 'unit_price'=>100000, 'promotion_price'=>0, 'image'=>'sli12.jpg', 'unit'=>'hộp', 'new'=>0, 'created_at'=>'2016-10-13 02:20:00', 'updated_at'=>'2016-10-19 03:20:00'],
			['id'=>30, 'name'=>'Bánh kem Chocolate Dâu I', 'id_type'=>4, 'description'=>'', 'unit_price'=>380000, 'promotion_price'=>350000, 'image'=>'sli12.jpg', 'unit'=>'cái', 'new'=>1, 'created_at'=>'2016-10-13 02:20:00', 'updated_at'=>'2016-10-19 03:20:00'],
			['id'=>31, 'name'=>'Bánh kem Trái cây I', 'id_type'=>4, 'description'=>'', 'unit_price'=>380000, 'promotion_price'=>350000, 'image'=>'Fruit-Cake.jpg', 'unit'=>'cái', 'new'=>0, 'created_at'=>'2016-10-13 02:20:00', 'updated_at'=>'2016-10-19 03:20:00'],
			['id'=>32, 'name'=>'Bánh kem Trái cây II', 'id_type'=>4, 'description'=>'', 'unit_price'=>380000, 'promotion_price'=>350000, 'image'=>'Fruit-Cake_7971.jpg', 'unit'=>'cái', 'new'=>0, 'created_at'=>'2016-10-13 02:20:00', 'updated_at'=>'2016-10-19 03:20:00'],
			['id'=>33, 'name'=>'Bánh kem Doraemon', 'id_type'=>4, 'description'=>'', 'unit_price'=>280000, 'promotion_price'=>250000, 'image'=>'p1392962167_banh74.jpg', 'unit'=>'cái', 'new'=>1, 'created_at'=>'2016-10-13 02:20:00', 'updated_at'=>'2016-10-19 03:20:00'],
			['id'=>34, 'name'=>'Bánh kem Caramen Pudding', 'id_type'=>4, 'description'=>'', 'unit_price'=>280000, 'promotion_price'=>0, 'image'=>'Caramen-pudding636099031482099583.jpg', 'unit'=>'cái', 'new'=>1, 'created_at'=>'2016-10-13 02:20:00', 'updated_at'=>'2016-10-19 03:20:00'],
			['id'=>35, 'name'=>'Bánh kem Chocolate Fruit', 'id_type'=>4, 'description'=>'', 'unit_price'=>320000, 'promotion_price'=>300000, 'image'=>'chocolate-fruit636098975917921990.jpg', 'unit'=>'cái', 'new'=>1, 'created_at'=>'2016-10-13 02:20:00', 'updated_at'=>'2016-10-19 03:20:00'],
			['id'=>36, 'name'=>'Bánh kem Coffee Chocolate GH6', 'id_type'=>4, 'description'=>'', 'unit_price'=>320000, 'promotion_price'=>300000, 'image'=>'COFFE-CHOCOLATE636098977566220885.jpg', 'unit'=>'cái', 'new'=>0, 'created_at'=>'2016-10-13 02:20:00', 'updated_at'=>'2016-10-19 03:20:00'],
			['id'=>37, 'name'=>'Bánh kem Mango Mouse', 'id_type'=>4, 'description'=>'', 'unit_price'=>320000, 'promotion_price'=>300000, 'image'=>'mango-mousse-cake.jpg', 'unit'=>'cái', 'new'=>1, 'created_at'=>'2016-10-13 02:20:00', 'updated_at'=>'2016-10-19 03:20:00'],
			['id'=>38, 'name'=>'Bánh kem Matcha Mouse', 'id_type'=>4, 'description'=>'', 'unit_price'=>350000, 'promotion_price'=>330000, 'image'=>'MATCHA-MOUSSE.jpg', 'unit'=>'cái', 'new'=>0, 'created_at'=>'2016-10-13 02:20:00', 'updated_at'=>'2016-10-19 03:20:00'],
			['id'=>39, 'name'=>'Bánh kem Flower Fruit', 'id_type'=>4, 'description'=>'', 'unit_price'=>350000, 'promotion_price'=>330000, 'image'=>'flower-fruits636102461981788938.jpg', 'unit'=>'cái', 'new'=>0, 'created_at'=>'2016-10-13 02:20:00', 'updated_at'=>'2016-10-19 03:20:00'],
			['id'=>40, 'name'=>'Bánh kem Strawberry Delight', 'id_type'=>4, 'description'=>'', 'unit_price'=>350000, 'promotion_price'=>330000, 'image'=>'strawberry-delight636102445035635173.jpg', 'unit'=>'cái', 'new'=>0, 'created_at'=>'2016-10-13 02:20:00', 'updated_at'=>'2016-10-19 03:20:00'],
			['id'=>41, 'name'=>'Bánh kem Raspberry Delight', 'id_type'=>4, 'description'=>'', 'unit_price'=>350000, 'promotion_price'=>330000, 'image'=>'raspberry.jpg', 'unit'=>'cái', 'new'=>0, 'created_at'=>'2016-10-13 02:20:00', 'updated_at'=>'2016-10-19 03:20:00'],
			['id'=>42, 'name'=>'Beefy Pizza', 'id_type'=>6, 'description'=>'Thịt bò xay, ngô, sốt BBQ, phô mai mozzarella', 'unit_price'=>150000, 'promotion_price'=>130000, 'image'=>'40819_food_pizza.jpg', 'unit'=>'cái', 'new'=>0, 'created_at'=>'2016-10-13 02:20:00', 'updated_at'=>'2016-10-13 02:20:00'],
			['id'=>43, 'name'=>'Hawaii Pizza', 'id_type'=>6, 'description'=>'Sốt cà chua, ham , dứa, pho mai mozzarella', 'unit_price'=>120000, 'promotion_price'=>0, 'image'=>'hawaiian paradise_large-900x900.jpg', 'unit'=>'cái', 'new'=>1, 'created_at'=>'2016-10-13 02:20:00', 'updated_at'=>'2016-10-19 03:20:00'],
			['id'=>44, 'name'=>'Smoke Chicken Pizza', 'id_type'=>6, 'description'=>'Gà hun khói,nấm, sốt cà chua, pho mai mozzarella.', 'unit_price'=>120000, 'promotion_price'=>0, 'image'=>'chicken black pepper_large-900x900.jpg', 'unit'=>'cái', 'new'=>0, 'created_at'=>'2016-10-13 02:20:00', 'updated_at'=>'2016-10-19 03:20:00'],
			['id'=>45, 'name'=>'Sausage Pizza', 'id_type'=>6, 'description'=>'Xúc xích klobasa, Nấm, Ngô, sốtcà chua, pho mai Mozzarella.', 'unit_price'=>120000, 'promotion_price'=>0, 'image'=>'pizza-miami.jpg', 'unit'=>'cái', 'new'=>0, 'created_at'=>'2016-10-13 02:20:00', 'updated_at'=>'2016-10-19 03:20:00'],
			['id'=>46, 'name'=>'Ocean Pizza', 'id_type'=>6, 'description'=>'Tôm , mực, xào cay,ớt xanh, hành tây, cà chua, phomai mozzarella.', 'unit_price'=>120000, 'promotion_price'=>0, 'image'=>'seafood curry_large-900x900.jpg', 'unit'=>'cái', 'new'=>0, 'created_at'=>'2016-10-13 02:20:00', 'updated_at'=>'2016-10-19 03:20:00'],
			['id'=>47, 'name'=>'All Meaty Pizza', 'id_type'=>6, 'description'=>'Ham, bacon, chorizo, pho mai mozzarella.', 'unit_price'=>140000, 'promotion_price'=>0, 'image'=>'all1).jpg', 'unit'=>'cái', 'new'=>0, 'created_at'=>'2016-10-13 02:20:00', 'updated_at'=>'2016-10-19 03:20:00'],
			['id'=>48, 'name'=>'Tuna Pizza', 'id_type'=>6, 'description'=>'Cá Ngừ, sốt Mayonnaise,sốt càchua, hành tây, pho mai Mozzarella', 'unit_price'=>140000, 'promotion_price'=>0, 'image'=>'54eaf93713081_-_07-germany-tuna.jpg', 'unit'=>'cái', 'new'=>0, 'created_at'=>'2016-10-13 02:20:00', 'updated_at'=>'2016-10-19 03:20:00'],
			['id'=>49, 'name'=>'Bánh su kem nhân dừa', 'id_type'=>7, 'description'=>'', 'unit_price'=>120000, 'promotion_price'=>100000, 'image'=>'maxresdefault.jpg', 'unit'=>'cái', 'new'=>0, 'created_at'=>'2016-10-13 02:20:00', 'updated_at'=>'2016-10-13 02:20:00'],
			['id'=>50, 'name'=>'Bánh su kem sữa tươi', 'id_type'=>7, 'description'=>'', 'unit_price'=>120000, 'promotion_price'=>100000, 'image'=>'sukem.jpg', 'unit'=>'cái', 'new'=>0, 'created_at'=>'2016-10-13 02:20:00', 'updated_at'=>'2016-10-19 03:20:00'],
			['id'=>51, 'name'=>'Bánh su kem sữa tươi chiên giòn', 'id_type'=>7, 'description'=>'', 'unit_price'=>150000, 'promotion_price'=>0, 'image'=>'1434429117-banh-su-kem-chien-20.jpg', 'unit'=>'hộp', 'new'=>0, 'created_at'=>'2016-10-13 02:20:00', 'updated_at'=>'2016-10-19 03:20:00'],
			['id'=>52, 'name'=>'Bánh su kem dâu sữa tươi', 'id_type'=>7, 'description'=>'', 'unit_price'=>150000, 'promotion_price'=>0, 'image'=>'sukemdau.jpg', 'unit'=>'hộp', 'new'=>0, 'created_at'=>'2016-10-13 02:20:00', 'updated_at'=>'2016-10-19 03:20:00'],
			['id'=>53, 'name'=>'Bánh su kem bơ sữa tươi', 'id_type'=>7, 'description'=>'', 'unit_price'=>150000, 'promotion_price'=>0, 'image'=>'He-Thong-Banh-Su-Singapore-Chewy-Junior.jpg', 'unit'=>'hộp', 'new'=>0, 'created_at'=>'2016-10-13 02:20:00', 'updated_at'=>'2016-10-19 03:20:00'],
			['id'=>54, 'name'=>'Bánh su kem nhân trái cây sữa tươi', 'id_type'=>7, 'description'=>'', 'unit_price'=>150000, 'promotion_price'=>0, 'image'=>'foody-banh-su-que-635930347896369908.jpg', 'unit'=>'hộp', 'new'=>1, 'created_at'=>'2016-10-13 02:20:00', 'updated_at'=>'2016-10-19 03:20:00'],
			['id'=>55, 'name'=>'Bánh su kem cà phê', 'id_type'=>7, 'description'=>'', 'unit_price'=>150000, 'promotion_price'=>0, 'image'=>'banh-su-kem-ca-phe-1.jpg', 'unit'=>'hộp', 'new'=>0, 'created_at'=>'2016-10-13 02:20:00', 'updated_at'=>'2016-10-19 03:20:00'],
			['id'=>56, 'name'=>'Bánh su kem phô mai', 'id_type'=>7, 'description'=>'', 'unit_price'=>150000, 'promotion_price'=>0, 'image'=>'50020041-combo-20-banh-su-que-pho-mai-9.jpg', 'unit'=>'hộp', 'new'=>0, 'created_at'=>'2016-10-13 02:20:00', 'updated_at'=>'2016-10-19 03:20:00'],
			['id'=>57, 'name'=>'Bánh su kem sữa tươi chocolate', 'id_type'=>7, 'description'=>'', 'unit_price'=>150000, 'promotion_price'=>0, 'image'=>'combo-20-banh-su-que-kem-sua-tuoi-phu-socola.jpg', 'unit'=>'hộp', 'new'=>1, 'created_at'=>'2016-10-13 02:20:00', 'updated_at'=>'2016-10-19 03:20:00'],
			['id'=>58, 'name'=>'Bánh Macaron Pháp', 'id_type'=>2, 'description'=>'Thưởng thức macaron, người ta có thể tìm thấy từ những hương vị truyền thống như mâm xôi, chocolate', 'unit_price'=>200000, 'promotion_price'=>180000, 'image'=>'Macaron9.jpg','unit'=>'cai','new'=>0, 'created_at'=>'2016-10-26 17:00:00', 'updated_at'=>'2016-10-11 17:00:00'],
			['id'=>59, 'name'=>'Bánh Tiramisu - Italia', 'id_type'=>2, 'description'=>'Chỉ cần cắn một miếng, bạn sẽ cảm nhận được tất cả các hương vị đó hòa quyện cùng một chính vì thế người ta còn ví món bánh này là Thiên đường trong miệng của bạn', 'unit_price'=>200000, 'promotion_price'=>0, 'image'=>'234.jpg','unit'=>'cai','new'=>0, 'created_at'=>'2016-10-26 17:00:00', 'updated_at'=>'2016-10-11 17:00:00'],
			['id'=>60, 'name'=>'Bánh Táo - Mỹ', 'id_type'=>2, 'description'=>'Bánh táo Mỹ với phần vỏ bánh mỏng, giòn mềm, ẩn chứa phần nhân táo thơm ngọt, điểm chút vị chua dịu của trái cây quả sẽ là một lựa chọn hoàn hảo cho những tín đồ bánh ngọt trên toàn thế giới.', 'unit_price'=>200000, 'promotion_price'=>0, 'image'=>'1234.jpg', 'unit'=>'cai', 'new'=>0, 'created_at'=>'2016-10-26 17:00:00', 'updated_at'=>'2016-10-11 17:00:00'],
			['id'=>61, 'name'=>'Bánh Cupcake - Anh Quốc', 'id_type'=>6, 'description'=>'Những chiếc cupcake có cấu tạo gồm phần vỏ bánh xốp mịn và phần kem trang trí bên trên rất bắt mắt với nhiều hình dạng và màu sắc khác nhau.', 'unit_price'=>150000, 'promotion_price'=>120000, 'image'=>'cupcake.jpg', 'unit'=>'cái', 'new'=>1, 'created_at'=>NULL, 'updated_at'=>NULL],
			['id'=>62, 'name'=>'Bánh Sachertorte', 'id_type'=>6, 'description'=>'Sachertorte là một loại bánh xốp được tạo ra bởi loại&nbsp;chocholate&nbsp;tuyệt hảo nhất của nước Áo.', 'unit_price'=>250000, 'promotion_price'=>220000, 'image'=>'111.jpg', 'unit'=>'cái', 'new'=>0, 'created_at'=>NULL, 'updated_at'=>NULL],

        ];
        DB::table('products')->insert($products);

    		$department=[

    			['id'=>1,'name'=>'Khach hang','address'=>'tang 1','description'=>'nhóm user khách hàng','email'=>'NULL@gmail.com','phone'=>'NULL','created_at'=>'2020-04-19 18:09:27','updated_at'=>'2020-04-19 18:09:27'],
				['id'=>2,'name'=>'Admin','address'=>'tang 1','description'=>'admin','email'=>'NULL@gmail.com','phone'=>'NULL@gmail.com','created_at'=>'2020-04-19 22:24:53','updated_at'=>'2020-04-19 22:24:53'],
				['id'=>3,'name'=>'Sale','address'=>'tang 1','description'=>'Bộ phận bán hàng','email'=>'NULL@gmail.com','phone'=>'NULL','created_at'=>'2020-04-20 18:25:08','updated_at'=>'2020-04-20 18:25:08'],
				['id'=>4,'name'=>'Inventory','address'=>'tang 1','description'=>'Bộ phận Kho','email'=>'NULL@gmail.com','phone'=>'NULL','created_at'=>'2020-05-15 22:34:47','updated_at'=>'2020-05-24 21:45:25'],
				['id'=>5,'name'=>'HRS','address'=>'tang 1','description'=>'Bộ phân nguồn nhân lực','email'=>'NULL@gmail.com','phone'=>'NULL','created_at'=>'2020-05-24 20:27:02','updated_at'=>'2020-05-24 20:27:02'],

    		];
    		DB::table('departments')->insert($department);

    		
    		$poll=[

    			['id'=>4,'question'=>'Who','maxCheck'=>1,'canVisitorsVote'=>1,'isClosed'=>'2020-06-30 02:24:30','starts_at'=>'2020-04-23 07:53:20','ends_at'=>'2025-04-23 07:53:20','created_at'=>'2020-04-23 07:53:20','updated_at'=>'2020-06-30 02:24:30','canVoterSeeResult'=>1],
				['id'=>5,'question'=>'What','maxCheck'=>1,'canVisitorsVote'=>1,'isClosed'=>'2020-04-23 10:21:42','starts_at'=>'2020-04-23 17:00:00','ends_at'=>'2020-04-24 17:00:00','created_at'=>'2020-04-23 08:14:35','updated_at'=>'2020-04-23 10:21:42','canVoterSeeResult'=>1],
				['id'=>6,'question'=>'Love','maxCheck'=>1,'canVisitorsVote'=>1,'isClosed'=>'2020-04-24 01:24:13','starts_at'=>'2020-04-22 17:00:00','ends_at'=>'2020-04-24 17:00:00','created_at'=>'2020-04-24 01:22:26','updated_at'=>'2020-04-24 01:24:13','canVoterSeeResult'=>0],
				['id'=>7,'question'=>'Bạn có hài lòng về dịch vụ của HIBI cake?','maxCheck'=>1,'canVisitorsVote'=>1,'isClosed'=>NULL,'starts_at'=>'2020-06-22 13:22:00','ends_at'=>'2020-06-28 13:22:00','created_at'=>'2020-06-22 13:22:17','updated_at'=>'2020-06-22 13:22:17','canVoterSeeResult'=>0],

    		];
    		DB::table('larapoll_polls')->insert($poll);

    		$option=[

    			['id'=>9, 'name'=>'a','poll_id'=>4,'votes'=>2,'created_at'=>'2020-04-23 07:53:20','updated_at'=>'2020-04-23 07:53:20'],
				['id'=>10,'name'=>'b','poll_id'=>4,'votes'=>2,'created_at'=>'2020-04-23 07:53:20','updated_at'=>'2020-05-27 10:05:51'],
				['id'=>11,'name'=>'c','poll_id'=>4,'votes'=>1,'created_at'=>'2020-04-23 07:53:20','updated_at'=>'2020-06-30 02:24:30'],
				['id'=>12,'name'=>'1','poll_id'=>5,'votes'=>0,'created_at'=>'2020-04-23 08:14:35','updated_at'=>'2020-04-23 08:14:35'],
				['id'=>13,'name'=>'2','poll_id'=>5,'votes'=>0,'created_at'=>'2020-04-23 08:14:35','updated_at'=>'2020-04-23 08:14:35'],
				['id'=>14,'name'=>'3','poll_id'=>5,'votes'=>0,'created_at'=>'2020-04-23 08:14:35','updated_at'=>'2020-04-23 08:14:35'],
				['id'=>15,'name'=>'4','poll_id'=>5,'votes'=>0,'created_at'=>'2020-04-23 08:14:35','updated_at'=>'2020-04-23 08:14:35'],
				['id'=>18,'name'=>'1','poll_id'=>6,'votes'=>0,'created_at'=>'2020-04-24 01:22:26','updated_at'=>'2020-04-24 01:22:26'],
				['id'=>19,'name'=>'2','poll_id'=>6,'votes'=>0,'created_at'=>'2020-04-24 01:22:26','updated_at'=>'2020-04-24 01:22:26'],
				['id'=>20,'name'=>'3','poll_id'=>6,'votes'=>0,'created_at'=>'2020-04-24 01:22:26','updated_at'=>'2020-04-24 01:22:26'],
				['id'=>21,'name'=>'Rất hài lòng','poll_id'=>7,'votes'=>0,'created_at'=>'2020-06-22 13:22:17','updated_at'=>'2020-06-22 13:22:17'],
				['id'=>22,'name'=>'Hài lòng','poll_id'=>7,'votes'=>0,'created_at'=>'2020-06-22 13:22:17','updated_at'=>'2020-06-22 13:22:17'],
				['id'=>23,'name'=>'Tạm ổn','poll_id'=>7,'votes'=>0,'created_at'=>'2020-06-22 13:22:17','updated_at'=>'2020-06-22 13:22:17'],
				['id'=>24,'name'=>'Không hài lòng','poll_id'=>7,'votes'=>0,'created_at'=>'2020-06-22 13:22:17','updated_at'=>'2020-06-22 13:22:17'],

    		];
    		DB::table('larapoll_options')->insert($option);


    // 		$vote=[

    // 			['id'=>1,'user_id'=>'7','option_id'=>11,'created_at'=>'2020-04-23 11:53:41','updated_at'=>'2020-04-23 11:53:41'],
				// ['id'=>2,'user_id'=>'7','option_id'=>10,'created_at'=>'2020-04-23 11:54:10','updated_at'=>'2020-04-23 11:54:10'],
				// ['id'=>3,'user_id'=>'7','option_id'=>9,'created_at'=>'2020-04-23 12:03:27','updated_at'=>'2020-04-23 12:03:27'],
				// ['id'=>4,'user_id'=>'18','option_id'=>9,'created_at'=>'2020-05-26 16:16:36','updated_at'=>'2020-05-26 16:16:36'],
				// ['id'=>5,'user_id'=>'0','option_id'=>10,'created_at'=>'2020-05-27 10:05:51','updated_at'=>'2020-05-27 10:05:51'],

    // 		];
    // 		DB::table('larapoll_votes')->insert($vote);

    		$position=[

    			['id'=>1,'id_department'=>1,'name'=>'Normal','phone'=>'NULL','description'=>'NULL','created_at'=>'2020-04-19 18:10:44','updated_at'=>'2020-04-19 18:10:44'],
				['id'=>2,'id_department'=>2,'name'=>'admin','phone'=>'NULL','description'=>'NULL','created_at'=>'2020-04-19 22:25:08','updated_at'=>'2020-04-19 22:25:08'],
				['id'=>3,'id_department'=>3,'name'=>'Parttime 1','phone'=>'NULL','description'=>'nhan vien theo gio','created_at'=>'2020-04-20 18:53:53','updated_at'=>'2020-04-20 18:53:53'],
				['id'=>4,'id_department'=>4,'name'=>'nhân viên kho 1','phone'=>'NULL','description'=>'NULL','created_at'=>'2020-05-15 22:35:45','updated_at'=>'2020-05-15 22:35:45'],
				['id'=>5,'id_department'=>5,'name'=>'Nhân viên Hrs 1','phone'=>'NULL','description'=>'NULL','created_at'=>'2020-05-24 20:28:30','updated_at'=>'2020-05-24 20:28:30'],
				// ['id'=>6,'id_department'=>6,'name'=>'nhân viên SP1','phone'=>'NULL','description'=>'NULL','created_at'=>'2020-05-26 20:08:08','updated_at'=>'2020-05-26 20:08:08'],

    		];
    		DB::table('positions')->insert($position);

    		$promotion=[

    			 ['id'=>1,'name'=>'Khuyen mai 1/5','code'=>'KM100','rate'=>0,'cost'=>100,'fromDate'=>'2020-04-20 00:00:00','toDate'=>'2020-06-30 00:00:00','created_at'=>'2020-04-20 16:17:13','updated_at'=>'2020-06-22 20:26:00','isActive'=>1,'count'=>2],
				['id'=>2,'name'=>'happy birthday','code'=>'BIRTHDAY100','rate'=>0,'cost'=>100,'fromDate'=>'2020-04-22 00:00:00','toDate'=>'2020-06-30 00:00:00','created_at'=>'2020-04-22 23:57:25','updated_at'=>'2020-06-22 20:25:08','isActive'=>1,'count'=>0],

    		];
    		DB::table('promotions')->insert($promotion);

    		$slide=[

    			['id'=>8,'link'=>'NULL','image'=>'iadj_90790367_2618838645067668_4346525268832157696_o.jpg','created_at'=>'2020-04-23 19:21:01','updated_at'=>'2020-04-23 19:21:01'],
				['id'=>9,'link'=>'NULL','image'=>'E3QO_91341957_2618838605067672_7408525247923617792_o.jpg','created_at'=>'2020-04-23 19:21:10','updated_at'=>'2020-04-23 19:21:10'],
				['id'=>10,'link'=>'NULL','image'=>'H8oC_93794208_2634941140124085_6995032717519749120_o.jpg','created_at'=>'2020-04-23 19:21:15','updated_at'=>'2020-04-23 19:21:15'],
				['id'=>11,'link'=>'NULL','image'=>'oAkC_93670649_2640175592933973_100006672809852928_o.jpg','created_at'=>'2020-04-23 19:21:21','updated_at'=>'2020-04-23 19:21:21'],

    		];
    		DB::table('slide')->insert($slide);

    // 		$staff =[

    // 			['id'=>1,'id_user'=>16,'salary'=>160000,'created_at'=>'2020-05-04 20:09:10','updated_at'=>'2020-05-04 20:35:29','is_active'=>1],
				// ['id'=>2,'id_user'=>17,'salary'=>100000,'created_at'=>'2020-05-15 22:37:28','updated_at'=>'2020-05-15 22:37:28','is_active'=>1],
				// ['id'=>3,'id_user'=>18,'salary'=>1000000,'created_at'=>'2020-05-26 20:10:18','updated_at'=>'2020-05-26 20:10:18','is_active'=>1],
				// ['id'=>4,'id_user'=>19,'salary'=>10000,'created_at'=>'2020-05-26 20:11:42','updated_at'=>'2020-05-26 20:11:42','is_active'=>1],

    // 		];
    // 		DB::table('staffs')->insert($staff);

    		$users = [

    			 ['id'=>1000,'full_name'=>'bang11','email'=>'bang98ptit@gmail.com','password'=>bcrypt('111111'),'phone'=>'0961455406','address'=>'hanoi','remember_token'=>'pRkB78u5AflCG3ECpb7A2Hmq2NCBCZAwDxLvoGABZ7gtvp8nanyevlwKRtqd','created_at'=>'2019-10-19 09:35:43','updated_at'=>'2020-06-29 12:58:36','role'=>'0','gender'=>'male','points'=>10400,'id_position'=>2,'dob'=>'2020-04-23 00:00:00'],


    		];
    		DB::table('users')->insert($users);

    }
}
