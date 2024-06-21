<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('product_id')->unsigned();
            $table->string('product_code');
            $table->string('product_name');
            $table->string('category_id');
            $table->text('product_image');
            $table->string('product_price');
            $table->string('product_brand');
            $table->string('product_discount');
            $table->string('product_quantity');
            $table->text('product_description');
            $table->integer('supplier_id');
            $table->integer('product_status')->comment('1:còn hàng 2:hết hàng');;
            $table->string('is_active')->default(2 )->comment('2:yes 1:no');
//            $table->text('thumbnail_path');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
