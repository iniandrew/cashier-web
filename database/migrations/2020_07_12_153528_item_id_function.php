<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ItemIdFunction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            DROP FUNCTION IF EXISTS item_id;
            CREATE FUNCTION item_id(transaction_detail_id INT) RETURNS INT
            BEGIN
                DECLARE id_item INT;
                SET id_item = (SELECT item_id FROM transaction_details WHERE id=transaction_detail_id);
                RETURN id_item;
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

    }
}
