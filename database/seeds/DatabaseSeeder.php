<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name'=>'User',
            'email'=>'user@user.com',
            'password'=>bcrypt('user@123')
        ]);
        App\Supplier::create([
            'name'=>'Supplier',
            'email'=>'supplier@supplier.com',
            'password'=>bcrypt('supplier@123')
        ]);

        
        App\User::create([
            'name'=>'hasan',
            'email'=>'hasan@dev.com',
            'password'=>bcrypt(123456)
        ]);
        App\Supplier::create([
            'name'=>'hasan',
            'email'=>'hasan@supplier.com',
            'password'=>bcrypt(123456)
        ]);
        
        $faker = Faker\Factory::create();
        for($i=0;$i<10;$i++){
            $product = App\Product::create([
                'name'=>$faker->word,
                'buying_price'=>$faker->numberBetween($min = 500, $max = 1500),
                'selling_price'=>0
            ]);

			$status = $faker->randomElement($array = array ('supplied','received'));
			$quantity = $faker->numberBetween($min = 10, $max = 100);
			if($status == 'received') {
				//both supplies and inventory will be added.
				//supplies
	            $supplies = App\Supply::create([
	                'product_id'=>$product->id,
	                'supplier_id'=>1, //only one supplier
	                'quantity'=>$quantity,
	                'status'=>'received'
	            ]);
				//inventory
	            $inventory = App\Inventory::create([
	                'product_id'=>$product->id,
	                'quantity'=>$quantity,
	                'status'=>'added'
	            ]);
			} else {
				//only supplies will be added.
				//supplies
	            $supplies = App\Supply::create([
	                'product_id'=>$product->id,
	                'supplier_id'=>1, //only one supplier
	                'quantity'=>$quantity,
	                'status'=>'supplied'
	            ]);
			}
        }

        // $this->call(UsersTableSeeder::class);

        echo "Some demo product, supplies and inventory seeded!\n";
        echo "All Database Seeded Successfully!\n";
        echo "User: user@user.com\nPassword: user@123\n";
        echo "Supplier: supplier@supplier.com\nPassword: supplier@123\n";
    }
}
