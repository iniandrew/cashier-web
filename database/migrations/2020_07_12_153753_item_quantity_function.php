<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ItemQuantityFunction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            DROP FUNCTION IF EXISTS item_quantity;
            CREATE FUNCTION item_quantity(transaction_detail_id INT) RETURNS INT
            BEGIN
                DECLARE qty INT;
                SET qty = (SELECT quantity FROM transaction_details WHERE id=transaction_detail_id);
                RETURN qty;
            END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
